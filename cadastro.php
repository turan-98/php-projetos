<?php
require 'controller/init.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <?php 
    require_once ('head.php');
  ?>
  <title>Cadastro</title>
</head>
<body class="bg-light">
  <header class="p-2 bg-primary text-white">
      <h2 class="brand m-2">Blue Bank</h2>
  </header>
 <main class="o-main container">
  <div class="wrapper-form m-3 d-flex justify-content-center">
    <form action="controller/add.php" method="post" class="card p-3 col-md-6">
    <h4>Cadastro</h4>
      <div class="form-group p-2 m-2 ">
        <label for="name">Nome: </label>
        <input type="text" name="name" id="name" class="form-control" placeh>
      </div>
      <div class="form-group p-2 m-2">
        <label for="email">Email: </label>
        <input type="text" name="email" id="email" class="form-control">
      </div>
      <label for="Qual o seu sexo ?" class="m-2 text-muted"> Gênero:</label>
      <div class="form-inline">
        <div class="input-group p-2 m-2">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <input type="radio" name="gender" id="gener_m" value="m" arial-label="check para Masculino">
            </div>
          </div>
          <input type="text"  class="form-control-sm border-0 " placeholder="Masculino" readonly>
        </div>
        <div class="input-group p-2 m-2">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <input type="radio" name="gender" id="gener_f" value="f" arial-label="check para feminino">
            </div>
          </div>
          <input type="text" class="form-control-sm border-0" placeholder="Feminino">
        </div>
      </div>
      <div class="form-group p-2 m-2">
        <label for="birthdate">Data de Nascimento: </label>
        <input type="text" name="birthdate" id="birthdate" placeholder="dd/mm/YYYY" class="form-control">
      </div>
      <div class="form-inline p-2 m-2 d-flex justify-content-around">
        <button class="btn btn-danger">Cancelar</button>
        <button type="submit" class="btn btn-outline-primary">Cadastrar</button>
      </div>
    </form>
  </div>
 </main>
</body>
</html>