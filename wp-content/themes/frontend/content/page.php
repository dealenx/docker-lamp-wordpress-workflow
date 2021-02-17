<div class="section-title container">
  <div class="wrap">
    <h2 class="section-title__title"><?php the_title(); ?></h2>
  </div>
</div>

<div class="default-page container">
  <div class="wrap">
    <div class="default-page__preview">
      <img src="<?php echo the_post_thumbnail_url('big'); ?>" alt="">
    </div>
    <div class="post-content-main">
      <?php the_post(); ?>
      <?php the_content(); ?>
    </div>
  </div>
  
</div>