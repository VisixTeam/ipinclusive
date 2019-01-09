<header id="header" data-sticky-container>
  <div class="sticky" data-sticky data-sticky-on="small" data-options="marginTop:0;" style="width:100%">
    <div class="grid-container">
      <div class="grid-x align-middle">
        <div class="cell small-6 medium-2">
          <a href="<?= home_url(); ?>" class="logo">
            <img src="/wp-content/uploads/2019/01/ip-logo.svg" alt="<?= bloginfo(); ?>">
          </a>
        </div>
        <div class="hide-for-small-only cell medium-3 medium-text-center large-text-right">
          <a href="<?= site_url('contact'); ?>" class="button teal">Stay in touch</a>
        </div>
        <div class="hide-for-small-only cell medium-3 text-right">
          <a href="" class="button orange">Sign the ip inclusive charter</a>
        </div>
        <div class="cell small-3 medium-2 medium-text-center">
          <a href="<?= site_url('contact'); ?>">Contact us</a>
        </div>
        <div class="cell small-3 medium-2 text-right">
          <button class="hamburger hamburger--squeeze" data-toggle="main-menu" type="button">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>
        </div>
      </div>
    </div>
  </div>
</header>
<div class="spacer tiny"></div>

<?php visix_partial('inc/sidebar'); ?>
