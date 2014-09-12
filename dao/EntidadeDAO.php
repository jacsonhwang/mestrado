<?php
include_once __DIR__ . '/../inc/conexao.php';
include_once __DIR__ . '/../model/Entidade.php';

class EntidadeDAO {
	
	private $cn;
	private $tabela = "entidade";
	
	public function listarEntidade(){
	
		$cn = new Conexao();
		$entidades = array();
		
		$sql = "SELECT id, nome, descricao_jogo, nome_jogo
				FROM entidade";
	
		$result = $cn->execute($sql);
		
		while ($rs = sqlsrv_fetch_array($result)) {
			$entidade = new Entidade($rs['id'], $rs['nome'], $rs['nome_jogo'], $rs['descricao_jogo']);
			array_push($entidades , $entidade);			
		}
	
		$cn->disconnect();
		
		return $entidades;		
	}
	
	public function recuperaEntidadePorNome($nome){
		$cn = new Conexao();

		$sql = "SELECT id, nome, descricao_jogo, nome_jogo
				FROM entidade
				WHERE nome = '".$nome."'";
		
		$result = $cn->execute($sql);
		
		while ($rs = sqlsrv_fetch_array($result)) {
			$entidade = new Entidade($rs['id'], $rs['nome'], $rs['nome_jogo'], $rs['descricao_jogo']);
		}
		
		$cn->disconnect();
		
		return $entidade;
	}
	
	public function recuperaEntidadePorId($id){
		
	 	$cn = new Conexao();
	
		$sql = "SELECT id, nome, descricao_jogo, nome_jogo
				FROM entidade
				WHERE id = '".$id."'";
	
		$result = $cn->execute($sql);
	
		while ($rs = sqlsrv_fetch_array($result)) {
			$entidade = new Entidade($rs['id'], $rs['nome'], $rs['nome_jogo'], $rs['descricao_jogo']);
		}
	
		$cn->disconnect();
	 
		return $entidade;
	}
	
	public function inserirEntidade($entidade){
		$cn = new Conexao();
		
		$entidadeArray = $entidade->recuperarArrayEntidade();
		
		$cn->insert($this->tabela, $entidadeArray);
		
		$cn->disconnect();
	}
	
	public function excluirEntidade($id){
		$cn = new Conexao();
	
		$sql = "DELETE FROM entidade WHERE id = '".$id."'";
		
		$result = $cn->execute($sql);
	
		$cn->disconnect();
	}
	
	public function alterarEntidade($entidade) {
	
		$cn = new Conexao();
	
		$sql = "UPDATE entidade
				SET nome='" . $entidade->getNome() . "',
					nome_jogo='" . $entidade->getNomeJogo() . "',
					descricao_jogo='" . $entidade->getDescJogo() . "'					
				WHERE id='" . $entidade->getId() . "';";
	
		$cn->execute($sql);
	
		$cn->disconnect();
	}

	public function criarTabelaEntidade($entidade) {
	
		$cn = new Conexao();
	
		$sql = "CREATE TABLE [dbo].[entidade_".$entidade->getNome()."](
					[id] [int] IDENTITY(1,1) NOT NULL,
					CONSTRAINT [PK_entidade_".$entidade->getNome()."] PRIMARY KEY CLUSTERED 
				(
					[id] ASC
				)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
				) ON [PRIMARY]";
		
		$cn->execute($sql);
	
