<!-- Adiciona o cabeçalho (header.php) -->
<?php get_header(); ?>

<!-- O loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- Container do artigo -->
<div class="artigo-container">

  <!-- Título do post -->
  <a href="<?php the_permalink(); ?>">
    <h1>
      <?php the_title(); ?>
    </h1>
  </a>



  <!-- Conteúdo do post -->
  <?php the_content(); ?>

</div>

<?php endwhile; ?>
<?php endif; ?>

<!-- Adiciona o rodapé (footer.php) -->
<?php get_footer(); ?>