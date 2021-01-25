<?php $contato = get_page_by_title('contato')->ID; ?>

<ul class="dados">
  <?php
	$contato_info = get_field('contato_info', $contato);
	if(isset($contato_info)) { foreach($contato_info as $contact) { ?>
  <li class="dados-list">
    <a class="dados-link" href="<?php echo $contact['contato_link'] ?>" target="_blank">
      <div class=" dados-list__icon">
        <img class="contato-icon" src="<?php echo $contact['contato_icon'] ?>" alt="<?php the_title(); echo $rede['contato_titulo'] ?>">
      </div>
      <div>
        <h4 class="dados-list__title"><?php echo $contact['contato_titulo'] ?></h4>
        <p class="dados-list__content"><?php echo $contact['contato_info'] ?></p>
      </div>
    </a>
  </li>
  <?php } } ?>
</ul>