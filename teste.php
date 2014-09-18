<?php 
//include 'dao/MetaBaseDadosDAO.php';
//include_once __DIR__ . '/dao/EntidadesListaDAO.php';
include_once __DIR__ . '/dao/EntidadeAlvoDAO.php';
//include_once __DIR__ . '/dao/EntidadeDAO.php';
//include 'dao/ResultadoDAO.php';
//include 'dao/BaseDAO.php';
//include 'controller/entidadeControle.php';

include_once __DIR__ . '/inc/constantes.php';
include_once __DIR__ . '/inc/dBug.php';

//echo time();

/* $mbd = new MetaBaseDadosDAO();

$array = $mbd->recuperarNomeJogo(1);

new dBug($array); */

// ---------------------------------------------------------

/* $eld = new EntidadesListaDAO();

$array = $eld->recuperarEntidadeAleatoria(2, "entidade_pessoa_2", 1);

new dBug($array); */

// ---------------------------------------------------------

/* $r = new ResultadoDAO();

$r->inserirResultadoEntidade(1, 1); */

// ---------------------------------------------------------

/* $b = new BaseDAO();

$nomeTabela = $b->recuperarNomeTabelaAleatoria(1);

new dBug($nomeTabela); */

// ---------------------------------------------------------

/* $entidade = recuperarEntidadeAleatoria(2, "entidade_pessoa_2", 1);

new dBug($entidade); */

// ---------------------------------------------------------

$ead = new EntidadeAlvoDAO();

$array = $ead->listarQualidadeUsuarios(43);

new dBug($array);

// ---------------------------------------------------------

/* $ed = new EntidadeDAO();

$nomeEntidade = $ed->recuperarNomeEntidade(43);

echo $nomeEntidade; */

?>