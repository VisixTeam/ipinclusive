<header id="header" data-sticky-container>
  <div class="sticky" data-sticky data-sticky-on="small" data-options="marginTop:0;" style="width:100%">
    <div class="grid-container">
      <nav class="grid-x align-middle main-menu">
        <div class="cell small-5 mediumLand-3 large-2">
          <a href="<?= home_url(); ?>" class="logo">
            <?php visix_partial('svgs/logo'); ?>
          </a>
        </div>
        <div class="show-for-mediumLand cell mediumLand-6 text-right">
          <a href="<?= site_url('stay-in-touch'); ?>" class="button teal">Stay in touch</a>&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="<?= site_url('sign-up-to-the-ip-inclusive-charter'); ?>" class="button orange">Sign the ip inclusive charter</a>
        </div>
        <div class="cell small-4 mediumLand-3 medium-text-center large-text-right hide-for-mediumLand-only">
          <a class="button teal" href="<?= site_url('contact'); ?>">Contact us</a>
          &nbsp;
          &nbsp;
          <a href="javascript:;" id="search" data-open="search-modal" class="button clear orange hide-for-small-only"><i class="icon icon-search"></i></a>
        </div>
        <div class="cell small-1 show-for-small-only">
          <a href="javascript:;" id="search" data-open="search-modal" class="button clear orange"><i class="icon icon-search"></i></a>
        </div>
        <div class="cell small-2 mediumLand-1 text-right">
          <button class="hamburger hamburger--squeeze" data-toggle="main-menu" type="button">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>
        </div>
      </nav>
    </div>
  </div>
</header>

<div class="reveal" id="search-modal" data-reveal>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <i class="icon icon-close-circle-o"></i>
  </button>
  <?php get_search_form(); ?>
</div>

<?php visix_partial('inc/sidebar'); ?>
