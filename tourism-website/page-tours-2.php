<?php get_header(); ?>

<main class="mt-5">

<?php foreach(displayInToursPage() as $tour){ ?>
  <div class="card text-white" style="height: 70vh; width: 100%; background-image: url('<?php echo get_field('immagine', 'category_' . $tour) ?>'); background-position: center; background-size: cover;">
  <div class="card-img-overlay row">
	    <div class="col-md">
			<h2 class="card-title font-weight-bold"><?php echo get_cat_name($tour); ?></h2>
    <p class="card-text font-weight-bold"><?php echo category_description($tour); ?></p>
		</div>
		<div class="col-md"></div>
		<div class="col-md d-md-flex align-items-end">
			<a class="btn btn-color-reverse m-2" href="<?php echo get_category_link($tour); ?>"><?php pll_e("SCOPRI DI PIU'"); ?></a>
    <a href="" class="btn btn-color m-2"><?php pll_e('PRENOTA ORA'); ?></a>
		</div>
    </div>
</div>
</div>
<?php } ?>

</main>

<?php get_footer(); ?>