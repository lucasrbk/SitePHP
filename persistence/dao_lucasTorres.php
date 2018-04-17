<?php
    require_once 'conexao.php';
	require_once '../model/class_lucasTorres.php'; 
	
	class DAOLucasTorres{
		
		private $conexao;
		
		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();	
				 }
			
		}	
		
		public function cadastrarParente(LucasTorres $parente){
			$nome = $parente->getPrimeiroNome();
			$ultimo = $parente->getUltimoNome(); 

			$sql = "INSERT INTO parente (primeironome, ultimonome) VALUES ('$nome', '$ultimo')";
			$this->conexao->executarQuery($sql);
		}
		
		public function listarParentes(){
			$lista = $this->conexao->executarQuery("SELECT * FROM parente");
			$arrayParentes = array();
			
			while ($linha = mysqli_fetch_array($lista)) {
				$parente = new LucasTorres($linha['codigo'],$linha['primeironome'],$linha['ultimonome']);
				array_push($arrayParentes,$parente);
			}
			return $arrayParentes;
		}
		
		public function removerParente($codigo){
			$sql = "DELETE FROM parente WHERE codigo = '$codigo'";
			$this->conexao->executarQuery($sql);
		}
		 
		
	}
	
?>