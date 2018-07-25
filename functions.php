<?php

// when our parent theme has loaded
add_action('visix_base_loaded', function () {

    /**
     * include Visix plugins
     */
    visix_init_plugins(['woocommerce', 'forms']);

});