		$cn->disconnect();
	}
	
	public function criarTabelaResultadoEntidade($entidade) {
	
		$cn = new Conexao();
	
		$sql = "CREATE TABLE [dbo].[resultado_entidade_".$entidade->getNome()."](
					[id] [int] IDENTITY(1,1) NOT NULL,	
					[linking_id] INT NOT NULL,	
					[entidade_".$entidade->getNome()."_id] INT NOT NULL,
					[entidade_".$entidade->getNome()."_alvo_id] INT NOT NULL,
 						CONSTRAINT [PK_resultado_entidade_".$entidade->getNome()."] PRIMARY KEY CLUSTERED 
				(
					[id] ASC
				)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
				) ON [PRIMARY]

				ALTER TABLE [dbo].[resultado_entidade_".$entidade->getNome()."]  WITH CHECK ADD  CONSTRAINT [FK_resultado_entidade_".$entidade->getNome()."_entidade_".$entidade->getNome()."] FOREIGN KEY([entidade_".$entidade->getNome()."_id])
				REFERENCES [dbo].[entidade_".$entidade->getNome()."] ([id])

				ALTER TABLE [dbo].[resultado_entidade_".$entidade->getNome()."] CHECK CONSTRAINT [FK_resultado_entidade_".$entidade->getNome()."_entidade_".$entidade->getNome()."]			

				ALTER TABLE [dbo].[resultado_entidade_".$entidade->getNome()."]  WITH CHECK ADD  CONSTRAINT [FK_resultado_entidade_".$entidade->getNome()."_resultado_entidade_".$entidade->getNome()."_alvo] FOREIGN KEY([entidade_".$entidade->getNome()."_alvo_id])
				REFERENCES [dbo].[entidade_".$entidade->getNome()."_alvo] ([id])
				
				ALTER TABLE [dbo].[resultado_entidade_".$entidade->getNome()."] CHECK CONSTRAINT [FK_resultado_entidade_".$entidade->getNome()."_resultado_entidade_".$entidade->getNome()."_alvo]";

		$cn->execute($sql);
	
		$cn->disconnect();
	}
	
	public function criarTabelaResultadoEntidadeFinal($entidade) {
	
		$cn = new Conexao();
	
		$sql = "CREATE TABLE [dbo].[resultado_entidade_".$entidade->getNome()."_final](
					[id] [int] IDENTITY(1,1) NOT NULL,
					[linking_id] INT NOT NULL,
					[entidade_".$entidade->getNome()."_id] INT NOT NULL,
 						CONSTRAINT [PK_resultado_entidade_".$entidade->getNome()."_final] PRIMARY KEY CLUSTERED
				(
					[id] ASC
				)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
				) ON [PRIMARY]
	
				ALTER TABLE [dbo].[resultado_entidade_".$entidade->getNome()."_final]  WITH CHECK ADD  CONSTRAINT [FK_resultado_".$entidade->getNome()."_final_entidade_".$entidade->getNome()."] FOREIGN KEY([entidade_".$entidade->getNome()."_id])
				REFERENCES [dbo].[entidade_".$entidade->getNome()."] ([id])
	
				ALTER TABLE [dbo].[resultado_entidade_".$entidade->getNome()."_final] CHECK CONSTRAINT [FK_resultado_".$entidade->getNome()."_final_entidade_".$entidade->getNome()."]";	

		$cn->execute($sql);
	
		$cn->disconnect();
	}
	
	public function criarTabelaGabaritoEntidade($entidade) {
	
		$cn = new Conexao();
	
		$sql = "CREATE TABLE [dbo].[gabarito_entidade_".$entidade->getNome()."](
					[id] [int] IDENTITY(1,1) NOT NULL,
					[linking_id] INT NOT NULL,
					[entidade_".$entidade->getNome()."_id] INT NOT NULL,
 						CONSTRAINT [PK_gabarito_entidade_".$entidade->getNome()."] PRIMARY KEY CLUSTERED
				(
					[id] ASC
				)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
				) ON [PRIMARY]
	
				ALTER TABLE [dbo].[gabarito_entidade_".$entidade->getNome()."]  WITH CHECK ADD  CONSTRAINT [FK_gabarito_entidade_".$entidade->getNome()."_entidade_".$entidade->getNome()."] FOREIGN KEY([entidade_".$entidade->getNome()."_id])
				REFERENCES [dbo].[entidade_".$entidade->getNome()."] ([id])
	
				ALTER TABLE [dbo].[gabarito_entidade_".$entidade->getNome()."] CHECK CONSTRAINT [FK_gabarito_entidade_".$entidade->getNome()."_entidade_".$entidade->getNome()."]";

		$cn->execute($sql);
	
		$cn->disconnect();
	}
	
	public function inserirTabelaEntidade($entidade){
		$cn = new Conexao();
		
		$sql = "INSERT INTO entidade_".$entidade->getNome()." DEFAULT VALUES";

		$cn->execute($sql);
	
		$cn->disconnect();
	}
	
	public function criarTabelaEntidadeAlvo($entidade) {
	
		$cn = new Conexao();
		
		$sql = "CREATE TABLE [dbo].[entidade_".$entidade->getNome()."_alvo](
					[id] [int] IDENTITY(1,1) NOT NULL,
					[entidade_".$entidade->getNome()."_id] INT NULL,
					[entidade_usuario_id] INT NULL,					
					[situacao_tarefa_id] INT NULL,
					[data_inicio] [datetime] NULL,
					[data_fim] [datetime] NULL,
					CONSTRAINT [PK_entidade_".$entidade->getNome()."_alvo] PRIMARY KEY CLUSTERED
					(
						[id] ASC
					)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
				) ON [PRIMARY]
					
										
				ALTER TABLE [dbo].[entidade_".$entidade->getNome()."_alvo]  WITH CHECK ADD  CONSTRAINT [FK_entidade_".$entidade->getNome()."_alvo_entidade_".$entidade->getNome()."] FOREIGN KEY([entidade_".$entidade->getNome()."_id])
				REFERENCES [dbo].[entidade_".$entidade->getNome()."] ([id])
				
				
				ALTER TABLE [dbo].[entidade_".$entidade->getNome()."_alvo] CHECK CONSTRAINT [FK_entidade_".$entidade->getNome()."_alvo_entidade_".$entidade->getNome()."]
				
				
				ALTER TABLE [dbo].[entidade_".$entidade->getNome()."_alvo]  WITH CHECK ADD  CONSTRAINT [FK_entidade_".$entidade->getNome()."_alvo_entidade_usuario] FOREIGN KEY([entidade_usuario_id])
				REFERENCES [dbo].[entidade_usuario] ([id])
				
				
				ALTER TABLE [dbo].[entidade_".$entidade->getNome()."_alvo] CHECK CONSTRAINT [FK_entidade_".$entidade->getNome()."_alvo_entidade_usuario]
				
				
				ALTER TABLE [dbo].[entidade_".$entidade->getNome()."_alvo]  WITH CHECK ADD  CONSTRAINT [FK_entidade_".$entidade->getNome()."_alvo_situacao_tarefa] FOREIGN KEY([situacao_tarefa_id])
				REFERENCES [dbo].[situacao_tarefa] ([id])
				
				
				ALTER TABLE [dbo].[entidade_".$entidade->getNome()."_alvo] CHECK CONSTRAINT [FK_entidade_".$entidade->getNome()."_alvo_situacao_tarefa]";
		
		$cn->execute($sql);
		
		$cn->disconnect();
		
	}
	
	public function recuperarIdEntidadeUsuario($idBaseDados) {
		
		$cn = new Conexao();
		
		$sql = "SELECT id FROM entidade_usuario WHERE usuario_id = (SELECT id FROM usuario WHERE email = '" . $_SESSION['email'] . "') AND entidade_id = (SELECT entidade_id FROM base_dados WHERE id = " . $idBaseDados . ")";
		
		$result = $cn->execute($sql);
		
		while ($rs = sqlsrv_fetch_array($result)) {
				
			$idEntidadeUsuario = $rs["id"];
		}
		
		$cn->disconnect();
		
		return $idEntidadeUsuario;
	}
	

	public function recuperarArrayEntidadePorUsuario($usuario) {
	
		$cn = new Conexao();
		$arrayEntidade = array();
		
		$sql  = " SELECT e.id, e.nome, e.descricao_jogo, e.nome_jogo";
		$sql .= " FROM entidade_usuario eu";
		$sql .= " INNER JOIN entidade e ON e.id= eu.entidade_id ";
		$sql .= " WHERE usuario_id = ". $usuario->getId();
	
		$result = $cn->execute($sql);
	
		while ($rs = sqlsrv_fetch_array($result)) {
	
			$entidade = new Entidade($rs["id"], $rs["nome"], $rs["nome_jogo"], $rs["descricao"]);
			
			array_push($arrayEntidade, $entidade);
		}
	
		$cn->disconnect();
	
		return $arrayEntidade;
	}
}

?>