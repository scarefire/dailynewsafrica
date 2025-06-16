<?php
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('dailynewsafrica-child-style', get_stylesheet_uri(), [], '1.0');
});

// Place additional customizations here.
