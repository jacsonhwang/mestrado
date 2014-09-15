<?php
include_once __DIR__ . '/header.php';
include_once __DIR__ . '/inc/constantes.php';
include_once __DIR__ . '/inc/dBug.php';
include_once __DIR__ . '/inc/erro.php';
include_once __DIR__ . '/dao/BaseDAO.php';
include_once __DIR__ . '/dao/EntidadeDAO.php';
include_once __DIR__ . '/dao/EntidadesListaDAO.php';
include_once __DIR__ . '/dao/MetaBaseDadosDAO.php';
include_once __DIR__ . '/dao/UsuarioDAO.php';
include_once __DIR__ . '/controller/jogadaBancoControle.php';

$baseDAO = new BaseDAO();
$entidadeDAO = new EntidadeDAO();
$entidadesListaDAO = new EntidadesListaDAO();
$metaBaseDadosDAO = new MetaBaseDadosDAO();
$usuarioDAO = new UsuarioDAO();

$usuario = $usuarioDAO->recuperarObjetoUsuarioPorEmail($_SESSION["email"]);

$arrayEntidadePermitidoUsuarioQualificacao = $entidadeDAO->recuperarArrayEntidadeQualificacaoPorUsuario($usuario);
$arrayEntidadePermitidoUsuario = $entidadeDAO->recuperarArrayEntidadePorUsuario($usuario);

//Cria uma entidade baseada nos dados do POST, que e considera suspeita a princpio
//$entidadeSuspeita = new Entidade($_POST['entidade_id'], null, null, null);
$entidadeSuspeita = $entidadeDAO->recuperaEntidadePorId($_POST['entidade_id']);

//Verifica se a Entidade passada via POST é de fato valido para o usuario
$entidadeHabilitadoUsuarioQualificacao = verificarEntidadeParaUsuario ($entidadeSuspeita, $arrayEntidadePermitidoUsuarioQualificacao);
$entidadeHabilitadoUsuario = verificarEntidadeParaUsuario ($entidadeSuspeita, $arrayEntidadePermitidoUsuario);

if ($entidadeHabilitadoUsuarioQualificacao == true || $entidadeHabilitadoUsuario == true) {
	if ($entidadeHabilitadoUsuarioQualificacao == true) {
		$rodada['titulo'] = "Rodada de Qualificação";
		$rodada['tipo'] = "1";
	} else if ($entidadeHabilitadoUsuario == true) {
		$rodada['titulo'] = "Rodada";
		$rodada['tipo'] = "2";
	}
	
	//Carrega as bases de dados ligadas a entidade e seus meta base de dados

	$entidade = $entidadeSuspeita;
	
	$arrayBaseDados = $baseDAO->recuperaArrayBaseDadosPorEntidadeId($entidade);
	$entidade->setArrayBaseDados($arrayBaseDados);
	
	jogo($entidade, $referenciaExemplo, $rodada);
	
} else {	
	erro ("Erro", ERRO_JOGAR, "painel_usuario.php");
}

function verificarEntidadeParaUsuario ($entidadeSuspeita, $arrayEntidade) {
	if ($entidadeSuspeita != null) {
		foreach ($arrayEntidade as $entidade) {
			if ($entidade->getId() == $entidadeSuspeita->getId()) {
				return true;
			} 
		}
	}
	return false;
}

function jogo ($entidade, $referenciaExemplo, $rodada) {
	
// 	session_start();
	$_SESSION["inicioJogo"] = date('Y-d-m H:i:s');
// 	var_dump($_SESSION["inicioJogo"]);
	
	?>
	
	<script>

	$(document).ready(function () {
		recuperarEntidadeAleatoria(<?php echo $_POST['entidade_id']; ?>);
	    iniciarContador();
	});
    
	/*$.blockUI({ message: null });
	
	new Messi("Clique em OK para iniciar o jogo.", {
	    title : "Iniciar jogo",
	    titleClass : 'info',
	    buttons : [ {
	        id : 0,
	        label : 'OK',
	        val : 'X'
	    } ],
	    callback: function(val) {
	        if(val == 'X') {
	            
	        	recuperarEntidadeAleatoria(1);
	            iniciarContador();
	            
	            $.unblockUI();
	        }
	    }
	});*/
	</script>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
				<div class="menu-ferramentas">
					<ul class="nav nav-sidebar">
						<li class="tituloMenuSidebar"><a href="#" style="pointer-events: none; cursor: default;">Ferramentas</a></li>
						<li><a href="#" id="opcaoFiltro"><img src="img/icone-filtro.png"> Filtro</a></li>
						<!-- <li><a href="#" id="opcaoComparador"><img src="img/icone-comparador.png"> Comparador</a></li> -->
						<!-- <li><a href="#" id="opcaoDicionario"><img src="img/icone-dicionario.png"> Dicionário</a></li> -->
						<li><a href="#" id="opcaoArquivos"><img src="img/icone-arquivos.png"> Ajuda</a></li>
					</ul>
				</div>
			</div>
			
			<!-- ------------------------------ FILTRO ----------------------------- -->
			
			<?php include_once __DIR__ . '/game/filtro.php'; ?>
			
			<!-- ------------------------------ COMPARADOR ------------------------- -->
			
			<?php //include_once __DIR__ . '/game/comparador.php'; ?>
			
			<!-- ------------------------------ DICIONÁRIO ------------------------- -->
			
			<?php //include_once __DIR__ . '/game/dicionario.php'; ?>
			
			<!-- ------------------------------ ARQUIVOS --------------------------- -->
			
			<?php include_once __DIR__ . '/game/arquivo.php'; ?>
			
			<!-- ------------------------------ JOGO ------------------------------- -->
			
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			
				<!-- ------------------------------ LINHA 1 ------------------------------ -->
				
				<?php include_once __DIR__ . '/game/linha1.php'; ?>
				
				<!-- ------------------------------ LINHA 2 ------------------------------ -->
				<?php include_once __DIR__ . '/game/linha2.php'; ?>
				
				<!-- ------------------------------ LINHA 3 ------------------------------ -->
				<?php include_once __DIR__ . '/game/linha3.php'; ?>
				
			</div>
		</div>
	</div>
<?php }?>
</body>
</html>