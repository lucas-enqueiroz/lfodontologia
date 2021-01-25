<?php
// Template Name: Home
get_header();
?>

<?php
echo do_shortcode('[smartslider3 slider="4"]');
?>

<section class="container servicos">

  <h2 class="title">Nossas especialidades</h2>
  <ul class="service-list">

    <?php	$the_query = new WP_Query ( [	'post_type' => 'service' ] ); ?>

    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

    <li class="service-list__item">
      <a class="service-list__link" href="<?php the_permalink(); ?>">
        <?php if ( has_post_thumbnail() ) { the_post_thumbnail('thumbnail'); }  ?>
        <h3 class="service-list__title"><?php the_title(); ?></h2>
          <?php the_content(); ?>
      </a>
    </li>

    <?php endwhile; else: endif;
    
wp_reset_postdata();
?>

  </ul>

</section>

<section class="container section_posts">
  <h2 class="title">Acompanhe nosso Blog</h2>
  <ul class="posts-list">

    <?php	$the_query = new WP_Query ( [	'post_type' => 'post' ] ); ?>

    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

    <li class="posts-list__item">
      <a class="posts-list__link" href="<?php the_permalink(); ?>">
        <?php if ( has_post_thumbnail() ) { the_post_thumbnail('medium'); }  ?>
        <div class="post-list__content">
          <i class="far fa-clock"></i> <?php the_date(); ?>
          <h3><?php the_title(); ?></h2>
            <?php the_excerpt(); ?>
            <span>Veja mais</span>
            <span class="posts-list__date">
            </span>
        </div>
      </a>
    </li>

    <?php endwhile; else: endif; ?>

  </ul>
</section>

<section class="container home_contact">
  <div class="contato_sidebar">
    <h2 class="title">Entre Em Contato E Agende Sua Consulta</h2>
    <?php  get_template_part('parts/contact'); ?>
  </div>

</section>

<section class="contato_mapa">
  <?php  get_template_part('parts/location'); ?>
</section>

<?php get_footer(); ?>