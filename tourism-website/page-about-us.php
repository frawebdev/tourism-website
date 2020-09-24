<?php get_header(); ?>

<main class="container mt-5 mb-5">

<?php while(have_posts()){ 
    the_post();?>

<div class="card">
  <div class="card-body text-center">
    <h2 class="card-title"><?php the_title(); ?></h2>
    <p class="card-text"><?php the_content(); ?></p>
  </div>
</div>

<img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid" alt="<?php the_title(); ?>">

<?php } ?>

</main>

<?php get_footer(); ?>