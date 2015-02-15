<?php
/*
Plugin Name: EDD Related Downloads Carousel free
Plugin URI: http://relatedcontentwp.com/edd-related-downloads-carousel-free/
Description: This plugin will enable easy digital download's related downloads carousel features in your wordpress site. <a href="http://relatedcontentwp.com/edd-related-downloads-carousel/">See Premium version features</a>
Author: Related Content Wordpress
Author URI: http://relatedcontentwp.com/
Version: 1.0
*/


/* Adding Latest jQuery from Wordpress */
function eddf_related_downloads_we_jquery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'eddf_related_downloads_we_jquery');

function eddf_related_downloads_we_js_files(){
    wp_enqueue_script( 'eddf-related-downloads-script', plugins_url( '/js/owl.carousel.min.js', __FILE__ ), array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'eddf_related_downloads_we_js_files' );


/* Plugin option panel */







function add_eddf_rel_carouesl_options_framwrork()  
{  
	add_options_page('Try EDD Related Downloads Premium Version', '', 'manage_options', 'eddf-related-carousel-dl-options','eddfcarousel_rel_options_framwrork');  
}  
add_action('admin_menu', 'add_eddf_rel_carouesl_options_framwrork');


function eddfcarousel_rel_options_framwrork(){?>
<style>
.panel-desc-edd {padding-right:20px}
#edd-rel-feature-list {list-style: outside none disc;
margin: 15px;}
#edd-rel-feature-list li{line-height: 24px;
margin: 0;}
#first-description-stst {margin-top:30px}   
#last-purchase-feature {
  padding: 20px 0;
}
#feature-list-wrap {padding-top:30px}    
</style>
<div class="wrap">
    <div class="welcome-panel" id="welcome-panel">
        <div class="welcome-panel-content">
            <h3>Thank you for installing our free plugin.</h3>
            <p class="about-description">EDD Related Downloads Carousel Free version is activated &amp; started working. In this time, We'd like to offer you a premium version of this plugin. See benifits.</p>
            

            
            <div id="first-description-stst" class="welcome-panel-column-container">
                <h3>Premium version special features</h3>
                <div class="welcome-panel-column">
                    <div class="panel-desc-edd">
                        <h4>Detailed documentation</h4>
                        <p>In permium version of this plugin, we provide hand picked detailed documentation for help. The documentation helps you using this plugin effectly, learn how manage carousel, carousel mobile settings, color setting etc.</p>

                        <a target="_blank" href="http://docs.relatedcontentwp.com/edd-related-downloads-carousel/" class="button button-primary">See online documentation</a>
                    </div>
                </div>
                
                
                <div class="welcome-panel-column">
                    <div class="panel-desc-edd">
                        <h4>Change every settings</h4>
                        <p>We've added an awesome, easy & effective option panel in permium version of this plugin. You can change each &amp; every settings of this plugin. You can change colors, you can change styles etc directly form option panel.</p>

                        <a target="_blank" href="http://relatedcontentwp.com/edd-related-downloads-carousel/" class="button button-primary">See Screenshots</a>
                    </div>
                </div>
                
                
                
                <div class="welcome-panel-column welcome-panel-last">
                    <div class="panel-desc-edd">
                        <h4>5 Preloaded styles</h4>
                        <p>There is 5 preloaded modern carousel style added in premium version. You can choose that styles form its options panel. We are adding styles day by day. We offer free update in premium version. Check styles screenshots form here.</p>

                        <a target="_blank" href="http://relatedcontentwp.com/edd-related-downloads-carousel/" class="button button-primary">See Styles Preview</a>
                    </div>
                </div>
            </div>
               
            <div class="welcome-panel-column-container">    
                <span></span>
                <div class="welcome-panel-column">
                    <div class="panel-desc-edd">
                        <h4>Awesome support team</h4>
                        <p>Our all premium plugin includes dedicated support. You just have to inform us how we can help you. Our support team is always ready to assist you if you face any problem like installation, confugring or others. </p>

                    </div>
                </div>
                
                
                <div class="welcome-panel-column">
                    <div class="panel-desc-edd">
                        <h4>Free updates</h4>
                        <p>All of our plugin is updating continueasly. We are adding more freatures day by day. We are adding new styles & other features too. You will get those updates by free! We will inform you after each updates with updating instructions.</p>

                    </div>
                </div>
                
                
                
                <div class="welcome-panel-column welcome-panel-last">
                    <div class="panel-desc-edd">
                        <h4>Cheapper than other premium plugin</h4>
                        <p>Our premium plugin is cheaper than other premium plugin, no monthly or yearly subscription, no other condtion. You need purchase one time &amp; you will get all features, updates life time. Really!</p>

                    </div>
                </div>
                
                
            </div>
            
            <div id="feature-list-wrap" class="welcome-panel-column-container">
                <div class="panel-desc-edd-top">
                    <h3>Other Features</h3>
                    <ul id="edd-rel-feature-list">
                        <li>Easy to use</li>
                        <li>Works in any wordpress theme</li>
                        <li>Unlimited colors</li>
                        <li>Mobile touch supported</li>
                        <li>CSS3 Transition with IE fallback</li>
                        <li>Responsive for all devices</li>
                        <li>Easy admin panel</li>
                        <li>Detailed documentation</li>
                    </ul>

                    
                </div>
            </div>            
            
            <div id="last-purchase-feature" class="welcome-panel-column-container">
                <div class="panel-desc-edd">
                    <h3>So, why you are waiting for? Grab those features in 5 minutes. It is only $12.</h3>
                    <a target="_blank" href="http://codecanyon.net/item/edd-related-downloads-carousel/10400059?ref=relatedcontentwp" class="button button-primary button-hero">Purchase now!</a>
                </div>
            </div>
        </div>
    </div>    
