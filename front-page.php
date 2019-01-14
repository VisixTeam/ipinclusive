<?php get_header(); ?>

<?php $post_id = (is_home() ? get_option('page_for_posts') : get_the_ID());?>

<?php $hero_slider = get_field('hero_slider'); ?>
<?php if ($hero_slider): ?>

<section class="banner home-banner" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "arrows": true, "autoplay": true, "autoplaySpeed": 5000 , "infinite": true, "variableWidth": false, "responsive": [{"breakpoint":992,"settings":{"slidesToShow": 1}}]}'>

  <?php foreach($hero_slider as $slide): ?>

  <div class="slide-item">
    <div class="grid-x grid-margin-y align-middle" style="background-image: url(<?= esc_url($slide['slide_image']); ?>);">
      <div class="slide-container hide-for-small-only">
        <div class="cell">
          <h5 class="ip-pink slide-title"><?= $slide['slide_title'];  ?></h5>
        </div>
        <div class="cell large-6">
          <h2 class="h1 ip-teal slide-content"><?= $slide['slide_content']; ?></h2>
        </div>
        <div class="cell">
          <a href="<?= $slide['slide_cta_url']; ?>" class="ip-orange">Learn more <i class='icon icon-long-arrow-right ip-orange'></i></a>
        </div>
      </div>
    </div>



    <div class="mobile-slide-content show-for-small-only">
      <div class="grid-x grid-margin-y grid-padding-x align-middle">
        <div class="slide-container">
          <div class="cell">
            <h5 class="ip-pink slide-title"><?= $slide['slide_title'];  ?></h5>
          </div>
          <div class="cell large-6">
            <h2 class="h1 ip-teal slide-content"><?= $slide['slide_content']; ?></h2>
          </div>
          <div class="cell">
            <a href="<?= $slide['slide_cta_url']; ?>" class="ip-orange">Learn more <i class='icon icon-long-arrow-right ip-orange'></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php endforeach; ?>

</section>

<div class="slider-progress">
  <div class="progress"></div>
</div>

<?php endif; ?>

<?php if ( have_rows('sections', $post_id) ): ?>

  <?php while ( have_rows('sections', $post_id) ) : the_row();  ?>

    <?php visix_partial( 'modules/' . get_row_layout(), get_row(true)['data'] ); ?>

  <?php endwhile;  ?>

<?php endif; ?>


<?php get_footer(); ?>
