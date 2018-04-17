<?php
   require_once '../persistence/dao_lucasTorres.php';
   
   $objetoDao = new DAOLucasTorres();
   $objetoDao->removerParente($_REQUEST['codigo']);
 	
	header('Location: ../view/view_lucasTorres.php');
	exit;
?>