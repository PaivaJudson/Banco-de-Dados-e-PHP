<?php 

require_once 'Usuario.php';
class UsuarioDAO{

    private $conn;

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    public inserirUsuario(Usuario $usuario){
        $sql = "INSERT INTO usuarios(nome, email, senha) VALUES ( ? , ? , ? )";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$usuario->nome, $usuario->email, $usuario->senha]);
    }


}