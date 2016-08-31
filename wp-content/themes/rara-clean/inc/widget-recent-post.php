<?php
/**
 * Widget Recent Post
 *
 * @package Rara
 */
 
// register Rara_Recent_Post widget
function rara_register_recent_post_widget() {
    register_widget( 'Rara_Recent_Post' );
}
add_action( 'widgets_init', 'rara_register_recent_post_widget' );
 
 /**
 * Adds Rara_Recent_Post widget.
 */
class Rara_Recent_Post extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'rara_recent_post', // Base ID
			__( 'RARA: Recent Post', 'rara-clean' ), // Name
			array( 'description' => __( 'A Recent Post Widget', 'rara-clean' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $rara_args     Widget arguments.
	 * @param array $rara_instance Saved values from database.
	 */
	public function widget( $rara_args, $rara_instance ) {
	   
        $rara_title = $rara_instance['title'];
        $rara_num_post = absint( $rara_instance['num_post'] );
        $rara_show_thumb = $rara_instance['show_thumbnail'];
        $rara_show_date = $rara_instance['show_postdate'];
        
        $rara_qry = new WP_Query( array(
            'post_type'             => 'post',
            'post_status'           => 'publish',
            'posts_per_page'        => $rara_num_post,
            'ignore_sticky_posts'   => true
        ) );
        if( $rara_qry->have_posts() ){
            echo $rara_args['before_widget'];
            echo $rara_args['before_title'] . apply_filters( 'the_title', $rara_title ) . $rara_args['after_title'];
            ?>
            <ul>
                <?php 
                while( $rara_qry->have_posts() ){
                    $rara_qry->the_post();
                ?>
                    <li>
                        <?php if( has_post_thumbnail() && $rara_show_thumb ){ ?>
                            <a href="<?php the_permalink();?>" class="post-thumbnail">
                                <?php the_post_thumbnail( 'rara-recent-post' );?>
                            </a>
                        <?php }?>
						<div class="entry-header">
							<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
							<?php if( $rara_show_date ){?>
                                <div class="entry-meta">
                                    <span class="posted-on">
                                        <a href="<?php the_permalink(); ?>">
                                            <time><?php printf( __( '%1$s', 'rara-clean' ), get_the_date() ); ?></time>
                                        </a>                                    
                                    </span>
                                </div>
                            <?php }?>
						</div>                        
                    </li>        
                <?php    
                }
            ?>
            </ul>
            <?php
            echo $rara_args['after_widget'];   
        }
        wp_reset_postdata();  
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $rara_instance Previously saved values from database.
	 */
	public function form( $rara_instance ) {
        
        $rara_title = !empty( $rara_instance['title'] ) ? $rara_instance['title'] : __( 'Recent Posts', 'rara-clean' );
        $rara_num_post = !empty( $rara_instance['num_post'] ) ? absint( $rara_instance['num_post'] ) : 3 ;
        $rara_show_thumbnail = !empty( $rara_instance['show_thumbnail'] ) ? $rara_instance['show_thumbnail'] : '';
        $rara_show_postdate = !empty( $rara_instance['show_postdate'] ) ? $rara_instance['show_postdate'] : '';
        
        ?>
		
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'rara-clean' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $rara_title ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'num_post' ); ?>"><?php esc_html_e( 'Number of Posts', 'rara-clean' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'num_post' ); ?>" name="<?php echo $this->get_field_name( 'num_post' ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $rara_num_post ); ?>" />
		</p>
        
        <p>
            <input id="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>" name="<?php echo $this->get_field_name( 'show_thumbnail' ); ?>" type="checkbox" value="1" <?php checked( '1', $rara_show_thumbnail ); ?>/>
            <label for="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>"><?php esc_html_e( 'Show Post Thumbnail', 'rara-clean' ); ?></label>
		</p>
        
        <p>
            <input id="<?php echo $this->get_field_id( 'show_postdate' ); ?>" name="<?php echo $this->get_field_name( 'show_postdate' ); ?>" type="checkbox" value="1" <?php checked( '1', $rara_show_postdate ); ?>/>
            <label for="<?php echo $this->get_field_id( 'show_postdate' ); ?>"><?php esc_html_e( 'Show Post Date', 'rara-clean' ); ?></label>
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $rara_new_instance Values just sent to be saved.
	 * @param array $rara_old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $rara_new_instance, $rara_old_instance ) {
		$rara_instance = array();
		
        $rara_instance['title'] = !empty( $rara_new_instance['title'] ) ? strip_tags( $rara_new_instance['title'] ) : __( 'Recent Posts', 'rara-clean' );
        $rara_instance['num_post'] = !empty( $rara_new_instance['num_post'] ) ? absint($rara_new_instance['num_post']) : 3 ;        
        $rara_instance['show_thumbnail'] = !empty( $rara_new_instance['show_thumbnail'] ) ? esc_attr( $rara_new_instance['show_thumbnail'] ) : '';
        $rara_instance['show_postdate'] = !empty( $rara_new_instance['show_postdate'] ) ? esc_attr( $rara_new_instance['show_postdate'] ) : '';
		return $rara_instance;
	}

} // class Rara_Recent_Post 