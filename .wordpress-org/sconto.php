<?php
// Rimuovi il messaggio "In offerta!" dalla pagina del prodotto e dalle pagine delle categorie
add_filter('woocommerce_sale_flash', 'rimuovi_etichetta_in_offerta');

function rimuovi_etichetta_in_offerta() {
    return ''; // Rimuove l'etichetta predefinita
}




add_action( 'woocommerce_after_shop_loop', 'lpd_prezzo_personalizzato_stile', 11 );

function lpd_prezzo_personalizzato_stile() {
	
	
		echo '<style>

.scontob {
    position: absolute;
    top: 0px;
    right: 0px;
    font-size: 13px;
    text-transform: uppercase;
   
    border-radius: 3px;
    background-color: #bf0d00;
    color: white;
    padding: 3px 8px;
    line-height: 1;
    font-weight: 400;
	z-index: 9;
}	
</style>';
	
	
	
	  };
	
	



// Mostra l'etichetta dello sconto nella pagina del singolo prodotto
add_action('woocommerce_single_product_summary', 'lpd_prezzo_personalizzato_etichetta', 9);




function lpd_prezzo_personalizzato_etichetta() {
	
	
		echo '<style>
.scontoa {
    background-color: #bf0d00;
    color: white;
    padding: 3px 8px;
    text-transform: uppercase;
    font-weight: 600;
    font-size: .875em;
    display: inline;
    border-radius: 3px;
}
.scontob {
    position: absolute;
    top: 0px;
    right: 0px;
    font-size: 13px;
    text-transform: uppercase;
   
    border-radius: 3px;
    background-color: #bf0d00;
    color: white;
    padding: 3px 8px;
    line-height: 1;
    font-weight: 400;
	z-index: 9;
}	
</style>';
	
	
	
    global $product;

	

	
	
    if ($product->is_on_sale()) {
        $locale = get_locale();
        $lpd_sconto_text = ('it_IT' === $locale) ? 'Sconto' : 'Sale';
        $lpd_sconto = round((($product->get_regular_price() - $product->get_sale_price()) / $product->get_regular_price()) * 100);

        echo '<div class="scontoa">' . esc_html($lpd_sconto_text) . ' ' . esc_html($lpd_sconto) . '%</div>';
    }
}

// Mostra l'etichetta dello sconto nella pagina della categoria
add_action('woocommerce_after_shop_loop_item_title', 'lpd_azione_personalizzata', 1);

function lpd_azione_personalizzata() {
	
	

	

    global $product;

    if ($product->is_on_sale()) {
        $locale = get_locale();
        $lpd_sconto_text = ('it_IT' === $locale) ? 'Sconto' : 'Sale';
        $lpd_sconto = round((($product->get_regular_price() - $product->get_sale_price()) / $product->get_regular_price()) * 100);

        echo '<div class="scontob">' . esc_html($lpd_sconto_text) . ' ' . esc_html($lpd_sconto) . '%</div>';
    }
}

?>