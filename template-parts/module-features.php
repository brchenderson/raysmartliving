<?php
$start_color =  get_sub_field('start_color');
$alternate_color = $start_color == 'white' ? 'yellowgreen' : 'white';
?>
<section class="section__heading <?php the_sub_field('color');?>">
  <h2 class="section__heading--text"><?php the_sub_field('heading'); ?></h2>
</section>

<section class="section__features">
<?php if( have_rows('feature_info') ):
    $i = 0;
    while ( have_rows('feature_info') ) : the_row(); ?>
    <?php    $the_image = get_sub_field('image'); ?>
    <div class="section__features--item row <?php echo $i % 2 === 0 ? $start_color . '-start even' : $alternate_color . '-start odd' ?>">
    <div class="section__features--image  <?php echo $i % 2 === 0 ? $start_color . '-start even' : $alternate_color . '-start odd' ?>" data-parallax="scroll" data-image-src="<?php echo $the_image['sizes']['medium']; ?>" data-speed="0.9"></div>
    <div class="section__features--text  <?php echo $i % 2 === 0 ? $start_color . '-start even' : $alternate_color . '-start odd' ?>">
      <h4 class="section__features--heading"><?php the_sub_field('heading'); ?></h4>
      <div class="section__features--description"><?php the_sub_field('description'); ?></div>
    </div>
    </div>
<?php
    $i++;
    endwhile;

else :


endif;
?>
</section>
