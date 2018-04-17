<?php
    require_once 'conexao.php';
    require_once '../model/class_comanda.php';
	require_once '../model/class_funcionario.php';
	require_once '../model/class_pizza.php';
	
	class DAOComanda{
		
		private $conexao;
		
		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();	
				 }
		}	
		
		public function cadastrarComanda(Comanda $comanda, $funcionario, $pizza){
			$dataCompra = $comanda->getDataCompra();
			$formaPagamento = $comanda->getFormaPagamento();
			$status = $comanda->getStatus();
			$funcionario = $funcionario;
			$pizza = $pizza;
			

			$sql = "INSERT INTO comanda (datacompra, formapagamento, status, funcionario, pizza)
                            VALUES ($dataCompra', '$formaPagamento', '$status', '$funcionario', '$pizza')";
			
			$this->conexao->executarQuery($sql);
		}
		
		public function listarComandas(){
		    $lista = $this->conexao->executarQuery("SELECT f.codigo as codigocomanda, f.datacompra, f.formapagamento, f.status,
                                                    c.codigo as codigofuncionario, c.nome as nomefuncionario,
                                                    c.cpf, c.dataadmissao, c.status, p.codigo as codigopizza, p.nome as nomepizza,
                                                    p.ingredientes, p.valor, p.status, p.tipo
                                                    FROM comanda f, funcionario c, pizza p
                                                    WHERE f.funcionario && f.pizza = c.codigo && p.codigo");

			$arrayComandas = array();
			
			while ($linha = mysqli_fetch_array($lista)) {
				$comanda = new Comanda($linha['codigocomanda'], $linha['datacompra'], $linha['formapagamento'], $linha['status'], $linha['codigofuncionario'], $linha['codigopizza']);
				$funcionario = new Funcionario($linha['codigofuncionario'],$linha['nomefuncionario'],$linha['cpf'],$linha['dataadmissao'],$linha['status']); //observe aqui, que $cargo é o objeto da classe Cargo() que estamos adicionando dentro da classe Funcionário()
				$pizza = new Pizza($linha['codigopizza'],$linha['nomepizza'],$linha['ingredientes'],$linha['valor'],$linha['status'],$linha['tipo']);
				
				array_push($arrayComandas,$comanda);
			}
			return $arrayComandas;
		}
		
		public function removerComanda($codigo){
			$sql = "DELETE FROM comanda WHERE codigo = '$codigo'";
			$this->conexao->executarQuery($sql);
		}
		 
		
	}
	
?>