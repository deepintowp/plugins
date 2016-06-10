<?php
/**
 * @package Woocommerce Previous purchase product.
 * @version 1.6
 */
/*
Plugin Name: Woocommerce Previous purchase product.
Plugin URI: http://wordpress.org/plugins/Woocommerce-Previous-purchase-product.
Description: using this plugin you can show your customer's previous product.
Author: Subhasish Manna
Version: 1.0
Author URI: http://b.subho.host22.com/
*/

if ( ! defined( 'ABSPATH' ) ) { 
    exit; // Exit if accessed directly
}
/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    
	
	function woocommerce_previous_purchase_product( $atts, $content = null ){
	

	$previous_product = '<div class="woocommerce" style="clear:both" > <ul class="products">';
		$user_id = get_current_user_id();
		$current_user= wp_get_current_user();
		$customer_email = $current_user->email;
		$args = array(
            'post_type' => 'product',
            'posts_per_page' => -1
            );
	$loop = new WP_Query( $args );
	if ( $loop->have_posts() ) {
            while ( $loop->have_posts() ) : $loop->the_post(); $_product = get_product( $loop->post->ID );
            if (wc_customer_bought_product($customer_email, $user_id,$_product->id)){
				
              $previous_product .= '<li class=" post-'.$_product->id.' product type-product ">

	<a href="'.get_the_permalink().'">
	
'.woocommerce_get_product_thumbnail().'
<h3>'.get_the_title().'</h3>
	
	<span class="price">'.wc_price($_product->get_price()).'</span>
</a><a rel="nofollow" href="/wc/shop/?add-to-cart='.$_product->id.'" data-quantity="1" data-product_id="'.$_product->id.'" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Add to cart</a>
</li>';
            }
            endwhile;
        } else {
            $previous_product .= 'You do not have purchase any product yet';
        }
        wp_reset_postdata();
	$previous_product .= 	'</ul></div>';

	return $previous_product;
	

}


add_shortcode('previous_product','woocommerce_previous_purchase_product');	



	
	
}

