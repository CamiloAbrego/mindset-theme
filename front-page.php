<?php
/**
 * The template for displaying for home page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );
			?>

			<section class="home-intro">
                <?php
        if ( function_exists( 'get_field' ) ) {
             if ( get_field( 'top_section_' ) ) {
        the_field( 'top_section_' );
          }
            }
                ?>
            </section>
			<section class="home-work"></section>
			<section class="home-left">
                <?php
if ( function_exists( 'get_field' ) ) {

    if ( get_field( 'left_section_heading' ) ) {
        echo '<h2>';
        the_field( 'left_section_heading' );
        echo '</h2>';
    }

    if ( get_field( 'left_section_content' ) ) {
        echo '<p>';
        the_field( 'left_section_content' );
        echo '</p>';
    }

}
?>
            </section>
			<section class="home-right">
                               <?php
if ( function_exists( 'get_field' ) ) {

    if ( get_field( 'right_section_heading' ) ) {
        echo '<h2>';
        the_field( 'right_section_heading' );
        echo '</h2>';
    }

    if ( get_field( 'right_section_content' ) ) {
        echo '<p>';
        the_field( 'right_section_content' );
        echo '</p>';
    }

}
?>
            </section>
			<section class="home-slider"></section>
			<section class="home-blog"></section>
				<h2><?php  esc_html_e('Latest Blog Post', 'fwd' ); ?></h2>
<?php
$args = array(
    'post_type' => 'post', // Assuming 'post' is your post type.
    'posts_per_page' => 4, // Display four posts.
);

$recent_posts = new WP_Query( $args );

if ( $recent_posts->have_posts() ) :
    while ( $recent_posts->have_posts() ) :
        $recent_posts->the_post();
        ?>
        <!-- Display each blog post here -->
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php
        if ( has_post_thumbnail() ) {
            // Output the featured image using the 'custom-crop-size'
            the_post_thumbnail( 'custom-crop-size' );
        }
        ?>
        <p><?php the_date(); ?></p> <!-- Display the post date -->
        <!-- Other post content -->
        <?php
    endwhile;
    wp_reset_postdata(); // Reset post data.
endif;

?>







			<section class="home-work"></section>



		<?php
		endwhile; // End of the loop.
		?>
		

	</main><!-- #primary -->

<?php
get_sidebar();
get_footer();
