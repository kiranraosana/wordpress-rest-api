<?php
if( ! function_exists(sollers_events)) {

	function  sollers_events() {
        $request = wp_remote_get( 'https://sollers.edu/events/wp-json/wp/v2/pages/?include=3091,525' );
		if( is_wp_error( $request ) ) {
			return false; // Bail early
		}
		$body = wp_remote_retrieve_body( $request );
		$data = json_decode( $body );
		if( ! empty( $data ) ) {

			echo '<ul>';
			foreach( $data as $page ) {
				echo '<li>';
					echo '<a href="' . esc_url( $page->link ) . '">' . $page->title->rendered . '</a>';
				echo '</li>';
			}
			echo '</ul>';
		}
	}
	add_shortcode( 'sollersEventsLists', 'sollers_events' );

}
?>