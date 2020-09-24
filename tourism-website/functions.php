<?php

//supporto per il logo nel menù

function logo_sup(){
    $default = array(
      'height' => 80,
      'width' => 80,
      'flex-height' => true,
      'flex-width' => true
    );
    add_theme_support('custom-logo', $default);
  }
  
  add_action('after_setup_theme', 'logo_sup');

//inserimento dei dati della card nella rest API

function selectCard(){
    register_rest_route('cards/v1', 'selectcard', array(
        'methods' => 'GET',
        'callback' => 'results'
    ));
}

function results(){
    $cards = new WP_Query(
        array(
            'post_type' => 'card',
			'posts_per_page' => -1
        )
    );

    $results = array();

    while($cards->have_posts()){
        $cards->the_post();
        array_push($results, array(
            'image'     	=> get_the_post_thumbnail_url(),
            'title'     	=> get_the_title(),
            'content'   	=> get_the_content(),
            'excerpt'   	=> get_the_excerpt(),
            'permalink'  	=> get_permalink(),
            'categories' 	=> get_the_category_list(' '),
            'tourCat' 		=> toursCatInFrontPage(),
            'otherCat' 		=> otherCatsInFrontPage(),
			'giorno' 		=> get_field('giorno'),
			'inizio' 	    => get_field('orainizio'),
			'fine' 		    => get_field('orafine'),
			'paese' 		=> get_field('paese')

        ));
    }

    return $results;
}

add_action('rest_api_init', 'selectCard');

//aggiunta dello style

function addStyle(){
    wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css');
	wp_enqueue_style('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css');
    wp_enqueue_style('main', get_stylesheet_uri());
    wp_enqueue_style('font-nunito', "https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap");
    wp_enqueue_style('on-scroll', "https://unpkg.com/aos@2.3.1/dist/aos.css");
}

add_action('wp_enqueue_scripts', 'addStyle');

//aggiunta degli script js

function addJs(){
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.5.1.slim.min.js');
    wp_enqueue_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js');
    wp_enqueue_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js');
    wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/f7b0e89f6c.js');
    wp_enqueue_script('on-scroll-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js');
    wp_enqueue_script('select', get_theme_file_uri('js/select-category.js'), array(), false, true);
    wp_enqueue_script('select', get_theme_file_uri('js/active-status.js'), array(), false, true);
	
}

add_action('wp_enqueue_scripts', 'addJs');

//creazione dei post type

function post_types(){
    register_post_type('card', array(
        'public' => true,
        'labels' => array(
            'name' => 'Cards',
        ),
        'menu_icon' => 'dashicons-images-alt2',
        'taxonomies' => array('category'),
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
        'has_archive' => true
    ));

    register_post_type('partner', array(
        'public' => true,
        'labels' => array(
            'name' => 'Partners'
        ),
        'menu_icon' => 'dashicons-businessman',
        'taxonomies' => array('category'),
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
        'has_archive' => true
    ));
}

add_action('init', 'post_types');

//possibilità di aggiungere un'immagine ai post types

add_theme_support( 'post-thumbnails' );

//excerpt più corto

function excLength(){
    return 10;
}

add_filter('excerpt_length', 'excLength', 999);

//tagline string multilang

add_action('init', function(){
    pll_register_string('tagline', 
                        'lorem ipsum',
                        'polylang',
                        true);

    pll_register_string('btn1',
                        'Prenota un tour',
                        'polylang',
                        true);

    pll_register_string('cosa',
                        'COSA TI INTERESSA?',
                        'polylang',
                        true);

    pll_register_string('prenota',
                        'PRENOTA ORA',
                        'polylang',
                        true);

    pll_register_string('scopri',
                        'SCOPRI DI PIU',
                        'polylang',
                        true);

});

//controllare se la categoria ha un parent

function category_has_parent($catid){
    $category = get_category($catid);
    if ($category->category_parent > 0){
        return true;
    }
    return false;
}

//display categories in front page

