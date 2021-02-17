<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <div class="front-desc site-block-shadow" style="margin-bottom: 15px;margin-top: -3px;">
        <?php printf(
                '<h2 style="font-size: 18px;">Результаты по запросу: %s</h2>',
                esc_html(get_search_query())
            ); ?>
    </div>


    <?php while (have_posts()) : ?>
        <?php the_post(); ?>


        <div class="blog-article site-block-shadow">
            <div class="row">
                <div class="col-3 disable-for-table">
                    <div class="blog-article-img" style="padding-bottom: 0;">
                        <?php if (has_post_thumbnail()) { ?>
                            <div class="product-block-img">
                                <img src="<?php echo the_post_thumbnail_url('big'); ?>" style="border-radius: 0;" alt="">
                            </div>
                        <?php } else { ?>
                            <div class="product-block-not-photo">
                                <i class="i-not-photo"></i>
                                <span>Not photo </span>
                            </div>
                        <?php } ?>


                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="blog-article-header">
                        <h2>
                            <?php echo get_field('diploma_title') ?>
                        </h2>
                        <time>
                            <?php echo the_time('d.m.Y'); ?>
                        </time>
                    </div>
                    <p class="blog-article-desc">
                        <?php the_excerpt(); ?>

                    </p>
                    <div class="blog-article-button">

                        <?php printf('<v-button theme="orange" href="%s">Посмотреть</v-button>', esc_url(get_the_permalink())); ?>
                    </div>

                </div>
            </div>
        </div>


    <?php endwhile; ?>

    <?php the_posts_navigation(); ?>

<?php else : ?>



    <div class="front-desc site-block-shadow" style="margin-bottom: 15px;">
        <?php printf(
                'Sorry, no results for %s',
                esc_html(get_search_query())
            ); ?>
    </div>

<?php endif; ?>

<?php get_footer(); ?>
