<div class="postitem">
  <div class="postitem_info">
    <strong>Post de:</strong> <?php echo $nome; ?>
  </div>
  <?php if($tipo == 'foto'): ?>
  <img src="<?php echo BASE; ?>assets/images/posts/<?php echo $url; ?>" border="0" width="100%" />
  <?php endif; ?>

  <div class="postitem_texto">
    <?php echo $texto; ?>
  </div>
  
  <div class="postitem_botoes">
    <button class="btn btn-default" onclick="curtir(this)" data-id="<?php echo $id; ?>" data-likes="<?php echo $likes; ?>" data-liked="<?php echo $liked; ?>">(<?php echo $likes; ?>) <?php echo ($liked=='0')?'Curtir':'Descurtir'; ?></button>

    <button class="btn btn-default" onclick="displayComentario(this)">Comentar</button>
    
    <div class="postitem_comentario"><br/>
      <input type="text" class="postitem_txt form-control" />
      <button class="btn btn-default" data-id="<?php echo $id; ?>" onclick="comentar(this), location.reload()">Enviar</button>
    </div>

    <?php if($comentarios != null):?>
      <div class="postitem_comentarios">
        <ul>
        <?php foreach ($comentarios as $comentario):?>
        <li>
          <?php echo $comentario['nome'].": ".$comentario['texto'];?>
        </li>
        <div class="line"></div>
        <?php endforeach;?>
        </ul>
      </div>
    <?php endif;?>

  </div>
</div>