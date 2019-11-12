<?php
    require_once('header.php');
    require_once('php/Curso.DAO.php');
    require_once('php/Curso.class.php');

    $c = new CursoDAO();
    $listC = $c->lista(10, 0);
?>

<main>
    <div class="container">
        <div class="card grey lighten-1">
            <div class="row">
                <div class="card-action">
                    <div class="list col s12">
                        <table class="tabela striped highlight centered">
                        <h2 class="indigo-text text-lighten-1 center">Cursos</h2>
                        <thead>
                            <th class="indigo-text text-lighten-1">Id</th>
                            <th class="indigo-text text-lighten-1">Nome</th>
                        </thead>
                        <tbody>
                            <?php foreach($listC as $curso) { ?>
                            <tr>
                                <td> 
                                    <?php echo $curso->getId(); ?> 
                                </td>
                                <td> 
                                    <?php echo $curso->getNome(); ?>
                                </td>
                                <td>

                                    <a href="cadastro.php?id=<?php echo $curso->getId(); ?>" class="btn green"><i class="large material-icons">edit</i></a>
                                    <a href="deletar.php?id=<?php echo $curso->getId(); ?>" class="btn red"><i class="material-icons">delete</i></a>                                    
                                    <a href="detalhes.php?id=<?php echo $curso->getId(); ?>" class="btn"><i class="material-icons">more</i></a>                                   

                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        </table>
                        <div class="row">
                                <div class="col s12 center">
                                    <a href="cadastro.php" class="btn reg center" role="button" aria-pressed="true">Novo Curso</a>                                   
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include_once("footer.php");?>