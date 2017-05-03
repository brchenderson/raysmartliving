<?php

global $post;
$post_slug=$post->post_name;
$images = get_sub_field('gallery');
$has_pano = false;

if( $images ): ?>
    <section class="section__gallery <?php if ($post_slug = 'gallery'){ ?>gallery-page<?php } ?>">
    <div id="slider" class="flexslider section__gallery--main-slider<?php if (get_sub_field('show_thumbnails')){ ?> show_thumbnails with_<?php the_sub_field('thumbnail_position');?><?php } ?>">
            <?php foreach( $images as $key=> $image ): ?>
                <div>
                  <?php
                    $img_src = wp_get_attachment_image_url( $image['id'], 'large' );
                    $img_srcset = wp_get_attachment_image_srcset( $image['id'], 'medium' );
                    ?>
                    <img src="<?php echo esc_url( $img_src ); ?>"
                     srcset="<?php echo esc_attr( $img_srcset_med ); ?>"
                      alt="<?php $image['caption']; ?>">

                    <?php if(get_sub_field('show_captions')){ ?>
                      <h3 class="section__gallery--caption-title"><a href="<?php echo get_field('business_link', $image['id']); ?>"><?php echo $image['caption']; ?></a></h3>
                    <?php } ?>
                </div>
            <?php endforeach; ?>

    </div>
    <?php if (get_sub_field('show_thumbnails')){ ?>
    <div id="sliderControls" class="flexslider section__gallery--control-slider <?php the_sub_field('thumbnail_position');?>">
            <?php foreach( $images as $image ): ?>
                <div>
                    <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
                </div>
            <?php endforeach; ?>

    </div>
  </section>
    <?php } ?>
    <script>
      jQuery(document).ready(function(){
        jQuery('#slider').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          lazyLoad: 'ondemand',
          <?php if(get_sub_field('autoplay')){ ?>
          autoplay: true,
          autoplaySpeed: 4000,
          <?php } ?>
          <?php if($has_pano){ ?>
          draggable: false,
          touchMove: false,
          <?php } ?>
          arrows: <?php echo get_sub_field('use_arrows') ? 'true' : 'false'; ?>,
          dots: <?php echo get_sub_field('use_dots') ? 'true' : 'false'; ?>,
          <?php if (get_sub_field('show_thumbnails')){ ?>asNavFor: '#sliderControls',<?php } ?>
          <?php if (get_sub_field('use_dots') === false && get_sub_field('use_arrows') === false){ ?>
            responsive: [
              {
                breakpoint: 768,
                settings: {
                  arrows: true
                }
              },
            ],
          <?php } ?>

        });
        <?php if (get_sub_field('show_thumbnails')){ ?>
          jQuery('#sliderControls').slick({
            slidesToShow: 9,
            slidesToScroll: 1,
            asNavFor: '#slider',
            arrows: true,
            dots: false,
            <?php echo (count($images) < 12 )  ? '' : 'centerMode: true,'; ?>
            focusOnSelect: true,
          });
        <?php } ?>
      });
    </script>
<?php endif; ?>
