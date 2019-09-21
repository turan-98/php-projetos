<?php
require 'controller/init.php';
require_once  'controller/functions.php';


//pega o ID por url
$id = isset($_GET['id']) ? (int) $_GET['id']: null;

//valida o id 
if(empty($id)){
    echo "Id para alteração não foi definido";
    exit;
}
// busca os dados do usuário 
$PDO = db_connect();
$sql = "SELECT name, email, gender, birthdate FROM users WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

$stmt->execute();
// passando para o $user o array retornado pelo FETCH
$user = $stmt->fetch(PDO::FETCH_ASSOC);
// se o método fetch não retornar um array significa que o id 
// não pertence ao usuario 
if(!is_array($user)){
    echo "nenhum usuário encontrado";
    exit;
}

?>
<!doctype html>
<html>
<?php 
  require_once('head.php');
?>
<head>
    <meta charset="utf-8">
    <title>Bank</title>
</head>
<body>
    <header class="p-2 bg-primary text-white">
        <h1 class="m-2">Blue Bank</h1>
    </header>
    <main class="o-main">
        <div class="wrapper-form m-3 d-flex justify-content-center">
        <form action="controller/edit.php"  class="card p-3 col-md-6" method="post">
                <div class="col">
                    <h4>Editar</h4>
                    <p class="text-muted">Alterar suas informações</p>
                </div>
                <div class="form-group p-2 m-2">
                    <label for="name">Nome: </label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $user['name'] ?>">
                </div>
                <div class="form-group p-2 m-2">
                    <label for="email">Email: </label>
                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $user['email'] ?>">
                </div>
                <label for="Qual o seu sexo ?" class="m-2 text-muted"> Gênero:</label>
                <div class="form-inline">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="radio" name="gender" id="gener_m" value="m" <?php if ($user['gender'] == 'm'): ?> checked="checked" <?php endif; ?>>
                            </div>
                        </div>
                        <label for="gener_m p-2 m-2">Masculino </label>
                    </div>
                    <div class="input-group p-2 m-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="radio" name="gender" id="gener_f" value="f" <?php if ($user['gender'] == 'f'): ?> checked="checked" <?php endif; ?>>
                            </div>
                        </div>
                        <label for="gener_f p-2 m-2">Feminino </label>
                    </div>
                </div>
                <div class="form-group p-2 m-2">
                    <label for="birthdate">Data de Nascimento: </label>
                    <input class="form-control" type="text" name="birthdate" id="birthdate" placeholder="dd/mm/YYYY" value="<?php echo dateConvert($user['birthdate']) ?>">
                </div>
                <div class="form-inline p-2 m-2">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <button type="submit" class="btn btn-primary">Alterar</button>
                </div>
            </form>
        </div>
        </main>
    </body>
</html>