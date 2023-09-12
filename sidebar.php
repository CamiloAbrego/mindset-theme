<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FWD_Starter_Theme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); 
    if ( is_page() ) {
    // Display the Second Sidebar on Page templates
    dynamic_sidebar( 'second-sidebar' );
} else {
    // Display the default Sidebar for other templates
    dynamic_sidebar( 'sidebar-1' );
}
?>
<?php get_template_part( 'template-parts/work', 'categories' ); ?>
</aside><!-- #secondary -->


