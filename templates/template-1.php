<?php
/**
 *
 */
	global $post;
    $rnd_digi_desgi = get_post_meta($post->ID, 'rnd_digi_desgi', true);
    $rnd_digi_company = get_post_meta($post->ID, 'rnd_digi_company', true);
    $rnd_digi_address = get_post_meta($post->ID, 'rnd_digi_address', true);
    $rnd_digi_email = get_post_meta($post->ID, 'rnd_digi_email', true);
    $rnd_digi_website = get_post_meta($post->ID, 'rnd_digi_website', true);
    $rnd_digi_phone = get_post_meta($post->ID, 'rnd_digi_phone', true);
    $rnd_digi_telphone = get_post_meta($post->ID, 'rnd_digi_telphone', true);
    $rnd_digi_whatsapp = get_post_meta($post->ID, 'rnd_digi_whatsapp', true);
    $rnd_digi_fax = get_post_meta($post->ID, 'rnd_digi_fax', true);
    $rnd_digi_facebook = get_post_meta($post->ID, 'rnd_digi_facebook', true);
    $rnd_digi_twitter = get_post_meta($post->ID, 'rnd_digi_twitter', true);
    $rnd_digi_linkedin = get_post_meta($post->ID, 'rnd_digi_linkedin', true);
    $rnd_digi_insta = get_post_meta($post->ID, 'rnd_digi_insta', true);
    $rnd_digi_youtube = get_post_meta($post->ID, 'rnd_digi_youtube', true);
    $terms =$service = get_the_terms($post->ID, 'services');
    $card_link = get_the_permalink($post->ID);
    $gr_link = "https://chart.googleapis.com/chart?chs=300x300&cht=qr&choe=UTF-8&chl=". $card_link;
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body>

    <?php
    
    include 'modal-popup.php'; ?>
    <div class="rnd_main-wrapper">
        <div class="rnd_headerbg digi-card2">
            <div class="digi-main-header">
                <div class="digi-nav digi-nav2">
                    <ul>
                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#basic_info" data-toggle="modal" data-target="#basic_info"><span><i
                                        class="fas fa-user"></i></span>Basic Info</a></li>
                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#service_modal" data-toggle="modal" data-target="#service_modal"><span><i
                                        class="fas fa-list-ul"></i></span>Service</a></li>
                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#gallery_modal" data-toggle="modal" data-target="#gallery_modal"><span><i
                                        class="fab fa-envira"></i></span>Gallery</a></li>

                    </ul>
                </div>
                <div class="digi_logo">
                    <a href="#"><?php the_post_thumbnail('small'); ?></a>
                </div>
            </div>

            <div class="contact-detail">
                <div class="card-holder">
                    <h2><strong><?php the_title(); ?></strong> </h2>
                    <?php if (!empty($rnd_digi_desgi)) { ?>
                    <h6><?php echo esc_html($rnd_digi_desgi);	?></h6>
                    <?php } ?>
                </div>
                <ul>
                    <?php if (!empty($rnd_digi_phone)) { ?>
                    <li><a href="tel:<?php echo esc_attr($rnd_digi_phone); ?>"><span><i class="fas fa-phone-alt"></i></span>
                            <p><?php echo esc_html( $rnd_digi_phone); ?></p>
                        </a></li>
                    <?php } ?>
                    <?php if (!empty($rnd_digi_website)) { ?>
                    <li><a href="<?php echo esc_url($rnd_digi_website); ?>" target="_blank"><span><i
                                    class="fas fa-globe"></i></span>
                            <p><?php echo  esc_html($rnd_digi_website); ?></p>
                        </a></li>
                    <?php } ?>
                    <?php if (!empty($rnd_digi_email)) { ?>
                    <li><a href="mailto:<?php echo esc_attr($rnd_digi_email); ?>"><span><i class="fas fa-envelope"></i></span>
                            <p><?php echo esc_html($rnd_digi_email); ?></p>
                        </a></li>
                    <?php } ?>
                    <?php if (!empty($rnd_digi_address)) {       
                    $address_link = 'https://www.google.com/maps/place/' . urlencode($rnd_digi_address);
                    ?>
                                 
                    <li>
                    <a href="<?php echo $address_link; ?>" target="_blank"> <span><i class="fas fa-map-marker-alt"></i></span>
                        <p><?php echo esc_html($rnd_digi_address); ?></p>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="footer-bottom">

                <img src="<?php echo $gr_link; ?>" />

			
            <div class="our-services">
                <ul>
                    <?php foreach ($terms as $singl_term) { ?>
                    <li><a href="#"><?php echo esc_html($singl_term->name); ?></a></li>
                    <?php } ?>


                </ul>
            </div>
            <div class="follow-us">
                <ul>
                  <?php if (!empty($rnd_digi_facebook)) { ?>
                    <li class="facebook"><a href="<?php echo $rnd_digi_facebook; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                  <?php } if (!empty($rnd_digi_insta)) { ?>
                    <li class="instagram"><a href="<?php echo $rnd_digi_insta; ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    <?php } if (!empty($rnd_digi_youtube)) { ?>
                    <li class="youtube"><a href="<?php echo $rnd_digi_youtube; ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
                    <?php } if (!empty($rnd_digi_twitter)) { ?>
                    <li class="twitter"><a href="<?php echo $rnd_digi_twitter; ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                     <?php } if (!empty($rnd_digi_linkedin)) { ?>
                    <li class="pinterest"><a href="<?php echo $rnd_digi_linkedin; ?>" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                    <?php } ?>
                </ul>
            </div>

        </div>
        </div>
    </div>
</body>

</html>