<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../../system/css/login.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <title>Alterar senha</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="half-one">
      <img src="../../system/img/helpp.png" class="logo"></img>
      </div>
      <div class="half-two">
        <form class="frmLogin" method="POST" action="../controllers/editSenhaUsuario.php">
          <div class="form">
            <h1 class="tituloForm">ALTERAR SENHA</h1><br/>
            <input type="password" class="txtSenha2" placeholder="Senha atual" name="senhaAtual" id="txtSenha" required>
            <input type="password" class="txtSenha2" placeholder="Senha nova" name="senha1" id="txtSenha" required>
            <input type="password" class="txtSenha2" placeholder="Confirme a Senha" name="senha2" id="txtSenha2" required><br/>  
            <input type="submit" class="btnEntrar2" value="Alterar"><br/><br/>
            <?php 
            session_start();
            if(isset($_SESSION['erro'])){
              if($_SESSION['erro'] == 1){
              ?>
              <div>
                <P>Senha atual incorreta!</P>
              </div>
              <?php
              }
              if($_SESSION['erro'] == 2){
              ?>
                <div>
                  <P>Senhas não coincidem!</P>
                </div>
              <?php
              }
              unset($_SESSION['erro']);
            }
            ?>
          </div>
        </form>
      </div>
      <p class="divisoria"></p>
    </div>
      <footer>
        <p class="copy">Copyright © 2020 CrownTech. Todos os direitos reservados.</p>
      </footer>
      <script src="../../../system/js/app.js"></script>
  </body>
</html>
