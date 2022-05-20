<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de contato</title>

    <link rel="stylesheet" href="css/cadastro.css">
</head>
<body>
    <section>
        <div class="header">
            <h1>formulario<h1>
            <a href="index.php">Listagem</a>
        </div>
        <form method="POST" action="">
            Nome:<br/>
            <input type="text" name="nome" /><br><br>

            Sobrenome:<br/>
            <input type="text" name="sobrenome"><br/><br/>

            Telefone Principal:<br/>
            <input type="tel" name="telefone1"><br/><br/>

                Segundo Telefone:<br/>
            <input type="tel" name="telefone2"><br/><br/>

            E-mail Principal:<br/>
            <input type="email" name="email1"><br/><br/>

            Segundo E-mail:<br/>
            <input type="email" name="email2"><br/><br/>

            CPF:<br/>
            <input type="text" name="cpf"><br/><br/>
            <button type="submit">Adiconar</button>
        </form>
       
    </section>
        
<?php
    include 'banco.php';
    $contato = new banco();

    if (!empty($_POST['nome'])){
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $telefone1 = $_POST['telefone1'];
        $telefone2 = $_POST['telefone2'];
        $email1 = $_POST['email1'];
        $email2 = $_POST['email2'];
        $cpf = $_POST['cpf'];

        if($contato->cadastro($nome, $sobrenome, $telefone1, $telefone2, $email1, $email2, $cpf)){
            header("Location: index.php");
        }
    }
    echo"Não pode enviar um usuario vazio";

    function voltar() {
        header("Location: index.php");

    }
    ?>
</body>
</html>
