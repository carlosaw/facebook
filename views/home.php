<div class="row">
  <div class="col-sm-8">

    <div class="post_area">
      <form method="POST" enctype="multipart/form-data">
        <textarea name="post" class="form-control" placeholder="O que você está pensando?"></textarea><br/>      
        <input type="file" name="foto" /><br/>
        <input type="submit" value="Enviar" class="btn btn-default" />
      </form>
    </div>

  </div>

  <div class="col-sm-4">
    <?php if(count($requisicoes) > 0): ?>
      <div class="widget">
        <h4>Requisições de amizade</h4>
        <?php foreach($requisicoes as $pessoa): ?>
          <div class="requisicaoitem">
            <strong><?php echo $pessoa['nome']; ?></strong>
            <button class="btn btn-default pull-right" onclick="aceitarFriend('<?php echo $pessoa['id']; ?>', this)">+</button>
          </div>   
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <div class="widget">
        <h4>Total de Amigos</h4>
        <?php echo $totalamigos; ?> amigo<?php echo ($totalamigos == '1')?'' : 's'; ?>          
      </div>

    <?php if(count($sugestoes) > 0): ?>
      <div class="widget">
        <h4>Sugestões de amigos</h4>
        <?php foreach($sugestoes as $pessoa): ?>
          <div class="sugestaoitem">
            <strong><?php echo $pessoa['nome']; ?></strong>
            <button class="btn btn-default pull-right" onclick="addFriend('<?php echo $pessoa['id']; ?>', this)">+</button>
          </div>   
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</div>