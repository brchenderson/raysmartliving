<section class="section__contact-form">
  <h3 class="section__contact-form--headline"><?php the_sub_field('headline')?></h3>
  <p class="ection__contact-form--intro"><?php the_sub_field('intro')?></p>
  <?php echo do_shortcode( '[contact-form-7 id="25" title="Main Contact Form"]' ); ?>
  <script>
    jQuery("#selectRefer").change(function(){
      if(jQuery("#selectRefer").val() == 'Other'){
        jQuery('.other').css('display', 'inline-block');
      }
      else{
        jQuery('.other').css('display', 'none');
      }
    });
  </script>
</section>
