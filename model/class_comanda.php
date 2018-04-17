<?php
   class Comanda{
   		private $codigo;
		private $dataCompra;
		private $formaPagamento;
		private $status;
		private $funcionario;
		private $pizza;
		
		public function __construct($codigo=0, $dataCompra="", $formaPagamento="", $status="", $funcionario="", $pizza=""){
			$this->codigo = $codigo;	
			$this->dataCompra = $dataCompra;
			$this->formaPagamento = $formaPagamento;
			$this->status = $status;
			$this->funcionario = $funcionario;
			$this->pizza = $pizza;
		}		
		
		public function setCodigo($codigo){
			$this->codigo = $codigo;
		}
		
		public function getCodigo(){
			return $this->codigo;
		}
		
		public function setDataCompra($dataCompra){
			$this->dataCompra = $dataCompra;
		}
		
		public function getDataCompra(){
			return $this->dataCompra;
		}
		
		public function setFormaPagamento($formaPagamento){
			$this->formaPagamento = $formaPagamento;
		}
		
		public function getFormaPagamento(){
			return $this->formaPagamento;
		}
		
		public function setStatus($status){
			$this->status = $status;
		}
		
		public function getStatus(){
			return $this->status;
		}
		
		public function setFuncionario($funcionario){
			$this->funcionario = $funcionario;
		}
		
		public function getFuncionario(){
			return $this->funcionario;
		}
		
		public function setPizza($pizza){
		    $this->pizza = $pizza;
		}
		
		public function getPizza(){
		    return $this->pizza;
		}
	
   }
?>