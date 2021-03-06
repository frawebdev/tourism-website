<div class="row row-cols-1 row-cols-md-3">

<?php 
		
		$cardLoop = new WP_Query(array(
    	'post_type' => 'card',
    	'cat' => $args['id'],
	    'meta_key'    => 'giorno',
		'orderby'     => 'meta_value',
		'order'       => 'ASC'
		));
		
		$tours = selectToursOnlyInsideLoop();
	
	    $other = selectOtherCatInsideLoop();
			
        while($cardLoop->have_posts()) {
	
		$cardLoop->the_post();
	
	$tours = selectToursOnlyInsideLoop();
	
	$other = selectOtherCatInsideLoop();
	
	?>

<div class="col mb-4">
<div class="card h-100">
	<a href="<?php the_permalink(); ?>" style="overflow: hidden;">
      <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="foto di <?php the_title(); ?>">
		</a>
      <div class="card-body text-justify" style="border-top: 8px solid #6e32d2;">

	  <?php 

	  if($args['title'] !== 'Paesi'
	  && $args['title'] !== 'Villages'){

	?>

		<div class="d-flex flex-row align-items-center justify-content-between info">

		<div><p><i class="far fa-calendar"></i><?php echo get_field('giorno'); ?></p></div>
		<div><p><i class="far fa-clock"></i><?php echo get_field('orainizio'); ?></p></div>
		<div><p><i class="far fa-dot-circle"></i><?php echo get_field('paese'); ?></p></div>
						
		</div>

	  <?php

	  }

	  ?>
        
		  <h5 class="card-title mt-0"><?php the_title(); ?></h5>
		  <ul class="post-categories">
		<?php foreach($tours as $value){ ?> 
        <li>
        <a class="read-more" href="<?php echo get_category_link(get_cat_ID($value)); ?>" style="background-color: <?php echo get_field('colore', 'category_' . get_cat_ID($value)) ?>; border: unset; color: white;"><?php echo $value ?></a>
        </li>
        <?php } ?>
		  </ul>
        <p class="card-text"><?php the_excerpt(); ?></p>
        <a class="read-more" href="<?php the_permalink(); ?>">Leggi di più</a>
        <div>
			<ul class="post-categories-not-tour">
		<?php foreach($other as $value){ ?> 
        <li>
        <a class="read-more" href="<?php echo get_category_link(get_cat_ID($value)); ?>"><?php echo $value ?>
		</a>
        </li>
        <?php } ?>
		  </ul>
		  </div>
      </div>
    </div>
    </div>

	<?php 

	wp_reset_postdata();

	} ?>

</div>