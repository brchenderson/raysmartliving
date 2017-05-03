<?php
$the_image = get_sub_field('image');
 ?>
<section class="section__full-width-image" data-parallax="scroll" data-speed="0.9" data-image-src="<?php echo $the_image['sizes']['retina'] ? $the_image['sizes']['retina'] : $the_image['sizes']['large']; ?>">

</section>
