<?php 
	define ('ERRO_LOGAR', '<div class="alert alert-danger" role="alert"><b>Erro!</b> Favor efetuar o login.</div>');
	define ('ERRO_LOGAR2', 'Favor efetuar o login.');
	define ('CAMINHO_PROJETO', realpath(dirname(__FILE__) . '/..'));
	//set_include_path(get_include_path() . PATH_SEPARATOR . CAMINHO_PROJETO);
	
	define ('ERRO_JOGAR', 'A entidade escolhida não está habilitada para o jogador!');
	
	define ('TOOLTIP_CADASTRO_FORMACAO_ACADEMICA', 'Curso de formação superior. Exemplo: Administração, Sistema de Informação');
	
	define ('TOOLTIP_PAINEL_USUARIO_QUALIFICACAO', 'A qualificação serve para avaliar o seu desempenho no jogo. Caso seja aprovado, o jogo pra valer é habilitado.');
	define ('TOOLTIP_PAINEL_USUARIO_JOGAR', 'O jogo só aparecerá nesta seção, após passar no exame de qualificação. Você poderá jogar quantas vezes desejar.');
	define ('TOOLTIP_PAINEL_USUARIO_OUTROS', 'Tutorial explica o funcionamento do jogo.');
	
	define ('PONTO_QUALIFICACAO', '60');
	define ('EXPERIMENTO_RODADA_ID', '10');
?>