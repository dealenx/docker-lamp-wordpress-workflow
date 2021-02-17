<?php



class Site_Top_Column extends WP_Widget
{
 
    public function __construct()
    {
        $widget_details = array(
            'classname' => 'Site_Top_Column',
            'description' => 'Блок для вывода меню в вверхнем раскрывающимся меню'
        );
 
        parent::__construct( 'Site_Top_Column', 'Блок в верхнее меню', $widget_details );
 
    }
 
    public function form( $instance ) {
		// Backend Form
		$title = '';
		if( !empty( $instance['title'] ) ) {
			$title = $instance['title'];
		}
	
		$link = '';
		if( !empty( $instance['link'] ) ) {
			$link = $instance['link'];
		}

		$menu = '';
		if( !empty( $instance['menu'] ) ) {
			$menu = $instance['menu'];
		}
	
		?>
	
		<p>
			<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Название:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
	
		<p>
			<label for="<?php echo $this->get_field_name( 'link' ); ?>"><?php _e( 'Ссылка на категорию:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_name( 'menu' ); ?>"><?php _e( 'Название меню :' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'menu' ); ?>" name="<?php echo $this->get_field_name( 'menu' ); ?>" type="text" value="<?php echo esc_attr( $menu ); ?>" />
		</p>
	
		<div class='mfc-text'>
			
		</div>
	
		<?php
	
		echo $args['after_widget'];
    }
 
    public function update( $new_instance, $old_instance ) {  
        return $new_instance;
    }
 
    public function widget( $args, $instance ) {
	?>
		<a href="<?php echo $instance['link']; ?>" class="site-top-nav-main-footer-docs-list-span"><?php echo $instance['title']; ?></a>
        <?php wp_nav_menu('menu='.$instance['menu']); ?>
	<?php
        
    }
 
}
add_action( 'widgets_init', function () {
	register_widget( 'Site_Top_Column' );
} );