<?php
function utweb_setup() {
    /*
    * Make theme available for translation.
    * Translations can be filed in the /languages/ directory.
    * If you're building a theme based on cybele, use a find and replace
    * to change 'cybele' to the name of your theme in all the template files
    */
    load_theme_textdomain( 'utweb-dailinh', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( array(
        'header_menu' => esc_html__( 'Header Menu' ),
        'footer_menu' => esc_html__( 'Footer Menu' ),
        'menu_location_left' => esc_html__( 'Menu Left'),
        'menu_location_middle' => esc_html__( 'Menu Middle'),
        'menu_location_right' => esc_html__( 'Menu Right')
    ) );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

}
add_action( 'after_setup_theme', 'utweb_setup' );
/* Cleanup */
function utweb_cleanup() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );

    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action('wp_head', 'wp_generator');
}
add_action( 'init', 'utweb_cleanup' );
// Remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
/* Execute PHP code in widget */
function php_text($text) {
    if (strpos($text, '<?php') !== FALSE && strpos($text, '?>') !== FALSE) {
        ob_start();
        eval("?> $value <?php ");
        $text = ob_get_clean();
    }
    return $text;
}
add_filter('widget_text', 'php_text', 99);
// Resource excerpt length
// @length unit: Character
function get_custom_excerpt( $text, $length = 0 ) {
    if (!$text) return;
    $length = $length ? $length : 250;
    $text = wp_strip_all_tags($text, true);
    $return = $text;
    if (strlen($text) > $length)
        $return = substr($text, 0, strpos($text, ' ', $length));
    return $return;
}
function the_custom_excerpt( $text, $length = 0 ) {
    $length = $length ? $length : 250;
    echo get_custom_excerpt( $text, $length );
}
// get prev post ID by current ID
function get_previous_post_id( $post_id ) {
    global $post;
    $oldGlobal = $post;
    $post = get_post( $post_id );
    $previous_post = get_previous_post();
    $post = $oldGlobal;
    if ( '' == $previous_post )
        return 0;
    return $previous_post->ID;
}
// get next post ID by current ID
function get_next_post_id( $post_id ) {
    global $post;
    $oldGlobal = $post;
    $post = get_post( $post_id );
    $next_post = get_next_post();
    $post = $oldGlobal;
    if ( '' == $next_post )
        return 0;
    return $next_post->ID;
}