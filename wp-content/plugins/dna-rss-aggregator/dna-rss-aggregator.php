<?php
/*
Plugin Name: DNA RSS Aggregator
Description: Importe automatiquement des articles depuis des flux RSS externes.
Version: 1.0
Author: Example Author
*/

if ( ! defined( 'ABSPATH' ) ) exit;

function dna_import_rss_items() {
    include_once ABSPATH . WPINC . '/feed.php';

    // Liste des flux RSS à importer
    $feeds = array(
        'https://example.com/feed',
        // Ajoutez d'autres flux ici
    );

    foreach ( $feeds as $feed_url ) {
        $rss = fetch_feed( $feed_url );
        if ( is_wp_error( $rss ) ) {
            continue;
        }

        foreach ( $rss->get_items() as $item ) {
            // Vérifie si un article portant le même titre existe déjà
            $existing = get_page_by_title( $item->get_title(), OBJECT, 'post' );
            if ( ! $existing ) {
                wp_insert_post( array(
                    'post_title'   => $item->get_title(),
                    'post_content' => $item->get_content(),
                    'post_status'  => 'publish',
                    'post_date'    => $item->get_date( 'Y-m-d H:i:s' ),
                    'post_author'  => 1
                ) );
            }
        }
    }
}
add_action( 'dna_rss_import_event', 'dna_import_rss_items' );

if ( ! wp_next_scheduled( 'dna_rss_import_event' ) ) {
    wp_schedule_event( time(), 'hourly', 'dna_rss_import_event' );
}

register_deactivation_hook( __FILE__, function() {
    $timestamp = wp_next_scheduled( 'dna_rss_import_event' );
    if ( $timestamp ) {
        wp_unschedule_event( $timestamp, 'dna_rss_import_event' );
    }
} );
