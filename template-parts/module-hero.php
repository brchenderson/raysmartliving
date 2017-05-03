<?php
$the_image = get_sub_field('image');

$hero_arrow_down = get_hero_arrow_down();

//
 ?>
 <section class="section__hero" data-parallax="scroll" data-image-src="<?php echo $the_image['url']; ?>">
   <h1 class="section__hero--title">
     <?php the_sub_field('heading'); ?>
   </h1>
   <div class="section__hero--arrow-down">
     <div class="section__hero--arrow-down-spacing <?php echo $hero_arrow_down; ?>"></div>
     <img src="<?php echo get_template_directory_uri() . '/images/' . $hero_arrow_down . '.png'?>" />
     <div class="section__hero--arrow-down-spacing  <?php echo $hero_arrow_down; ?>"></div>
   </div>
</section>
