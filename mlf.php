// functions.php এ যোগ করুন
function setup_edd_theme() {
    // EDD compatibility
    add_theme_support('edd');
}
add_action('after_setup_theme', 'setup_edd_theme');
