<?php 
namespace Lax\GetAllCustomFields\Helpers;

class Helper{
    /**
     * Get all post types of a blog or site.
     * This is an alternative to get_post_types to include post types irrespective of the active theme.
     *
     * @return array
     * @since  1.0.0
     * @author Lax Mariappan <lax@webdevstudios.com>
     */
    public function get_all_post_types(){
        switch_to_blog( get_current_blog_id() );
        global $wpdb;
        $post_table = $wpdb->prefix . 'posts';
        $ignored_status = ['inherit','revision'];
        $status = implode( ', %s', $ignored_status);
        $sql = $wpdb->prepare( "SELECT distinct post_type FROM $post_table WHERE post_type NOT IN (%s) ",$status );
        $cpts = $wpdb->get_results( $sql );
        return $cpts;
    }
}
