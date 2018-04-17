<?php
   require_once '../persistence/dao_lucasTorres.php';
   
   $objetoParente = new LucasTorres();
   $objetoParente->setPrimeiroNome($_REQUEST['primeironome']);
   $objetoParente->setUltimoNome($_REQUEST['ultimonome']);
   
   
   $dao = new DAOLucasTorres();
   $dao->cadastrarParente($objetoParente); 
 	
	header('Location: ../view/view_lucasTorres.php');
	exit;
?>