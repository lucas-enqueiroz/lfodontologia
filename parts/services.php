<h2>Nossas especialidades</h2>
<ul class="service-list">

  <?php	
	$terms = get_terms('service_type'); 
	$icon = get_term_meta(  get_queried_object_id(), 'category_icon', true );
	
	foreach ( $terms as $term ) {

    if ($term->name != "Especialidades") {
      ?>
  <li class="service-list__item">
    <a class="service-list__link" href="<?php get_term_link($term->term_id) ?>">
      <img class="service-list__img" src="<?php echo $icon ?>" alt="">
      <h3 class="service-list__title"><?php echo $term->name ?></h3>
      <p><?php echo $desc ?></p>
    </a>
  </li>
  <?php
    }
    $desc = get_term_meta( $term->term_id, 'category_description', true );
    $icon = get_term_meta( $term->term_id, 'category_icon', true );
    ?>


  <?php } ?>

</ul>