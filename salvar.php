<?php
    require_once('php/Curso.DAO.php');    
    require_once('php/Curso.class.php');

    $id = isset($_POST['id']);
    $curso = new Curso($_POST['nome'], $_POST['area'], $_POST['cargaHoraria'], $_POST['dataFundacao']);
    $c = new CursoDAO();
    
    if($id){
        $curso->setId(intval($_POST['id']));
        $c->altera($curso);
    }
    else{
        $c->inserir($curso);
    }
    
    header("Location: index.php");
?>