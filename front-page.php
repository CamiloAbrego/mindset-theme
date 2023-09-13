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

			?>

            <h1><?php the_title() ?></h1>

			<section class="home-intro">
                <?php
        if ( function_exists( 'get_field' ) ) {
             if ( get_field( 'top_section_' ) ) {
        the_field( 'top_section_' );
          }
            }
                ?>
            </section>
		        <?php
            $args = array(
         'post_type'      => 'fwd-work',
            'posts_per_page' => 4,
            );
            $query = new WP_Query( $args );

if ( $query->have_posts() ) {
    ?>
    		<section class="home-work">
                	
<?php
// Add the 'tax_query' parameter to your existing $args...
$args = array(
    'post_type'      => 'fwd-work',
    'posts_per_page' => 4,
    'tax_query'      => array(
        array(
            'taxonomy' => 'fwd-featured',
            'field'    => 'slug',
            'terms'    => 'front-page'
        ),
    ),
);
?>
                <h2>feature work</h2>
                <?php
    while( $query->have_posts() ) {
        $query->the_post(); 
        ?>
        <article>
            <a href="<?php the_permalink(); ?>">
               <?php the_post_thumbnail('medium'); ?>
                <h3><?php the_title(); ?></h3>
             
            </a>
        </article>
        <?php
    }
    wp_reset_postdata();
} 
?>
            </section>
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
			<section class="home-slider">
<?php
$args = array(
    'post_type'      => 'fwd-testimonial',
    'posts_per_page' => -1
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) : ?>
    <div class="swiper">
        <div class="swiper-wrapper">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="swiper-slide">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
    <?php
    wp_reset_postdata();
endif;
?>
            </section>
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
        <p><?php echo get_the_date(); ?></p> <!-- Display the post date -->
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
