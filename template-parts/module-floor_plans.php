<?php
$the_image = get_sub_field('header_image');
$floor_plans = get_terms('floor_plan_type', array(
  'orderby' => 'id',
  'hide_empty' => false,
));

$hero_arrow_down = get_hero_arrow_down();


 ?>
<section class="section__hero floorplans" data-parallax="scroll" data-image-src="<?php echo $the_image['sizes']['retina']; ?>">
  <h1 class="section__hero--title"><?php the_title();?></h1>
  <div class="section__hero--title">
  <?php foreach ($floor_plans as $key => $plan_type) { ?>
    <a href="#" class="section__hero--tab-link <?php echo $key === 0 ? 'current' : '' ?>" data-tab="<?php echo $plan_type->slug; ?>"><?php echo $plan_type->name; ?></a>
  <?php } ?>
  </div>
  <div class="section__hero--arrow-down">
    <div class="section__hero--arrow-down-spacing <?php echo $hero_arrow_down; ?>"></div>
    <img src="<?php echo get_template_directory_uri() . '/images/' . $hero_arrow_down . '.png'?>" />
    <div class="section__hero--arrow-down-spacing  <?php echo $hero_arrow_down; ?>"></div>
  </div>
</section>
<section class="section__floor-plans">
  <div class="section__floor-plans--nav-mobile">
  <?php foreach ($floor_plans as $key => $plan_type) { ?>
    <a href="#" class="section__hero--tab-link <?php echo $key === 0 ? 'current' : '' ?>" data-tab="<?php echo $plan_type->slug; ?>"><?php echo $plan_type->name; ?></a>
  <?php } ?>
  </div>
<?php


foreach ($floor_plans as $key => $plan_type) {
  ?>
  <div id="<?php echo $plan_type->slug; ?>" class="tab-content <?php echo $key === 0 ? 'current' : '' ?>">
  <?php
  $tax_query = array(
  	array(
  		'taxonomy'         => 'floor_plan_type',
  		'terms'            => $plan_type->term_id,
  	),
  );
  // WP_Query arguments
  $args = array(
  	'post_type'              => array( 'floor_plans' ),
    'tax_query'              => $tax_query,
  );

  // The Query
  $query = new WP_Query( $args );
  if($query->have_posts()){
      while ( $query->have_posts() ) {
      $query->the_post();
      ?>
      <div class="section__floor-plans--item row">
        <?php
        if(get_field('gallery')){
        ?>
        <div class="section__floor-plans--gallery">
        <div class="floorplan-slider" id="<?php echo $plan_type->slug . $key; ?>slider">
        <?php
        foreach( get_field('gallery') as $image ): ?>
            <div>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
            </div>
        <?php
      endforeach; ?>
      </div>
    </div>
      <?php } ?>
      <div class="section__floor-plans--description">
      <?php
      echo '<h3 class="section__floor-plans--title">' . get_the_title() . '</h3>';
      echo '<span>' . get_field('square_feet') . ' sqft</span><br />';
      echo '<span>' . get_field('price') . '</span><br />';
      echo '<div class="section__floor-plans--buttons"><a href="https://www.betterleasing.com/apply/?Key=61BFBEA5-ADA5-43CF-B9CE-68CD2A3608EC" class="btn btn-floor-plans">Lease Now</a>';
      if (get_field('floor_plan_pdf')){
          echo '<a href="' . get_field('floor_plan_pdf') . '" class="btn btn-floor-plans" download target="_blank">Save as PDF</a></div>';
      }
      echo '</div></div>';
    }
  }?>
  </div>
  <?php
}
?>

<script>

jQuery(document).ready(function(){
  jQuery('.floorplan-slider').slick({
    arrows: true,
  });
  jQuery('.section__hero--tab-link').click(function(e){
    e.preventDefault();
    var tab_id = jQuery(this).attr('data-tab');

    jQuery('.section__hero--tab-link').removeClass('current');
    jQuery('.tab-content').removeClass('current');

    jQuery(this).addClass('current');
    jQuery("#"+tab_id).addClass('current');
    jQuery('.slick-slider').each(function() {
      jQuery(this).slick("getSlick").refresh();
    });
  });
  jQuery(document).on('scroll',function(){
    //var fpNavTop = jQuery('.section__hero--title').offset().top;
    var fpNavHeight = jQuery('h1.section__hero--title').outerHeight();
    var heroHeight = jQuery('.section__hero.floorplans').outerHeight();
    if(jQuery(window).scrollTop() >= (heroHeight - fpNavHeight)){
      jQuery('div.section__hero--title').css('position', 'fixed');
      jQuery('div.section__hero--title').css('bottom', 'auto');
      jQuery('div.section__hero--title').css('top', '80px');
      jQuery('div.section__hero--title').css('height', fpNavHeight + 'px');
    }
    else if(jQuery(window).scrollTop() < (heroHeight - fpNavHeight)){
      jQuery('div.section__hero--title').css('position', 'absolute');
      jQuery('div.section__hero--title').css('top', 'auto');
      jQuery('div.section__hero--title').css('bottom', '35px');
    }
  });

});
jQuery(window).load(function(){
  jQuery('.slick-slider').each(function() {
    jQuery(this).slick("getSlick").refresh();
  });
});


</script>

</section>
