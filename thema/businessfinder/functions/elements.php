<?php

add_action( 'widgets_init', create_function( '', "register_widget( 'AIT_Quick_Contact_Widget' );" ) );

/**
 * Quick Contact Widget
 */
class AIT_Quick_Contact_Widget extends WP_Widget {

	/**
	 * Constructor
	 *
	 * @return void
	 **/
	function AIT_Quick_Contact_Widget() {
		$widget_ops = array( 'classname' => 'ait-quick-contact', 'description' => 'Show contact informations from theme settings (General Settings -> Contact)' );
		$this->WP_Widget( 'ait-quick-contact', 'Theme &rarr; Quick Contact', $widget_ops );
	}

	/**
	 * Outputs the HTML for this widget.
	 *
	 * @param array  An array of standard parameters for widgets in this theme
	 * @param array  An array of settings for this widget instance
	 * @return void Echoes it's output
	 **/
	function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );

		$title = apply_filters('widget_title', empty($instance['title']) ? $parent_title : do_shortcode($instance['title']), $instance, $this->id_base);

		echo $before_widget;
		echo $before_title;
		echo $title;
		echo $after_title;

		global $aitThemeOptions;
		if (isset($aitThemeOptions->contact)) {
			?>
			<?php if (!empty($aitThemeOptions->contact->address)) { ?>
			<div class="address contact-info">
				<?php if (!empty($aitThemeOptions->contact->addressIcon)) { ?><img src="<?php echo $aitThemeOptions->contact->addressIcon; ?>" alt="icon"><?php } ?>
				<p class="data">
					<?php echo $aitThemeOptions->contact->address; ?>
				</p>
			</div>
			<?php } ?>

			<?php if (!empty($aitThemeOptions->contact->phone)) { ?>
			<div class="phone contact-info">
				<?php if (!empty($aitThemeOptions->contact->phoneIcon)) { ?><img src="<?php echo $aitThemeOptions->contact->phoneIcon; ?>" alt="icon"><?php } ?>
				<p class="data">
					<?php echo $aitThemeOptions->contact->phone; ?>
				</p>
			</div>
			<?php } ?>

			<?php if (!empty($aitThemeOptions->contact->email)) { ?>
			<div class="email contact-info">
				<?php if (!empty($aitThemeOptions->contact->emailIcon)) { ?><img src="<?php echo $aitThemeOptions->contact->emailIcon; ?>" alt="icon"><?php } ?>
				<p class="data">
					<?php echo $aitThemeOptions->contact->email; ?>
				</p>
			</div>
			<?php } ?>

			<?php if (count($aitThemeOptions->contact->icons) > 0) { ?>
			<div class="social-icons contact-info">
				<?php foreach ($aitThemeOptions->contact->icons as $icon) { ?>
					<a href="<?php echo $icon->link; ?>" target="_blank">
						<img src="<?php echo $icon->iconUrl; ?>" alt="<?php echo $icon->title; ?>">
					</a>
				<?php } ?>
			</div>
			<?php
			}
		}

		echo $after_widget;
	}

	/**
	 * Deals with the settings when they are saved by the admin. Here is
	 * where any validation should be dealt with.
	 *
	 * @param array  An array of new settings as submitted by the admin
	 * @param array  An array of the previous settings
	 * @return array The validated and (if necessary) amended settings
	 **/
	function update( $new_instance, $old_instance ) {
	
		// update logic goes here
		$updated_instance = $new_instance;
		return $updated_instance;
	}

	/**
	 * Displays the form for this widget on the Widgets page of the WP Admin area.
	 *
	 * @param array  An array of the current settings for this widget
	 * @return void Echoes it's output
	 **/
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		?>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __( 'Title', 'ait' ); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"class="widefat" style="width:100%;" />
		<?php
	}
}