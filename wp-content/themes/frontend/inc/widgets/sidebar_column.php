<?php



class Sidebar_Column extends WP_Widget
{
 
    public function __construct()
    {
        $widget_details = array(
            'classname' => 'Sidebar_Column',
            'description' => 'Блок для боковой панели с полями'
        );
 
        parent::__construct( 'Sidebar_Column', 'Блок боковой панели', $widget_details );
 
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

		$icon = '';
		if( !empty( $instance['icon'] ) ) {
			$icon = $instance['icon'];
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

		<p>
			<label for="<?php echo $this->get_field_name( 'icon' ); ?>"><?php _e( 'Имя класса для иконки:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>" type="text" value="<?php echo esc_attr( $icon ); ?>" />
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
		<sidebar-column link-header="<?php echo $instance['link']; ?>" icon-header="<?php echo $instance['icon']; ?>" title-header="<?php echo $instance['title']; ?>" >
			<?php wp_nav_menu('menu='.$instance['menu']); ?>
		</sidebar-column>
	<?php
        
    }
 
}
add_action( 'widgets_init', function () {
	register_widget( 'Sidebar_Column' );
} );