<?php
// Template Name: Sobre
get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section class="section_banner lfodonto-banner">
  <h1 class="lfodonto-banner__title"><?php the_title(); ?></h1>
</section>

<div class="about-info container">
  <section class="section_about clinic ">
    <?php the_content(); ?>

    <?php cmb2_output_file_list( '_clinic_file_list', 'small' ); ?>

  </section>

  <aside class="aside_contact">
    <div class="contato_sidebar">
      <h2>Entre Em Contato E Agende Sua Consulta</h2>
      <?php  get_template_part('parts/contact'); ?>
    </div>
  </aside>
</div>

<?php endwhile; else: endif; ?>

<?php get_footer(); ?>