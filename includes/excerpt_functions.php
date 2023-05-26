<?php
// Make a string wrap after X characters, with a max of Y lines. 
// To use,  echo nl2br(mstar_word_wrap($string, 40, 1)); where 40 is X and 1 is Y (optional)
function mstar_word_wrap($input, $chars, $lines = false) {
    # the simple case - return wrapped words
    if(!$lines) return wordwrap($input, $chars, "\n");

    # truncate to maximum possible number of characters
    $retval = substr($input, 0, $chars * $lines);

    # apply wrapping and return first $lines lines
    $retval = wordwrap($retval, $chars, "\n");
    preg_match("/(.+\n?){0,$lines}/", $retval, $regs);
	if (strlen($regs[0]) < strlen($input)) {
    return $regs[0].'...';
	} else { return $regs[0]; }
}

// create custom excerpt
function mstar_custom_excerpt($words = 40, $link_text = 'Continue reading this entry &#187;', $allowed_tags = '', $container = 'p', $smileys = 'no', $echo = 'true', $link = '', $get_post = '') {
	if(!$get_post){
		global $post;
		$this_post = $post;
	} else {
		$this_post = get_post($get_post);
	}
	$excerpt_out = '';
	if ($link == '') {
		$link = get_permalink($this_post->ID);
	}
	if ( $allowed_tags == 'all' ) $allowed_tags = '<a>,<i>,<em>,<b>,<strong>,<ul>,<ol>,<li>,<span>,<blockquote>,<img>';
	
	$text = preg_replace('/\[.*\]/', '', strip_tags($this_post->post_content, $allowed_tags));
	$text = explode(' ', $text);
	$tot = count($text);
	if ($tot < $words){
		$words = $tot;
	}
	$output= '';
	
	for ( $i=0; $i<$words; $i++ ) {
		$output .= $text[$i] . ' ';
	}
	if ( $smileys == "yes" ) $output = convert_smilies($output);
	$excerpt_out .= '<p>'.force_balance_tags($output);
	
	if ( $i < $tot ) {
		$excerpt_out .= '...'; 
	} else {
		$excerpt_out .= '<p>';
	}
	if ( $i < $tot ) {
		if ( $container == 'p' || $container == 'div' ) $excerpt_out .= '</p>';
		if ( $container != 'plain' ) {
			$excerpt_out .= '<'. $container . ' class="more">';
			if ( $container == 'div' ) {
				$excerpt_out .= '<p>';
			}
		} 
		$excerpt_out .= '<a href="'.$link.'" title="'.$link_text.'">'.$link_text.'</a>';
		if ( $container == 'div' ) $excerpt_out .= '</p>';
		
		if ( $container != 'plain' ) $excerpt_out .= '</' . $container . '>';
		if ( $container == 'plain' || $container == 'span' ) $excerpt_out .= '</p>';
	}
	if ($echo == 'true'){
		echo $excerpt_out;
	} else {
		return $excerpt_out;
	}
}


/**
 * Shortens an UTF-8 encoded string without breaking words.
 *
 * @param  string $string     string to shorten
 * @param  int    $max_chars  maximal length in characters
 * @param  string $append     replacement for truncated words.
 * @return string
 */
function utf8_truncate( $string, $max_chars = 200, $append = "\xC2\xA0…" )
{
    $string = strip_tags( $string );
    $string = html_entity_decode( $string, ENT_QUOTES, 'utf-8' );
    // \xC2\xA0 is the no-break space
    $string = trim( $string, "\n\r\t .-;–,—\xC2\xA0" );
    $length = strlen( utf8_decode( $string ) );

    // Nothing to do.
    if ( $length < $max_chars )
    {
        return $string;
    }

    // mb_substr() is in /wp-includes/compat.php as a fallback if
    // your the current PHP installation doesn’t have it.
    $string = mb_substr( $string, 0, $max_chars, 'utf-8' );

    // No white space. One long word or chinese/korean/japanese text.
    if ( FALSE === strpos( $string, ' ' ) )
    {
        return $string . $append;
    }

    // Avoid breaks within words. Find the last white space.
    if ( extension_loaded( 'mbstring' ) )
    {
        $pos   = mb_strrpos( $string, ' ', 0,'utf-8' );
        $short = mb_substr( $string, 0, $pos, 'utf-8' );
    }
	else
    {
        // Workaround. May be slow on long strings.
        $words = explode( ' ', $string );
        // Drop the last word.
        array_pop( $words );
        $short = implode( ' ', $words );
    }

    return $short . $append;
}