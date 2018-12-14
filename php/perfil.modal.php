
<!-- Modal -->
<div class="modal fade" id="mPerfil" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->

        
          
        <div class="modal-content modal-body cont postagens">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="profile"></div>
  
          <div class="info">
          <h2><?= $fetch['username']?></h2>
              <p>Sexo: <?=$fetch['genero']?></p>
              <p>Data de Nascimento: <?=$fetch['ddn']?></p>
              <p><?=$fetch['bairro'].' - '.$fetch['cidade']?></p>
            </div>
            <div class="footer"></div>
          </div>
        </div>
      
   
  </div>

</div>
</div>
