<?php

// To do: process feed BEFORE caching.

require ('facebook_inc/facebook.php');
$appID = '012345678910111'; // register app with facebook acct, put app ID here 
	
	
$facebook = new Facebook(array(
  'appId'  => $appID,
  'secret' => 'abcdefghijklmnopqrtstuvwxyzABCDE', // put secret key here
  'cookie' => true,
));

if (file_exists('facebook_cache.data')) {
	$cache = unserialize(file_get_contents('facebook_cache.data'));
	if($cache['timestamp'] > time () - 10 * 60) {
		$feed = $cache['facebook_feed'];
	}
}
if(!$feed) {
	$ihsa_facebook = $facebook->api('/IHSA.IL/feed');
	$feed = $ihsa_facebook['data'];
	$cache = array('facebook_feed' => $feed, 'timestamp' => time());
	file_put_contents('facebook_cache.data', serialize($cache));
}
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=<?php echo $appID;?>";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="facebook-feed">
    <h3>FACEBOOK</h3>
    <?php
        
        $i = 0;
        
        foreach ($feed as $item) {
            if ($item['from']['id'] == '103213860215') { // only want messages by ROA
                $message = $item['message'];
                $picture = $item['picture']; // not using on ROA as ssl token is missing from facebook's CDN.
                $pos_url = $item['link'];
                $comment = $item['comments']['count'];
                $thmb_up = $item['likes']['count'];
                $def_pic = get_bloginfo('template_url').'/images/facebook_avatar.png'; // change as needed
                $pag_url = 'https://facebook.com/IHSA.IL/';
                
                if ($message == '') continue; // skip if blank
                ?>
                <div class="feed-object<?php if($i == 0) echo ' first-feed-object';?>">
                    <div class="feed-story">
                        <?php 
                        /* if ($picture != '') { 
                            echo '<a href="'.$pag_url.'" class="facebook-picture" target="_blank"><img src="'.$picture.'" /></a>';
                        } else { uncommented echo would go here } */
                            echo '<a href="'.$pag_url.'" class="facebook-picture" target="_blank"><img src="'.$def_pic.'" /></a>';
                        
                        echo '<a href="'.$pag_url.'" target="_blank">'.word_truncate($item['message'], 50).'...</a>'; ?>
                        <div class="comment-counter">
                        <?php
                            echo '<a href="'.$pag_url.'" class="facebook-like" target="_blank">likes: '.$thmb_up.'</a> | ';
                            echo '<a href="'.$pag_url.'" class="facebook-comment" target="_blank">comments: '.$comment.'</a>';
                        ?>
                        </div><!-- comment-counter -->
                    </div><!-- feed-story -->
                </div><?php // end feed object
                $i++; // count the ones we like
            }
            if ($i > 2) break; // all done
        }
    ?>
    <a href="<?php echo $pag_url;?>" class="facebook-connect" target="_blank"></a>
    <div class="fb-like" data-href="<?php echo $pag_url;?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true"></div>
</div><!--.facebook-feed -->
