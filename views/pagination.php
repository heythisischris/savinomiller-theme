<?php
$prev_link = get_previous_posts_link(__('&laquo; Older Entries'));
$next_link = get_next_posts_link(__('Newer Entries &raquo;'));

if ($prev_link || $next_link) {
?>
    <div class="pagination" >
        <div class="inner" >
            <div class="pagination-newer" >
                <?php previous_posts_link( 'Newer Entries' ); ?>&nbsp;
            </div>

            <div class="pagination-older" >
                <?php next_posts_link( 'Older Entries', $wp_query->max_num_pages ); ?>&nbsp;
            </div>
            <div class="clearfix" >&nbsp;</div>
        </div>
    </div>
<?PHP
}
?>