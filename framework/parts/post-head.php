<header class="entry-header-outer">

    <div class="ml-breadcrumbs">
        <?php jannah_breadcrumbs() ?>
        <div class="bkmc-button">
            <?php echo do_shortcode('[add-bookmark]'); ?>
        </div>
    </div>

    <div class="ml-head-container">
        <div class="ml-head-left">
            <div class="entry-header">
                <h1 class="post-title entry-title"><?php the_title(); ?></h1>

                <?php
                if ((jannah_get_option('post_meta') && !jannah_get_postdata('tie_hide_meta')) || jannah_get_postdata('tie_hide_meta') == 'no') {

                    $args = array(
                        'author' => jannah_get_option('post_author'),
                        'avatar' => jannah_get_option('post_author_avatar'),
                        'twitter' => jannah_get_option('post_author_twitter'),
                        'email' => jannah_get_option('post_author_email'),
                        'date' => jannah_get_option('post_date'),
                        'comments' => jannah_get_option('post_comments'),
                        'views' => jannah_get_option('post_views'),
                        'reading' => jannah_get_option('reading_time'),
                    );

                    jannah_the_post_meta($args);
                }
                ?>
            </div>
        </div>

        <div class="ml-head-right">
            <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
        </div>
    </div>


    <?php
    $post_layout = jannah_get_object_option('post_layout', 'cat_post_layout', 'tie_post_layout');

    if (!empty($post_layout) && ($post_layout == 4 || $post_layout == 5 || $post_layout == 8)) { ?>

        <a id="go-to-content" href="#go-to-content"><span class="fa fa-angle-down"></span></a>
        <?php
    }
    ?>

</header><!-- .entry-header-outer /-->
