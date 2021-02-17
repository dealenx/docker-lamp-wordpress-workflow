<div id="topNav" class="top-nav container">
  <div class="wrap">
    
    <div class="top-nav-logo" style="display: flex;">
      <?php  if (pll_current_language() == 'ru'): ?>
        <a href="/">
          <?php get_template_part('templates/logo-svg'); ?> 
        </a>
      <?php else: ?>
        <a href="/en">
          <?php get_template_part('templates/logo-svg'); ?> 
        </a>
      <?php endif; ?>
     
    </div>
    
    <div class="top-nav-menu">
    <?php  if (pll_current_language() == 'ru'): ?>
      <?php wp_nav_menu('menu=Главное меню'); ?>
    <?php else: ?>
          <?php wp_nav_menu('menu=Main menu'); ?>
    <?php endif; ?>
      
    </div>

    <div class="top-nav-contacts">
      <div style="display: flex; align-items: center;">
      <?php  if (pll_current_language() == 'ru'): ?>
        <a href="/en/" class="k-button ghost" >
          English
        </a>

        <?php else: ?>
          
          <a href="/" class="k-button ghost" >
           Русский
          </a>
       <?php endif; ?>
      
      
       
        <a id="openSearch" class="k-button link" style="margin-left: 12px;">
          <i class="i-search"></i>
        </a>
      </div> 
    </div>
    <div class="top-hamb">
    <button id="hamb">
            <div id="rect1" class="showRect"></div> 
            <div id="rect2" class="showRect"></div> 
            <div id="rect3" class="showRect"></div> 
        </button> 
    </div>
  </div>
</div>

<?php if (is_front_page() == false) { ?>
	<?php get_template_part('./templates/bread-crumbs-yoast'); ?> 
<?php } ?>

<div class="top-dropdown-nav container">
  <div class="wrap">
    <div id="slideDown" class="hidden">
      <div class="top-dropdown-nav-menu">
        <?php wp_nav_menu('menu=Главное меню'); ?>

        <a href="<?php echo get_theme_mod('messenger_telegram_url') ?>" class="k-button link without-decoration">
          <i class="i-telegram"></i>
          <?php echo get_theme_mod('messenger_telegram') ?>
        </a>
        </div>
      </div>
    </div>
  </div>
</div>



<div id="myOverlay" class="overlay">
  <span class="closebtn" id="closeSearch" title="Close Overlay">x</span>
  <div class="overlay-content">
    <form  style="display: flex;justify-content: center;align-items: flex-end;" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
      <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="Поиск...">
      <button type="submit" id="searchsubmit" style="display: flex;"><i></i></button>
    </form>
  </div>
</div>
