<?php
    $args       = array(
		'public'   => true,
	);
	$post_types = get_post_types( $args, 'objects' );

	foreach ( $post_types as $cpt ) {
	
    }