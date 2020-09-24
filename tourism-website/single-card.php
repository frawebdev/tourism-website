<?php get_header(); ?>

<?php while(have_posts()) {
the_post()?>

<?php 
	
	$tours = selectToursOnly(); 
	$other = selectOtherCat();
	$cat = get_the_category();
	$slugs = array();
	
	for($i = 0; $i <= count($cat); $i += 1){
		array_push($slugs, $cat[$i]->slug);
}

	?>

<img src="<?php echo get_the_post_thumbnail_url(); ?>" style="max-width: 100%; height: auto;" class="cover-img">

<main class="container mt-5">

<div class="container text-center" style="padding-left: 0; padding-right: 0;">

<h3>Fa parte di:</h3>

<ul class="post-categories mb-5 d-flex flex-row align-items-center justify-content-center flex-wrap">
        <?php foreach($tours as $value){ ?> 
        <li>
        <a class="read-more" href="<?php echo get_category_link(get_cat_ID($value)); ?>" style="font-size: 15px; background-color: <?php echo get_field('colore', 'category_' . get_cat_ID($value)) ?>; border: unset;"><?php echo $value ?></a>
        </li>
        <?php } ?>
    </ul>

<h1><?php the_title(); ?></h1>
	
	<?php
	
	if(!in_array('paesi', $slugs)
	&& !in_array('villages', $slugs)){
		
		?>
	
    <div class="d-flex flex-row align-items-center justify-content-around info">
					
	<div><p><i class="far fa-calendar"></i><?php echo get_field('giorno'); ?></p></div>
	<div><p><i class="far fa-clock"></i><?php echo get_field('orainizio'); ?> - <?php echo get_field('orafine'); ?></p></div>
	<div><p><i class="far fa-dot-circle"></i><?php echo get_field('paese'); ?></p></div>
					
	</div>
		
	<?php

	}
	
	?>

    <p><?php the_content(); ?></p>

</div>
	
<?php
		
	}
	
?>
	
</main>

<?php

if(has_tag()){

	$tags = get_the_tags();
	
?>

	<section class="container">
	
	<div class="row mt-5">

<?php

	foreach($tags as $value){

?>

		<div class="col-sm">
			<img src="https://www.offrometour.com/wp-content/uploads/2020/08/imgsecondaria_modulovuoto.jpg" class="img-fluid" alt="Responsive image">
			<p><?php echo $value->name; ?></p>
		</div>

<?php

	}

?>

	</div>

	</section>

	<section class="d-flex flex-column flex-sm-row align-items-center justify-content-center mb-5 mt-5">
	<a href="" class="btn m-3" style="border: solid 3px #6e32d2">Iscriviti</a>
	<a href="" class="btn m-3" style="background-color: #6e32d2; color: white; border: solid 3px #6e32d2">Scopri tutti i Tour</a>
	</section>

<?php

}

$settimane = array();

if(!empty($tours)){
	
?>
	
	<h3 class="text-center mb-5 mt-5">Fa parte di:</h3>

<?php

}

?>

<?php

foreach($tours as $value){

$settimana = get_term_children(get_cat_ID($value), 'category');

array_push($settimane, $settimana);

}

	foreach($settimane as $value){

?>

<?php

		for($i = 0; $i < count($value); $i += 1){


			get_template_part('template-parts/content', 'disponibile-single-card', array(

			'settimane' => $value[$i]

));

		}

?>

<?php

	}

?>

<?php get_footer(); ?>