<?php
    require_once('header.php');
    require_once('php/Curso.DAO.php');
    require_once('php/Curso.class.php');

    $id = isset($_GET['id']);

    if($id) {
        $id = $_GET['id'];
        $c = new CursoDAO();
        $curso = $c->busca(intval($id));
    }
?>

<main>
    <div class="container">
        <div class="card grey lighten-1 z-depth-1">
            <div class="row">
            <h2 class="indigo-text text-lighten-1">Detalhes:</h2>
                <div class="card-action">
                    <ul>
                        <li class="indigo-text text-darken4"><?php echo "Nome: ".$curso->getNome();?></li>                   
                        <li class="indigo-text text-darken4"><?php echo "Id: ".$curso->getId();?></li>
                        <li class="indigo-text text-darken4"><?php echo "Area: ".$curso->getArea();?></li>
                        <li class="indigo-text text-darken4"><?php echo "Carga Horária: ".$curso->getCargaHoraria();?></li>
                        <li class="indigo-text text-darken4"><?php echo "Data Fundação: ".$curso->getDataFundacao();?></li>
                    </ul>
                    <a href="index.php" class="back btn" role="button" aria-pressed="true"><i class="material-icons">arrow_back</i></a> 
                </div>
            </div>
        </div>
    </div>
</main>
<?php include_once("footer.php");?>