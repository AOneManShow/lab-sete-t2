<?php
//include_once './session/session.php';
include_once('./models/Tarefa.php');
include_once('./dbconfig/DbConnection.php');

class TarefasRepository
{

    private $db;

    function __construct()
    {
        $this->db = DbConnection::getInstance();
    }
    public function selectAll()
    {
        $tarefas = array();
        $stmt = $this->db->prepare("SELECT * FROM tarefa");
        $stmt->execute();
        $result = $stmt->fetchAll();

        //aqui as strings têm de ter o mesmo nome que na base de dados
        foreach ($result as $tarefa) {
            $tarefas[] = new Tarefa(
                $tarefa['idTarefa'], $tarefa['nome'], $tarefa['descricao'], $tarefa['fkUtilizador'],
                $tarefa['fkCategoria'], $tarefa['dataInicio'], $tarefa['dataTermino'], $tarefa['concluida']
            );
        }
        return $tarefas;
    }

    public function selectByCategoria($idCategoria)
    {
        /*
        $tarefas = array();
        $stmt = $this->db->prepare("SELECT t.nome, t.descricao, t.dataInicio, t.dataConclusao, t.concluida,
                                    c.nome AS nome_categoria,
                                    u.nomeCompleto AS nome_utilizador
                                    FROM tarefa AS t
                                    JOIN categoria AS c ON t.fkCategoria = :idCategoria
                                    JOIN utilizador AS u ON t.fkUtilizador = u.idUtilizador
                                    WHERE c.nome = 'nome_da_categoria'");
        $stmt->execute(['idCategoria' => $idCategoria]);
        //$stmt->execute();
        $result = $stmt->fetchAll();

        //aqui as strings têm de ter o mesmo nome que na base de dados
        foreach ($result as $tarefa) {
            $tarefas[] = new Tarefa(
                $tarefa['idTarefa'], $tarefa['nome'], $tarefa['descricao'], $tarefa['fkUtilizador'],
                $tarefa['fkCategoria'], $tarefa['dataInicio'], $tarefa['dataTermino'], $tarefa['concluida']
            );
        }
        return $tarefas;
        */
    }

    public function selectById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM tarefa WHERE idTarefa=:id");
        $stmt->execute(['id' => $id]);
        $tarefa = $stmt->fetch();

        return new Tarefa(
            $tarefa['idTarefa'], $tarefa['nome'], $tarefa['descricao'], $tarefa['fkUtilizador'],
            $tarefa['fkCategoria'], $tarefa['dataInicio'], $tarefa['dataTermino'], $tarefa['concluida']
        );
    }
    /*
            public function getClientesByID($id) {
                $stmt = $this->db->prepare("SELECT * FROM clients WHERE id=:id");
                $stmt->execute(array(":id" => $id));
                $editRow = $stmt->fetch(PDO::FETCH_ASSOC);
                return $editRow;
            }
    */

    public function actualizar($id, $nome, $descricao, $fkCategoria, $dataInicio, $dataTermino, $concluida)
    {
        try {
            $stmt = $this->db->prepare("UPDATE tarefa SET nome=:nome, 
							                             descricao=:descricao, 
                                                         fkCategoria=:fkCategoria,
                                                         dataInicio=:dataInicio,
                                                         dataTermino=:dataTermino,
                                                         concluida=:concluida
                                                         WHERE idTarefa=:id ");
            $stmt->bindparam(":nome", $nome);
            $stmt->bindparam(":descricao", $descricao);
            $stmt->bindparam(":fkCategoria", $fkCategoria);
            $stmt->bindparam(":dataInicio", $dataInicio);
            $stmt->bindparam(":dataTermino", $dataTermino);
            $stmt->bindparam(":concluida", $concluida);
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            //echo $e->getMessage();
            return false;
        }
    }

    public function inserir($nome, $descricao, $fkCategoria, $fkUtilizador, $dataInicio, $dataTermino)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO tarefa(nome, descricao, fkCategoria, fkUtilizador, dataInicio, dataTermino)"
                . " VALUES(:nome, :descricao, :fkCategoria, :fkUtilizador, :dataInicio, :dataTermino)");
            $stmt->bindparam(":nome", $nome);
            $stmt->bindparam(":descricao", $descricao);
            $stmt->bindparam(":fkCategoria", $fkCategoria);
            $stmt->bindparam(":fkUtilizador", $fkUtilizador);
            $stmt->bindparam(":dataInicio", $dataInicio);
            $stmt->bindparam(":dataTermino", $dataTermino);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            //echo $e->getMessage();
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM tarefa WHERE idTarefa=:id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            //echo $e->getMessage();
            return false;
        }
    }
}