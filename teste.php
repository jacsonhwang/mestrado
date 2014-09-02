<?php 
include 'dao/MetaBaseDadosDAO.php';
include 'dBug.php';

$mbd = new MetaBaseDadosDAO();

$array = $mbd->recuperarNomeJogo(1);

new dBug($array);
?>