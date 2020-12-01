<?php
   use application\config\config;
?>
<body>
    <div class="wrapper">
      <div class="half-one">
          <img src="/Helpp/system/img/helpp.png" class="logo"></img>
      </div>
      <div class="half-two">
        <form class="frmLogin" method="POST" action="login/check">
          <div class="form">
            <h1 class="tituloForm">LOGIN</h1><br/>
            <label for="txtRM" id="lblRM" class="lblRM"></label>
            <input type="text" class="txtrm" placeholder="RM" name="txtRM" id="txtRM" autofocus autocomplete="off" required>
            <select name="cargo" id="cmbCargo" required>
              <option value="aluno">Aluno</option>
              <option value="professor">Professor</option>
              <option value="gestor">Gestor</option>
            </select><br/>
            <label for="txtSenha" id="lblSenha" class="lblSenha"></label>
            <input type="password" class="txtSenha" placeholder="Senha" name="txtSenha" id="txtSenha" required>  
            <input type="submit" class="btnEntrar" value="Entrar"><br/><br/>
            <a href="#" class="esqueceu-senha">Esqueceu a senha?</a>
          </div>
        </form>
      </div>
      <p class="divisoria"></p>
    </div>
      <footer>
          <img src="/Helpp/system/img/rodape.png" class="rodape"></img>
        <p class="copy">Copyright © 2020 CrownTech. Todos os direitos reservados.</p>
      </footer>
      
      <script src="../system/js/app.js"></script>
  </body>
</html>