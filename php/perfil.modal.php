
<!-- Modal -->
<div class="modal fade" id="mPerfil" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->     
  <?php 
    $count= fetch('SELECT COUNT(post) from posts where users_id=?',[$get[$i]['id']]);

    ?> 
    <div class="modal-content modal-body cont postagens">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="profile" style="background-image: url(<?=$get[$i]['imagem']?>)"></div>

      <div class="info">
        <h2><?= $get[$i]['username']?></h2>
        <p>Sexo: <?=$get[$i]['genero']?></p>
        <p>Data de Nascimento: <?=$get[$i]['ddn']?></p>
        <p><?=$get[$i]['bairro'].' - '.$get[$i]['cidade']?></p>
      <footer >Usuario com <?= $count[0] ?> postagens</footer>
      </div>
    </div>
  </div>


</div>
