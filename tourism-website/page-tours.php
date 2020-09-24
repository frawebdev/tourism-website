<?php get_header(); ?>

<main>

<div class="row">
	
<?php foreach(displayInToursPage() as $tour){ ?>
	<a href="<?php echo get_category_link($tour); ?>" class="card text-white col-md-6" style="width: 100%;>
	  <img src="<?php echo get_field('thumbnail', 'category_' . $tour); ?>" class="img-fluid">
	</a>
<?php } ?>
	
</div>

</main>

<?php get_footer(); ?>