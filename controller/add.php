<?php 
    require_once 'init.php';

    //pega os dados do formulário
    // isset verifica se o valor da variável e diferente de null
    $name = isset($_POST['name']) ? $_POST['name']:null;
    $email = isset($_POST['email']) ? $_POST['email']:null;
    $gender = isset($_POST['gender']) ? $_POST['gender']:null;
    $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate']:null;

    //se algum campo estiver vazio retorna para a tela inicial
    if(empty($name)||empty($email)||empty($gender)||empty($birthdate)){
        echo "Preencha todos os campos";
        exit;
    }

    // formato da data dd/mm/yyyy
    // então precisamo conveter para yyyy-mm-dd para não dar conflito com 
    // o db
    $isoDate = dateConvert($birthdate);

    //inserindo valores
    $PDO = db_connect();
    $sql = "INSERT INTO users(name, email, gender, birthdate) VALUES(:name, :email, :gender, :birthdate)";
    $stmt = $PDO->prepare($sql);
    //bindParam especifica nome de uma variável
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':gender',$gender);
    $stmt->bindParam(':birthdate',$birthdate);

    if($stmt->execute())
    {
        // se conectou e cadastrou os valores vá para o index
        header('Location:../index.php');
    }else{
        echo "Erro ao cadastrar";
        // caso contrário
        print_r($stmt->errorInfo());
    }

?>