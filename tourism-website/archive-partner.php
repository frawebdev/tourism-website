<?php get_header(); ?>

<main class="container text-center">
	<h1>Partners</h1>
	<p>
		Ringraziamo tutti i partner che ci hanno sostenuto nella partecipazione all’ 
AVVISO PUBBLICO <br>
Itinerario Giovani (Iti.Gi.) spazi e ostelli
(DGR 511/2011 – Piano annuale a favore dei giovani,
DGR 844/2018 e DGR 200/2019 - Linee guida Iti.Gi)<br>
		Elenco Partners
	</p>
</main>

<main class="container mt-5 mb-5 row">

<?php while(have_posts()){ 
    the_post();?>

    <div class="col">
      <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="card-img" alt="<?php the_title(); ?>">
    </div>

<?php } ?>

</main>

<div class="w-100" style="background-color: #584596;">
	<?php echo do_shortcode('[wpforms id="86"]'); ?>
</div>

<?php get_footer(); ?>