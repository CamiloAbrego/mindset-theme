<?php
$terms = get_terms( 
    array(
        'taxonomy' => 'fwd-work-category',
    ) 
);
if ( $terms && ! is_wp_error($terms) ) : ?>
    <section>
        <h2><?php esc_html_e( 'See Our Work', 'fwd' ); ?></h2>
        <ul>
        <?php foreach ( $terms as $term ) : ?>
            <li><a href="<?php echo get_term_link( $term ); ?>"><?php echo esc_html( $term->name ); ?></a></li>
        <?php endforeach; ?>
        </ul>
    </section>

<?php endif; ?>

<?php
$args = array(
    'post_type'      => 'fwd-testimonial',
    'posts_per_page' => 1,
    'orderby'        => 'rand'
);
 
$query = new WP_Query( $args );
 
if ( $query->have_posts() ){
    while ( $query->have_posts() ) {
        $query->the_post();
        the_content();
    }
    wp_reset_postdata();
}
?>