<?php get_header(); ?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1>Premium Digital Products for Your Success</h1>
            <p>Discover high-quality digital assets, tools, and resources to grow your business</p>
            <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>" class="btn-primary">Explore Products</a>
        </div>
    </div>
</section>

<!-- Featured Categories -->
<section class="categories-section">
    <div class="container">
        <h2>Product Categories</h2>
        <div class="categories-grid">
            <?php
            $categories = get_terms('product_cat', array(
                'hide_empty' => false,
            ));
            
            foreach($categories as $category) {
                echo '<div class="category-card">';
                echo '<h3>' . $category->name . '</h3>';
                echo '<a href="' . get_term_link($category) . '" class="btn-secondary">View Products</a>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="featured-products">
    <div class="container">
        <h2>Best Selling Products</h2>
        <div class="products-grid">
            <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 6,
                'meta_key' => 'total_sales',
                'orderby' => 'meta_value_num'
            );
            
            $products = new WP_Query($args);
            
            if($products->have_posts()) {
                while($products->have_posts()) {
                    $products->the_post();
                    wc_get_template_part('content', 'product');
                }
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