function displayInFrontPage(){

    $catArray = array();

    for($i = 0; $i <= 400; $i++){

        if(strpos(get_cat_name(pll_get_term($i)), 'Via') !== false
		||strpos(get_cat_name(pll_get_term($i)), 'Tour') !== false
        || get_cat_name(pll_get_term($i)) == ''
        || get_cat_name(pll_get_term($i)) == 'Senza categoria'
		|| get_cat_name(pll_get_term($i)) == 'Uncategorized'
		|| category_has_parent(pll_get_term($i))){

        } else {

            array_push($catArray, get_cat_name(pll_get_term($i)));
        
        }
    }

    $completeCatArray = array_unique($catArray);

    return $completeCatArray;

}

//display categories in tours page

function displayInToursPage(){

    $catArray = array();

    for($i = 0; $i <= 200; $i++){

        if(strpos(get_cat_name(pll_get_term($i)), 'Tour') !== false
		 ||strpos(get_cat_name(pll_get_term($i)), 'Via') !== false){

            array_push($catArray, get_cat_ID(get_cat_name(pll_get_term($i))));

        }
    }

    $completeCatArray = array_unique($catArray);

    return $completeCatArray;

}

//pulsante prenota tour a scomparsa

function displayBookNow($title){

    if(strpos($title, 'Tour') !== false
	 ||strpos($title, 'Via')  !== false ){ 

        $btn = '<a href="" class="btn btn-color">' . pll__('PRENOTA ORA') . '</a>';

        return $btn;

    }
} 

//recuperare id della pagina dallo slug

function get_id_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}

// seleziona le categorie tour specifiche in single-card.php 

function selectToursOnly(){

    $tourCategories = array();

    $categories = get_the_terms(get_the_ID(), 'category');

    for ($i = 0; $i <= count($categories); $i += 1){

        if(strpos($categories[$i]->name, 'Tour') !== false
        || strpos($categories[$i]->name, 'Via')  !== false){

            array_push($tourCategories, $categories[$i]->name);

        }

    }

    return $tourCategories;

}

function selectToursOnlyInsideLoop(){

    $tourCategories = array();

    $categories = get_the_category();

    for ($i = 0; $i <= count($categories); $i += 1){

        if(strpos($categories[$i]->name, 'Tour') !== false
        || strpos($categories[$i]->name, 'Via')  !== false){

            array_push($tourCategories, $categories[$i]->name);

        }

    }

    return $tourCategories;
    
}

function selectOtherCat(){

    $otherCategories = array();

    $categories = get_the_terms(get_the_ID(), 'category');

    for ($i = 0; $i < count($categories); $i += 1){

        if(strpos($categories[$i]->name, 'Tour') !== false
        || strpos($categories[$i]->name, 'Via')  !== false
		|| category_has_parent($categories[$i]->term_id) == true){

        } else {

            array_push($otherCategories, $categories[$i]->name);

        }
        
    }

    return $otherCategories;

}

function selectOtherCatInsideLoop(){

    $otherCategories = array();

    $categories = get_the_category();

    for ($i = 0; $i < count($categories); $i += 1){

        if(strpos($categories[$i]->name, 'Tour') !== false
        || strpos($categories[$i]->name, 'Via')  !== false
		|| category_has_parent($categories[$i]->term_id) == true){

        } else {

            array_push($otherCategories, $categories[$i]->name);

        }
        
    }

    return $otherCategories;

}

function toursCatInFrontPage(){

    $toursArray = array();

    foreach(selectToursOnly() as $value){

        array_push($toursArray, "<li><a href='" . get_category_link(get_cat_ID($value)) . "' style='background-color: " . get_field('colore', 'category_' . get_cat_ID($value)) . "; border: unset;'>" . $value . "</a></li>");
    
    }

    $tourLinks = implode(' ', $toursArray);

    return $tourLinks;

}

function otherCatsInFrontPage(){

    $otherArray = array();

    foreach(selectOtherCat() as $value){

        array_push($otherArray, "<li><a href='" . get_category_link(get_cat_ID($value)) . "'>" . $value . "</a>");
    
    }

    $otherLinks = implode(' ', $otherArray);

    return $otherLinks;

}

//aggiunta dei tag alle cards

function reg_tag() {
     register_taxonomy_for_object_type('post_tag', 'card');
}

add_action('init', 'reg_tag');