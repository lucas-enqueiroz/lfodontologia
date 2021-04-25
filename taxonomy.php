<?php get_header(); ?>


<section class="container servicos">
	
  <h1 class="title"><?php single_term_title(); ?></h1>

<?php if ( have_posts() ) : ?>



  <ul class="service-list">

    <? while ( have_posts() ) : the_post(); ?>

    <li class="service-list__item">
      <a class="service-list__link" href="<?php the_permalink(); ?>">
        <?php if ( has_post_thumbnail() ) { the_post_thumbnail('thumbnail'); }  ?>
        <h3 class="service-list__title"><?php the_title(); ?></h2>
          <?php the_content(); ?>
      </a>
    </li>

    <?php endwhile; ?>


  </ul>

<?php endif; ?>
	
</section>

<?php get_footer(); ?>