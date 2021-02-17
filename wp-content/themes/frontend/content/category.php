<div class="front-categories">
    <div class="container">
        <div class="front-categories__blocks row">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <a class="front-categories__block col-md-3 col-sm-6 col-12" href="<?php the_permalink() ?>">
                        <div class="front-categories__block-img">
                            <span style="background-image: url(<?php echo the_post_thumbnail_url('big'); ?>);">
                            </span>
                        </div>


                        <h3><?php the_title(); ?></h3>

                    </a>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="container">
    <?php if (function_exists('wp_corenavi')) {
        wp_corenavi();
    }; ?>
</div>