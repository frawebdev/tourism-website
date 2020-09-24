<?php

if(get_field('disponibile', 'category_' . $args['value']->term_id) == true){

?>

    <div class="container d-flex flex-column flex-sm-row align-items-center justify-content-between mb-5" style="border-bottom: 3px solid #6e32d2" data-aos="fade-up" data-aos-duration="700">
        <div class="container text-sm-left text-center">
            <p class="text-muted mb-1">dal <?php echo get_field('inizio', 'category_' . $args['value']->term_id); ?> al <?php echo get_field('fine', 'category_' . $value->term_id); ?></p>
            <h2 class="mb-1"><a style="font-weight: bolder;" class="read-more" href="<?php echo get_category_link($args['value']->term_id); ?>"><?php echo $args['value']->name; ?></a></h2>
        </div>
        <a class="btn btn-prenota text-white m-4">Prenota</a>
    </div>

<?php

} else {

?>

    <div class="container d-flex flex-column flex-sm-row align-items-center justify-content-between mb-5" style="border-bottom: 3px solid rgba(172, 171, 173, 0.603)" data-aos="fade-up" data-aos-duration="700">
        <div class="container text-sm-left text-center">
            <p class="text-muted mb-1" style="color: rgba(172, 171, 173, 0.603);">dal <?php echo get_field('inizio', 'category_' . $args['value']->term_id); ?> al <?php echo get_field('fine', 'category_' . $args['value']->term_id); ?></p>
            <h2 class="mb-1"><a style="font-weight: bolder;" class="read-more" href="<?php echo get_category_link($args['value']->term_id); ?>"><?php echo $args['value']->name; ?></a></h2>
        </div>
        <div>
        <a class="btn btn-prenota text-white m-4" style="background-color: rgba(172, 171, 173, 0.603); pointer-events: none">Posti Esauriti</a>
        </div>
    </div>

<?php

}

?>

