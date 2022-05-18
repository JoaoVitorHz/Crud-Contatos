<?php 
class banco {
    
    private $pdo;

    public function __construct(){
        $this->pdo = new PDO("mysql:dbname=contatos;host=localhost", "root", "");
    }

    public function cadastro($nome, $sobrenome, $telefone1, $telefone2, $email1, $email2='', $cpf){
        if($this->existeItem($telefone1) == false) {

            if($this->validateEmail($email1, $email2)) {

                if($this->validateCpf($cpf)) {
                    if($this->validarNome($nome, $sobrenome)){
                        $sql = "INSERT INTO pessoa (nome, sobrenome, telefone1, telefone2, email1, email2, cpf) VALUE (:nome, :sobrenome, :telefone1, :telefone2, :email1, :email2, :cpf)";
                        $sql = $this->pdo->prepare($sql);
                        $sql->bindValue(':nome', $nome);
                        $sql->bindValue(':sobrenome', $sobrenome);
                        $sql->bindValue(':telefone1', $telefone1);
                        $sql->bindValue(':telefone2', $telefone2);
                        $sql->bindValue(':email1', $email1);
                        $sql->bindValue(':email2', $email2);
                        $sql->bindValue(':cpf', $cpf);
                        $sql->execute();
                        echo "usuario inserido ";
                        
                    return true;
                    }else {
                        "Nome invalido";
                    }
                }

            } else {
                echo "Email invalido, tente novamente!";
            }
		} else {
			echo "Contato já existente!";
		}
    }

    public function getInfo($id){
        $sql= "SELECT * FROM pessoa WHERE id = :id";
        $sql= $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetch();
        }else{
            return array();
        }
    }

    public function getNome($nome){
		$sql = "SELECT * FROM contatos WHERE nome = :nome";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':nome', $nome);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$info = $sql->fetch();

			return $info['nome'];
		} else {
			return '';
		}
	}

    public function getAll(){
        $sql = "SELECT * FROM pessoa";

        $sql = $this->pdo->query($sql);

		if($sql->rowCount() > 0) {
			return $sql->fetchAll();
		} else {
			return array();
		}
    }

    private function existeItem($telefone1){
        if(strlen($telefone1 ) >= 9 && strlen($telefone1 )<= 11 ) {

            $sql = "SELECT * FROM pessoa WHERE telefone1 = :telefone1";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':telefone1', $telefone1);
            $sql->execute();

            if($sql->rowCount() > 0) {
                echo "Telefone já cadastrado";
            } else {
                return false;
            }

        } else {
            echo "Telefone invalido  ";
        }   
    }

    public function validateEmail($email1, $email2 = ''){
        if(filter_var($email1, FILTER_VALIDATE_EMAIL) && filter_var($email2, FILTER_VALIDATE_EMAIL)){
        return true;
        } else {
        return false;
        }

    }
    private function validateCpf($cpf){
        if(strlen($cpf) == 11 && is_numeric($cpf) == 1) {
            $sql = "SELECT * FROM pessoa WHERE cpf = :cpf";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':cpf', $cpf);
            $sql->execute();

            if($sql->rowCount() > 0) {
                echo "Essa CPF já esta cadastrado";
            } else {
                return true;
            }
        } else {
            echo "CPF invalido";
        }
    }

    private function validarNome($nome, $sobrenome) {
        if(is_numeric($nome) || is_numeric($sobrenome) || $this->temNumero($nome, $sobrenome)){
            echo "Nome e sobrenome podem ser apenas textos!";
        }else {
            return true;
        }

    }
    private function temNumero($nome, $sobrenome){
        if( str_contains($nome, '1') ||
        str_contains($nome, '2') ||
        str_contains($nome, '3') ||
        str_contains($nome, '4') ||
        str_contains($nome, '5') ||
        str_contains($nome, '6') || 
        str_contains($nome, '7') ||
        str_contains($nome, '8') || 
        str_contains($nome, '9') ||
        str_contains($nome, '0') ||

        str_contains($sobrenome, '1') ||
        str_contains($sobrenome, '2') || 
        str_contains($sobrenome, '3') ||
        str_contains($sobrenome, '4') ||
        str_contains($sobrenome, '5') ||
        str_contains($sobrenome, '6') ||
        str_contains($sobrenome, '7') ||
        str_contains($sobrenome, '8') ||
        str_contains($sobrenome, '9') ||
        str_contains($sobrenome, '0'))
        {
            return true;
        } else {
            return false;
        }
    }
    public function editar($id, $nome, $sobrenome, $telefone1, $telefone2, $email1, $email2, $cpf) {
        if($this->validateEmail($email1, $email2)) {

            if(strlen($cpf) == 11 && is_numeric($cpf) == 1){
                if($this->validarNome($nome, $sobrenome)){

                    $sql = "UPDATE pessoa SET nome = :nome, sobrenome = :sobrenome, telefone1 = :telefone1, telefone2 = :telefone2, email1 = :email1, email2 = :email2, cpf = :cpf WHERE id = :id";

                    $sql = $this->pdo->prepare($sql);
                    $sql->bindValue(':id', $id);
                    $sql->bindValue(':nome', $nome);
                    $sql->bindValue(':sobrenome', $sobrenome);
                    $sql->bindValue(':telefone1', $telefone1);
                    $sql->bindValue(':telefone2', $telefone2);
                    $sql->bindValue(':email1', $email1);
                    $sql->bindValue(':email2', $email2);
                    $sql->bindValue(':cpf', $cpf);
                    $sql->execute();
                    return true;
                } else {
                    "Nome invalido";
                }
            } else {
                echo "CPF invalido!";
            }
        } else {
            echo "Contato já existente!";
        }
	} 
    public function excluir($id){
        $sql = "DELETE FROM pessoa WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

}