</div>

<?php
}


function eddf_related_download_list($taxonomy = '') {
	
	global $post;

    
    $content ='';
	
	if($taxonomy == '') { $taxonomy = 'download_category'; }
	
	$tags = wp_get_post_terms($post->ID, $taxonomy, array("fields" => "ids"));
    
    $product_terms = wp_get_object_terms( $post->ID,  'download_category' );
    
			foreach( $product_terms as $term ) {
                $related_terms_id = $term->term_id;         
            }
    
	if ($tags) {

		$args = array(
			'post_type' => get_post_type($post->ID),
			'posts_per_page' => 4,
            'post__not_in'=>array($post->ID),
			'tax_query' => array(
				'relation' => 'OR',
				array(
					'taxonomy' => $taxonomy,
					'terms' => $related_terms_id,
					'field' => 'id',
					'operator' => 'IN',
				)
			)
		);
		$related = get_posts($args);
		$i = 0;
		if( $related ) {
			global $post;
            
            
            $content .='
                <style>
                    .eddf-related-fl-carousel-main .edd-add-to-cart.edd-submit, .eddf-related-fl-carousel-main .edd_go_to_checkout.edd-submit, .eddf-5-related-dl-featured-img a, .eddf-related-fl-carousel-wrap .owl-nav > div {
                      background-color: #26cda4;
                    }
                    .eddf-related-fl-carousel-main .edd-add-to-cart.edd-submit:hover, .edd-related-fl-carousel-main .edd_go_to_checkout.edd-submit:hover {
                      background-color: #000;
                    }                    
                </style>
            ';
            
            $content .= '
            <script type="text/javascript">
                jQuery(document).ready(function($) {
                    $(".eddf-related-fl-carousel-wrap").owlCarousel({
                        loop:true,
                        margin:10,
                        autoplay: true,
                        autoplayTimeout: 5000,
                        nav:true,
                        autoplayHoverPause:true,
                        responsive:{
                            0:{
                                items:1
                            },
                            600:{
                                items:2
                            },
                            1000:{
                                items:2
                            }
                        }                
                    })            
                });    
            </script>              
            
            <div class="eddf-related-fl-carousel-main"> 
                <h2 class="related-dl-title-top">Related Downloads</h2>
                <div class="eddf-related-fl-carousel-wrap"> 
            ';
            

				foreach($related as $post) : setup_postdata($post);
            
                $idd = get_the_ID();
                $item_price_we = edd_get_download_price($idd);
                $excerpt_length = apply_filters( 'excerpt_length', 30 );
                $excerpt_print = apply_filters( 'edd_downloads_excerpt', wp_trim_words( get_post_field( 'post_excerpt', get_the_ID() ), $excerpt_length ) );
                $content_print = apply_filters( 'edd_downloads_excerpt', wp_trim_words( get_post_field( 'post_content', get_the_ID() ), $excerpt_length ) );
            
            
            
                $item_purchase_link = edd_get_purchase_link( array( 'download_id' => $idd ) );
                $eddf_carousel_featured_img = wp_get_attachment_image_src( get_post_thumbnail_id( $idd ), 'large' );  

           
            
                        $content .='
                            <div id="eddf-rel-4-carousel-'.$idd.'" class="single-4-eddf-related-dl-carousel">
                                <div class="eddf-4-related-dl-featured-img">
                                    <a href="'.get_permalink().'"><div style="background-image:url('.$eddf_carousel_featured_img[0].')" class="eddf-4-related-carousel-f-bg"></div></a>
                                </div>
                                
                                
                                    <div class="single-4-eddf-related-clink">
                                        <div class="single-4-eddf-related-carousel-inner">
                                            <h2 id="eddf-carousel-title"><a href="'.get_permalink().'">' .do_shortcode( get_the_title() ). '</a></h2>
                                            ';
            
                            if ( has_excerpt() ) :
                                $content .=' '.$excerpt_print.' ';
                            elseif ( get_the_content() ) :
                                $content .=' '.$content_print.' ';
                            endif;
            
            
                            $content .='
                                            <p class="eddf-item-4-price">Price: '.edd_get_currency().' '.$item_price_we.'</p>
                                            <p>'.$item_purchase_link.'</p>
                                        </div>                    
                                    </div>    
                            </div>
                        ';
					
					
				endforeach;
            
            $content .= '</div></div>';
            
		}
	}

	return $content;
}		 


function eddf_related_downloads_we_css_files(){
    wp_enqueue_style( 'eddf-related-downloads-style', plugins_url( '/css/relcarouself.css', __FILE__ ), array(), '1.0', 'all' ); 
}
add_action( 'wp_enqueue_scripts', 'eddf_related_downloads_we_css_files' );


function add_after_post_content_eddrelf($content) {
    
    if( is_singular('download') ) :
        $content .= ' '.eddf_related_download_list().' ';
    endif;

	return $content;
}
add_filter('the_content', 'add_after_post_content_eddrelf');


register_activation_hook(__FILE__, 'eddf_plugin_activate');
add_action('admin_init', 'eddf_plugin_redirect');

function eddf_plugin_activate() {
    add_option('eddf_plugin_do_activation_redirect', true);
}

function eddf_plugin_redirect() {
    if (get_option('eddf_plugin_do_activation_redirect', false)) {
        delete_option('eddf_plugin_do_activation_redirect');
        if(!isset($_GET['activate-multi']))
        {
            wp_redirect("options-general.php?page=eddf-related-carousel-dl-options");
        }
    }
}
