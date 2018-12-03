<?php 

	$link = $_GET["link"];


	$pag[1] = "bem_vindo.php";

	//dashboard
	$pag[2] = "dashboard/lista.php";

	//painelusuario
	$pag[3] = "profile/alterar.php";

	//logout
	$pag[9] = "sair.php";

	//patrocinadores
	$pag[10] = "patrocinadores/lista.php";
	$pag[11] = "patrocinadores/list.php"; 
	$pag[12] = "patrocinadores/add.php";
	$pag[13] = "patrocinadores/adicionar.php";
	$pag[14] = "patrocinadores/alter.php";
	$pag[15] = "patrocinadores/alterar.php";
	$pag[16] = "patrocinadores/delete.php";

	//serviços
	$pag[20] = "servicos/lista.php";
	$pag[21] = "servicos/list.php"; 
	$pag[22] = "servicos/add.php";
	$pag[23] = "servicos/adicionar.php";
	$pag[24] = "servicos/alter.php";
	$pag[25] = "servicos/alterar.php";
	$pag[26] = "servicos/delete.php";

	//analise seu exame
	$pag[30] = "analiseseuexame/lista.php";
	$pag[31] = "analiseseuexame/list.php"; 
	$pag[32] = "analiseseuexame/add.php";
	$pag[33] = "analiseseuexame/adicionar.php";
	$pag[34] = "analiseseuexame/alter.php";
	$pag[35] = "analiseseuexame/alterar.php";
	$pag[36] = "analiseseuexame/delete.php";

	//analise seu exame
	$pag[40] = "publicacoes/lista.php";
	$pag[41] = "publicacoes/list.php"; 
	$pag[42] = "publicacoes/add.php";
	$pag[43] = "publicacoes/adicionar.php";
	$pag[44] = "publicacoes/alter.php";
	$pag[45] = "publicacoes/alterar.php";
	$pag[46] = "publicacoes/delete.php";

	//agenda
	$pag[50] = "agenda/lista.php";
	$pag[51] = "agenda/list.php"; 
	$pag[52] = "agenda/add.php";
	$pag[53] = "agenda/adicionar.php";
	$pag[54] = "agenda/alter.php";
	$pag[55] = "agenda/alterar.php";
	$pag[56] = "agenda/delete.php";

	//áreas
	$pag[60] = "areas/lista.php";
	$pag[61] = "areas/list.php"; 
	$pag[62] = "areas/add.php";
	$pag[63] = "areas/adicionar.php";
	$pag[64] = "areas/alter.php";
	$pag[65] = "areas/alterar.php";
	$pag[66] = "areas/delete.php";

	//exames
	$pag[70] = "exames/lista.php";
	$pag[71] = "exames/list.php"; 
	$pag[72] = "exames/add.php";
	$pag[73] = "exames/adicionar.php";
	$pag[74] = "exames/alter.php";
	$pag[75] = "exames/alterar.php";
	$pag[76] = "exames/delete.php";

	//genes
	$pag[80] = "genes/lista.php";
	$pag[81] = "genes/list.php"; 
	$pag[82] = "genes/add.php";
	$pag[83] = "genes/adicionar.php";
	$pag[84] = "genes/alter.php";
	$pag[85] = "genes/alterar.php";
	$pag[86] = "genes/delete.php";
	$pag[87] = "genes/adicionarcsv.php";

	//usuários
	$pag[90] = "users/lista.php";
	$pag[91] = "users/list.php"; 
	$pag[92] = "users/add.php";
	$pag[93] = "users/adicionar.php";
	$pag[94] = "users/alter.php";
	$pag[95] = "users/alterar.php";
	$pag[96] = "users/delete.php";

	//contatos
	$pag[100] = "contatos/lista.php";
	$pag[101] = "contatos/list.php"; 
	$pag[102] = "contatos/add.php";
	$pag[103] = "contatos/adicionar.php";
	$pag[104] = "contatos/alter.php";
	$pag[105] = "contatos/alterar.php";
	$pag[106] = "contatos/delete.php";

	if(!empty($link)){
		include $pag[$link];
	}else{
		include 'dashboard/lista.php';
	}

?>