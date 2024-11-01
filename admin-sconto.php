<?php
/*
  Plugin Name: Label Percentage Discount
  Description: Calculate percentage and discount. Show percentage (%) Discount  on the category page and on the product page
  Author: Marco Barbadoro
  Author URI: https://www.marcobarbadoro.it
  Plugin URI: https://www.marcobarbadoro.it/woo/negozio/
  License: GPL2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
  Version: 1.0.2
  Requires at least: 5.0.0
  Tested up to: 6.6.1
  Requires WooCommerce at least: 5.0.0
  WC tested up to: 9.1.4
*/

// Verifica se WooCommerce è attivo
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

    if ( ! class_exists( 'LPD_Per_sconto' ) ) {

        class LPD_Per_sconto {

            public function __construct() {
                // Azioni di inizializzazione WooCommerce
                add_action( 'woocommerce_init', array( $this, 'lpd_woocommerce_loaded' ) );
                add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );
                add_action( 'init', array( $this, 'lpd_include_template_functions' ), 20 );

                if ( is_admin() ) {
                    // Codice specifico per l'admin (se necessario)
                }

                if ( is_ssl() ) {
                    // Codice specifico per SSL (se necessario)
                }
            }

            public function lpd_woocommerce_loaded() {
                // Placeholder per funzionalità caricate con WooCommerce
            }

            public function plugins_loaded() {
                // Placeholder per funzionalità caricate con altri plugin
            }

            public function lpd_include_template_functions() {
                // Includi le funzioni per il calcolo e la visualizzazione dello sconto
                include( plugin_dir_path( __FILE__ ) . 'sconto.php' );
            }
        }

        // Inizializza il plugin
        $GLOBALS['lpd_per_sconto'] = new LPD_Per_sconto();
    }
}