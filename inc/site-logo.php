<?php 
/**
 * Site Logo
 *
 * @package      TheWave
 * @author       Luis Colomé
 * @since        1.0.0
 * @license      GPL-2.0+
**/


/*
 * Remplazamos el título del sitio por código HTML personalizado.
 */
function personal_genesis_seo_title( $titulo ) {
    
    $titulo = '<p itemprop="headline" class="site-title"><a title="' . get_bloginfo('name') . '" href="' . get_bloginfo('url') . '"><img src="'. get_stylesheet_directory_uri() .'/images/logo-the-wave-midnight.png" alt=""></a></p>';
        
    return $titulo;
}
add_filter( 'genesis_seo_title', 'personal_genesis_seo_title', 10, 1 );

