<?php $contato = get_page_by_title('contato')->ID; ?>

<ul class="sociais">
  <?php
	$redes_sociais = get_field('redes_sociais', $contato);
	if(isset($redes_sociais)) { foreach($redes_sociais as $rede) { ?>
  <li class="sociais-list">
    <a class="sociais-link" href="<?php echo $rede['link_social'] ?>" target="_blank">
      <img class="contato-icon sociais-list__icon" src="<?php echo $rede['imagem_social'] ?>" alt="<?php echo $rede['nome_social'] ?>">
    </a>
  </li>
  <?php } } ?>
</ul>