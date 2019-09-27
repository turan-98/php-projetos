<?php 

    require_once 'init.php';
    require_once  'functions.php';

    //pega o id da url 
    $id = isset($_GET['id']) ? $_GET['id']: null;

    //valida o id 
    if(empty($id)){
        echo "Id não informado";
        exit;
    }
    // remove do bd
    $PDO = db_connect();
    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $PDO->prepare($sql);
    //bindParam passa argumentos para o bd
    $stmt->bindParam(':id',$id,PDO::PARAM_INT);

    if($stmt->execute()){
        header('Location: ../index.php');
    }
    else{
        echo " Erro ao remover ";
        print_r($stmt->errorInfo());
    }

?>
