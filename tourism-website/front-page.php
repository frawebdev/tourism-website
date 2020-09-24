<?php get_header(); ?>

<img src="https://www.offrometour.com/wp-content/uploads/2020/08/corevisual1-Recuperatolow-1-scaled.jpg" class="img-fluid" style="max-width: 100%;">

<section class="d-flex flex-column align-items-center justify-content-center mt-0 container text-center">
	<h1 style="color: #6e32d2; font-size: 18px;">OFF Rome Tour</h1>
	<h2 data-aos="fade-up" data-aos-duration="700">Esci dalla Routine!</h2>
	<p data-aos="fade-up" data-aos-duration="700" style="margin-left: 20%; margin-right: 20%; color: #6e32d2;" class="mt-3">Le cittadine dei Castelli Romani e Monti Prenestini come non le avete mai viste! Visite guidate con teatranti, trekking, sport estremi, gaming, gourmet, formazione, cinema e molto altro! Esci dalla routine!</p>
	<a data-aos="fade-up" data-aos-duration="700" href="" class="btn mt-3" style="color: black; border: solid 3px black;">Iscriviti ai Tour gratuiti</a>
</section>

<main class="container text-center" style="margin-top: 200px;">
<h2 class="mb-5" style="font-weight: bolder; color: #6e32d2; " data-aos="fade-up" data-aos-duration="700"><?php pll_e('COSA TI INTERESSA?'); ?></h2>
<div class="btns d-flex flex-row justify-content-around align-items-center flex-wrap" role="group">
<?php foreach (displayInFrontPage() as $value){?>

  <button type="button" class="cat-btn font-weight-bold"><?php echo $value; ?></button>

<?php } ?>
</div>

<div class="row row-cols-1 row-cols-md-3 container mt-5" id="card-deck" style="margin-left: 0; margin-right: 0;"></div>

</main>

<?php get_footer(); ?>