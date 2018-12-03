  <!-- Modal -->
  <div class="modal fade" id="mLogin" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
          <div class="login">
            <form method="post" action="/php/login2.php">
            <label>Username</label>
                <input type="text" name="user" placeholder="Username" required="required" />
                <label>Password</label>
                <input type="password" name="pass" placeholder="Password" required="required" id="senha"/>
                <label style="display: flex;justify-content: space-between;">
                    <span>Mostrar Senha</span>
                    <input style="width: 16px; height: 16px;" type="checkbox" id="vers" onclick="ver()" >
                </label>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary " >Entrar</button>
                    <button type="button" data-toggle="modal" data-target="#mCadastrar" class="btn btn-primary" data-dismiss="modal">Cadastre-se</button></a>
                    
                </div>
            </form>
        </div>
    </div>
</div>

</div>
</div>
