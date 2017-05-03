<section class="section__feature-list">

  <svg class="section__feature-list--plus" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><style>.cls-1{fill:#e5e5e5;}</style></defs><title>Artboard 1</title><polygon class="cls-1" points="82.36 43.77 57.23 43.77 57.23 18.64 42.77 18.64 42.77 43.77 17.64 43.77 17.64 58.23 42.77 58.23 42.77 83.36 57.23 83.36 57.23 58.23 82.36 58.23 82.36 43.77"/></svg>
  <?php
  $rows = get_sub_field('feature_info');
  if($rows){
    echo '<ul>';
    foreach ($rows as $row) {
      $li_open = ($row['is_headline'] == 1) ? '<li class="section__feature-list--headline">' : '<li>';
      echo $li_open . $row['feature'] . '</li>';
    } ?>
  </ul>
  <?php } ?>

</section>
