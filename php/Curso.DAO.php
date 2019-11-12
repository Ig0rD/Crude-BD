<?php 
    class CursoDAO {
        private function getConexao() {
            $con = new PDO("pgsql:host=localhost;dbname=academico;port=5432","postgres","postgres");
            return $con;
        }
        public function inserir($curso) {
            $con = $this->getConexao();
            $sql = 'INSERT INTO "Curso" ("nome", "area", "cargaHoraria", "dataFundacao") VALUES (?, ?, ?, ?)';
            $stmt = $con->prepare($sql);
            $stmt->bindValue(1, $curso->getNome());
            $stmt->bindValue(2, $curso->getArea());
            $stmt->bindValue(3, $curso->getCargaHoraria());
            $stmt->bindValue(4, $curso->getDataFundacao());

            $exec = $stmt->execute();

            if($exec) {
                $linha = $exec;
                $curso->setId(intval($linha['id']));
                $stmt->closeCursor();
                $con = null;
                return true;
            } else {
                return false;
            }
        }

        public function excluir($id) {
            $con = $this->getConexao();
            $sql = 'DELETE FROM "Curso" WHERE id = ?';
            $stmt = $con->prepare($sql);
            $stmt->bindValue(1, $id);
            $exec = $stmt->execute();
            $stmt->closeCursor();
            $con = null;
            return $exec;
        }

        public function busca($id) {
            $con = $this->getConexao();
            $sql = 'SELECT * FROM "Curso" WHERE id=?';

            $stmt = $con->prepare($sql);
            $stmt->bindValue(1, $id);

            if($stmt->execute()) {
                $select = $stmt->fetch(PDO::FETCH_ASSOC);
                $curso = new Curso($select['nome'],
                                   $select['area'],
                                   $select['cargaHoraria'],
                                   $select['dataFundacao']);
                $curso->setId(intval($select['id']));
                $stmt->closeCursor();
                $con = null;
                return $curso;
            }
            $stmt->closeCursor();
            $con = null;
            return false;
        }

        public function lista($limit, $offset) {
            $con = $this->getConexao();
            $sql = 'SELECT * FROM "Curso" LIMIT ? OFFSET ?';

            $stmt = $con->prepare($sql);
            $stmt->bindValue(1, $limit);
            $stmt->bindValue(2, $offset);

            $exec = $stmt->execute();
            $listC = array();

            if($exec) {
                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $curso = new Curso($linha['nome'], 
                    $linha['area'], 
                    $linha['cargaHoraria'], 
                    $linha['dataFundacao']);
                    $curso->setId(intval($linha['id']));
                    array_push($listC, $curso);
                } 
            }
            $stmt->closeCursor();
            $stmt = null;
            $con = null;
            return $listC;
        }  
        
        public function altera($curso) {
            $conect = $this->getConexao();
            $sql = 'UPDATE "Curso" SET "nome"=?, "area"=?, "cargaHoraria"=?, "dataFundacao"=? WHERE "id"=?';

            $stmt = $conect->prepare($sql);

            $stmt->bindValue(1, $curso->getNome());
            $stmt->bindValue(2, $curso->getArea());
            $stmt->bindValue(3, $curso->getCargaHoraria());
            $stmt->bindValue(4, $curso->getDataFundacao());
            $stmt->bindValue(5, $curso->getId());

            $exec = $stmt->execute();
            $stmt->closeCursor();
            $conect = null;
            return $exec;
        }

        public function salva($curso) {
            if($curso->getId() === null) {
                if($this->inserir($curso)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                if($this->altera($curso)) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
?>