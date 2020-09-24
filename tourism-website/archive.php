<?php get_header();

$settimane = get_categories(array(
	'type'                     => 'cards',
	'child_of'                 => get_queried_object_id(),
	'hide_empty'               => FALSE,
	'hierarchical'             => 1,
	'taxonomy'                 => 'category',
));

$title = single_term_title('', false);

?>

<img src="<?php echo get_field('immagine'); ?>" style="max-width: 100%; height: auto;" class="cover-img">

<div class="container mt-5">

<div class="container text-center" style="padding-left: 0; padding-right: 0;">
	
<h1 class="container p-0" data-aos="fade-up" data-aos-duration="700"><?php echo $title; ?></h1>

<?php

if(get_field('inizio')
&& get_field('fine')){
	
?>

<p class="text-muted mb-1">dal <?php echo get_field('inizio'); ?> al <?php echo get_field('fine'); ?></p>

<?php
	
}

?>

<p class="mt-5 mb-5" data-aos="fade-up" data-aos-duration="700"><?php echo get_field('testo'); ?></p>

<?php

if($title == 'Paesi'
|| $title == 'Villages'){

?>

<h3 class="mb-5" style="color: #6e32d2;" data-aos="fade-up" data-aos-duration="700">Scopri la campagna romana</h3>

<?php

}

?>

<?php
	
	if(!empty($settimane)){
	
		get_template_part('template-parts/content', 'settimane', array(

			'settimane' => $settimane

		));
	
	} else { 
		
		 get_template_part('template-parts/content', 'categorie', array(

			'id' => get_queried_object_id()

		 )); 
	
	}
	
?>
	
</div>
	
</div>

<?php get_footer(); ?>
  
  