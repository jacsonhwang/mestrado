<?php 
//include 'dao/MetaBaseDadosDAO.php';
//include 'dao/EntidadesListaDAO.php';
//include 'dao/ResultadoDAO.php';
//include 'dao/BaseDAO.php';
include 'controller/entidadeControle.php';

include "inc/constantes.php";
include 'dBug.php';



//echo time();

/* $mbd = new MetaBaseDadosDAO();

$array = $mbd->recuperarNomeJogo(1);

new dBug($array); */

// ---------------------------------------------------------

/* $eld = new EntidadesListaDAO();

$array = $eld->recuperarEntidadeAleatoria(1);

new dBug($array); */

// ---------------------------------------------------------

/* $r = new ResultadoDAO();

$r->inserirResultadoEntidade(1, 1); */

// ---------------------------------------------------------

/* $b = new BaseDAO();

$nomeTabela = $b->recuperarNomeTabelaAleatoria(1);

new dBug($nomeTabela); */

// ---------------------------------------------------------

$entidade = recuperarEntidadeAleatoria(1);

new dBug($entidade);

?>