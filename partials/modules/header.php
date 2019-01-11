<header id="header" data-sticky-container>
  <div class="sticky" data-sticky data-sticky-on="small" data-options="marginTop:0;" style="width:100%">
    <div class="grid-container">
      <div class="grid-x align-middle">
        <div class="cell small-6 mediumLand-2">
          <a href="<?= home_url(); ?>" class="logo">
            <?php visix_partial('svgs/logo'); ?>
          </a>
        </div>
        <div class="show-for-mediumLand cell mediumLand-3 medium-text-center large-text-right">
          <a href="<?= site_url('stay-in-touch'); ?>" class="button teal">Stay in touch</a>
        </div>
        <div class="show-for-mediumLand cell mediumLand-3 text-right">
          <a href="<?= site_url('sign-up-to-the-ip-inclusive-charter'); ?>" class="button orange">Sign the ip inclusive charter</a>
        </div>
        <div class="cell small-3 mediumLand-2 medium-text-center large-text-right">
          <a href="<?= site_url('contact'); ?>">Contact us</a>
        </div>
        <div class="cell small-3 mediumLand-2 text-right">
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

<?php visix_partial('inc/sidebar'); ?>
