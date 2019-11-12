<?php
require_once('php/Curso.DAO.php');    
$id = $_GET['id'];
$c = new CursoDAO();

if($id!==null){
    $c->excluir($id);
}
header("Location: index.php"); 
?>