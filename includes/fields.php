<?php

use Lax\GetAllCustomFields\Helpers\Helper;

$helper = new Helper();

$post_types = $helper->get_all_post_types();

global $wpdb;
$meta_table = $wpdb->prefix . 'postmeta';
$post_table = $wpdb->prefix . 'posts';

$output = "<div class=\"wrap\">";
$output .= "<h1>List of All Custom Fields<h1>";
foreach ( $post_types as $post_type ) {
    $sql = $wpdb->prepare("SELECT distinct meta_key FROM $meta_table m JOIN $post_table p on m.post_id = p.ID WHERE p.post_type=%s ", $post_type->post_type );
    $fields = $wpdb->get_results( $sql );
    $output .= "<table class=\"wp-list-table widefat fixed striped table-view-list \">
                    <thead>
                        <tr><th class=\"manage-column\">$post_type->post_type</th></tr>
                    </thead>";
    if( count($fields) > 0 ){
        $output .= '<tbody>';
        foreach( $fields as $field ){
            $output .= "<tr><td class=\"column-title\">$field->meta_key</td></tr>";
        }
        $output .= '</tbody>';
    }
    $output .= '</table><br/>';
}
$output .= '</div>';
echo $output;