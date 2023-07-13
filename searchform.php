
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <label for="search_field">Search for:</label>
        <input type="text" name="s" id="search_field" value="<?php the_search_query(); ?>" />
        <input type="submit" id="searchsubmit" value="Search" />
</form>
