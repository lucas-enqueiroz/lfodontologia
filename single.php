<?php
// Template Name: Single Service
get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<main class="service-banner">
  <div class="service-banner__content ">
    <h1 class="service-banner__title"><?php the_title(); ?></h1>
    <div class="service-banner__contact">
      <p>Ligue agora e agende uma avaliação:
        11 2957-6487 – 11 2023-0746</p>
      <a href="https://wa.me/5511945402048?text=Ola,%20gostaria%20de%20agendar%20uma%20consulta" target="_blank"><i aria-hidden="true" class="fab fa-whatsapp"></i> Marcar via Whatsapp</a>
    </div>
  </div>
</main>
<section class="container service">

  <?php

	$service_content = get_field('service_content');
	foreach($service_content as $content) { 

  $service_image = wp_get_attachment_image_src( $content['service_photo_id'], 'medium');
    
    if(isset($service_image[0])): ?>
  <img align="right" class="service_img" src="<?php echo $service_image[0] ?>" alt="<?php the_title(); ?>">
  <?php endif; 
  
  echo wpautop( $content['service_description'], true ); 

} ?>

  <?php 
    $url = esc_url( get_post_meta( get_the_ID(), 'service_embed', 1 ) );
    echo wp_oembed_get( $url );
  ?>
</section>

<section class="container">
  <div class="contato_sidebar">
    <h2>Entre Em Contato E Agende Sua Consulta</h2>
    <?php include( get_stylesheet_directory(). "/inc/contato.php"); ?>
  </div>

  <ol>
    <?php
// The Query
$the_query = new WP_Query( 'post_type=servicos' );
// var_dump($the_query);

// The Loop
while ( $the_query->have_posts() ) : $the_query->the_post();

?>
    <li>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </li>
    <?php 
endwhile;

// Reset Post Data
wp_reset_postdata();
?>
  </ol>
</section>

<?php endwhile; else: endif; ?>

<?php get_footer(); ?>