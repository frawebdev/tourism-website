<!DOCTYPE html>
<html lang="en">
<head>
		<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-173911526-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-173911526-1', { 'anonymize_ip': true });
	</script>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-main">
  <a class="navbar-brand" href="<?php echo get_home_url(); ?>"><?php echo get_custom_logo(); ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="outline-color: #7c61d3">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto text-center">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle drop-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: 2px solid white; 
	border-radius: 50px;">
          Tours
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php foreach(displayInToursPage() as $tour){ ?>
          <a class="dropdown-item" href="<?php echo get_category_link($tour); ?>"><?php echo get_cat_name($tour); ?></a>
        <?php } ?>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo get_post_type_archive_link('partner'); ?>">Partners</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo get_the_permalink(pll_get_post(get_id_by_slug('about-us'))); ?>">About Us</a>
      </li>
      <li class="nav-item">
        <a class="btn" href="<?php echo get_the_permalink(pll_get_post(get_id_by_slug('tours'))); ?>"><?php pll_e('Prenota un tour'); ?></a>
      </li>
    </ul>
  </div>
</nav>