<?php
// Template Name: Contato
get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section class="lfodonto-banner">
  <h1 class="lfodonto-banner__title"><?php the_title(); ?></h1>
</section>

<section class="contato container">

  <div class="contato-info">
    <div>
      <h3>Dados</h3>
      <?php  get_template_part('parts/contact'); ?>
    </div>
    <div>
      <h3>Redes Sociais</h3>
      <?php get_template_part('parts/social'); ?>
    </div>
  </div>
</section>
<section class="contato-form container">
  <?php echo do_shortcode( '[contact-form-7 id="1781" title="Formulario de Contato"]' ); ?>
</section>
<section class="contato_mapa">
  <?php  get_template_part('parts/location'); ?>
</section>
<?php endwhile; else: endif; ?>

<?php get_footer(); ?>