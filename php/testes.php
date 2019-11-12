<?php
    require_once('./Curso.class.php');
    require_once('./Curso.DAO.php');

    $curso1 = new Curso('Informatica','Hackear Face',69,'10-10-2010');
    $curso2 = new Curso('Geoprocessamento','Desenhar mapinha',1,'11-01-1990');
    $curso3 = new Curso('TADS','Hackeador de Mainframe',420,'01-12-2069');
    $curso4 = new Curso('Eletrotécnica','Chocante',5,'30-01-2001');
    $cursoDAO = new CursoDAO();

    #Testes Inserir

    var_dump($cursoDAO->inserir($curso1));
    var_dump($cursoDAO->inserir($curso2));
    var_dump($cursoDAO->inserir($curso3));
    var_dump($cursoDAO->inserir($curso4));

    #Testes Excluir

    var_dump($cursoDAO->excluir(2));

    #Testes Buscar

    $busca1 = $cursoDAO->busca(2);
    $busca2 = $cursoDAO->busca(3);
    var_dump($busca1);
    var_dump($busca2);

    #Testes Listar
    $limit = 10;
    $offset = 5;
    $lista1= $cursoDAO->lista($limit, $offset);
    var_dump($lista1);

    #Testes Alterar

    $busca1->setNome('ALTERADO');
    $busca2->setArea('OO');
    var_dump($cursoDAO->altera($busca1));
    var_dump($cursoDAO->altera($busca2));

    #Testes Salvar (Inserir)
    $salva1 = new Curso('Teste1','Salva1',99,'07-02-1999');
    $salva2 = new Curso('Teste2','Salva2',188,'17-12-2999');
    var_dump($cursoDAO->salva($salva1));
    var_dump($cursoDAO->salva($salva2));

    #Testes Salvar (Alterar)
    $salva3 = $cursoDAO->busca(4);
    $salva3->setNome('SalvaAlterado');
    var_dump($cursoDAO->salva($salva3));
?>