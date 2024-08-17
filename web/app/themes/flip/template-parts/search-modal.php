<?php

/**
 * Search Modal template
 */

?>
<div class="flip-search-modal">
    <div class="flip-search-modal__box">
        <div class="flip-search-modal__heading">
            <h5>Search</h5>
            <div class="flip-search-modal__close"></div>
        </div>
        <div class="flip-search-modal__content">
            <form action="/" method="get">                
                <input type="text" name="s" requireds id="search" value="<?php the_search_query(); ?>" />
                <input type="submit" type="SEARCH" />
            </form>
        </div>
    </div>
</div>