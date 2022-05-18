<h1>Adicionar</h1>
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
   <input type="submit" value="Adicionar">
</form>

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