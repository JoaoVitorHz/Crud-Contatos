<?php
include 'banco.php';
$contato = new banco();

$id = $_GET['id'];
$info = $contato->getInfo($id);

if(empty($_GET['id'])){
 

   

    if(empty($info['email'])){
       //header("Location:index.php");
    }
}else{
   //header("Location:index.php");
}
?>

<h1>Editar</h1>

<form method="POST" action="">
   <input type="hidden" name="id" value="<?php echo $info['id']; ?>" />

   Nome:<br/>
   <input type="text"name="nome" value="<?php echo $info['nome']; ?>" /><br/><br/>
   
   Sobrenome:<br/>
   <input type="text"name="sobrenome" value="<?php echo $info['sobrenome']; ?>" /><br/><br/>

   Telefone principal:<br/> 
   <input type="tell" name="telefone1" value="<?php echo $info['telefone1']; ?>" /><br/><br/>
   
   Segundo telefone:<br/>
   <input type="tell" name="telefone2" value="<?php echo $info['telefone2']; ?>" /><br/><br/>
   
   E-mail Principal:<br/>
   <input type="email" name="email1" value="<?php echo $info['email1']; ?>" /><br/><br/>
   Segundo E-mail:<br/>
   <input type="text" name="email2" value="<?php echo $info['email2']; ?>" ><br/><br/>
   
   CPF:<br/>
   <input type="text" name="cpf" value="<?php echo $info['CPF']; ?>" /><br/><br/>

   <input type="submit"value="Salvar"/>
</form>

<?php
$contato = new banco();
if(!empty($_POST['id'])){
    
    $id = $_POST["id"];
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $telefone1 = $_POST['telefone1'];
    $telefone2 = $_POST['telefone2'];
    $email1 = $_POST['email1'];
    $email2 = $_POST['email2'];
    $cpf = $_POST['cpf'];
   

   $contato->editar($id, $nome, $sobrenome, $telefone1, $telefone2, $email1, $email2, $cpf);

    header("Location:index.php");
}
   ?>