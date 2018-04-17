<?php
   require_once '../persistence/dao_comanda.php';

   $objetoComanda = new Comanda();
   $objetoComanda->setDataCompra($_REQUEST['dataCompra']);
   $objetoComanda->setFormaPagamento($_REQUEST['formaPagamento']);
   $objetoComanda->setStatus($_REQUEST['status']);
   
   $daoc = new DAOComanda();
   $daoc->cadastrarComanda($objetoComanda, $_REQUEST['funcionario'], $_REQUEST['pizza']);
	header('Location: ../view/view_comanda.php');
	exit;
?>