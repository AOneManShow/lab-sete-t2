<?php
//include_once './session/session.php';
include_once('./models/Utilizador.php');
include_once('./dbconfig/DbConnection.php');

class UtilizadoresRepository
{

    private $db;

    function __construct()
    {
        $this->db = DbConnection::getInstance();
    }
    /*
        public function selectAll() {
            $utilizadores = Array();
            $stmt = $this->db->prepare("SELECT * FROM utilizador");
            $stmt->execute();
            $result = $stmt->fetchAll();

            //aqui as strings têm de ter o mesmo nome que na base de dados
            foreach ($result as $utilizador) {
                $utilizadores[] = new Utilizador($cliente['id'], $cliente['nome'], $cliente['tipo'], $cliente['actividade_empresa'], $cliente['email'],
                    $cliente['contact_no'], $cliente['provincia'], $cliente['municipio'], $cliente['comuna'], $cliente['morada'], $cliente['nacionalidade'],
                    $cliente['username'], $cliente['password'], $cliente['perfil']);
            }
            return $clientes;
        }
        */
    public function selectById($id)
    {

        $stmt = $this->db->prepare("SELECT * FROM utilizador WHERE idUtilizador=:id");
        $stmt->execute(['id' => $id]);
        $utilizador = $stmt->fetch();

        return new Utilizador($utilizador['idUtilizador'], $utilizador['nomeCompleto'], $utilizador['email'], $utilizador['username'], $utilizador['senha']);
    }
    /*
            public function getClientesByID($id) {
                $stmt = $this->db->prepare("SELECT * FROM clients WHERE id=:id");
                $stmt->execute(array(":id" => $id));
                $editRow = $stmt->fetch(PDO::FETCH_ASSOC);
                return $editRow;
            }
    */
    public function actualizarSenha($id, $passwd)
    {
        try {
            $stmt = $this->db->prepare("UPDATE clients SET senha=:passwd
                                                         WHERE idUtilizador=:id ");
            $stmt->bindparam(":passwd", $passwd);
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function actualizar($id, $nome, $email, $username)
    {
        try {
            $stmt = $this->db->prepare("UPDATE utilizador SET nomeCompleto=:nome, 
							                             email=:email, 
                                                         username=:username
							                             WHERE idUtilizador=:id ");
            $stmt->bindparam(":nome", $nome);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":username", $username);
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function inserir($nome, $email, $username, $passwd)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO utilizador(nomeCompleto, email, username, senha)"
                . " VALUES(:nome, :email, :username, :passwd)");
            $stmt->bindparam(":nome", $nome);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":username", $username);
            $stmt->bindparam(":passwd", $passwd);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM utilizador WHERE idUtilizador=:id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function login($email, $userN, $passwd)
    {
        try {
            $stmt = $this->db->prepare("SELECT email,username,senha FROM utilizador WHERE (email=:email OR username=:userN) AND senha=:passwd");
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":userN", $userN);
            $stmt->bindParam(":passwd", $passwd);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}