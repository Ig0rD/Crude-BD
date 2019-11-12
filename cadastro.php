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
    <div class="row">
        <div class="col s8 l6 offset-l3 offset-s2 grey lighten-1">
            <div class="card grey lighten-1">
                <div class="card-action center row valign-wrapper lighten-1">
                    <div class="col s2">
                        <a href="index.php" class="back btn" role="button" aria-pressed="true"><i class="material-icons">arrow_back</i></a> 
                    </div>
                   <div class="col s10">
                        <h2 class="indigo-text text-darken4">Cadastro de Cursos</h2>
                    </div>

                </div>

                <div class="card-content">
                    <form action="salvar.php" method="POST">
                        <div class="input-field">
                            <input type="text" id="nome" name="nome" required="required" value="<?php if($id) echo $curso->getNome();?>">
                            <label for="nome">Nome</label>
                        </div>
                        <div class="input-field">
                            <input type="text" id="area" name="area" required="required" value="<?php if($id) echo $curso->getArea();?>">
                            <label for="area">Área</label>
                        </div>
                        <div class="input-field">
                            <input type="number" id="cargaHoraria" name="cargaHoraria" required="required" value="<?php if($id) echo $curso->getCargaHoraria();?>">
                            <label for="cargaHoraria">Carga Horária</label>
                        </div>
                        <div class="input-field">
                            <input type="date" id="dataFundacao" name="dataFundacao" required="required" value="<?php if($id) echo $curso->getDataFundacao();?>">
                            <label for="dataFundacao">Data Fundação</label>
                        </div>
                        <?php if($id) {?>
                        <input type="hidden" name="id" value="<?php echo $curso->getId();?>">
                        <?php }?>
                        <button class="btn center waves-effect waves-light btn-large" type="submit">
                            Salvar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include_once("footer.php");?>