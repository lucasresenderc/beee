<?php

header('Content-Type: text/html; charset=UTF-8');

//fazendo a conexão com o db
try {
	$con = new PDO("mysql:host=localhost;dbname=arduino", "root", "");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo "Não deu pra conectar";
}

function retornarRotinas(){
	global $con;

	$prep = $con->prepare("SELECT * FROM rotinas");
		
	$prep->execute();
	$linha = $prep->fetchAll();

	return $linha;
}

function excluirRotina($id){
	global $con;

	$prep = $con->prepare("DELETE FROM rotinas WHERE id = ?");
	$prep->bindParam(1, $id);

	$prep->execute();
}

function novaRotina(){
	global $con;
	$arr = [[0,0,0,0,0,0,0,0,0,0,0,0,1,1]];

	$prep = $con->prepare("INSERT INTO rotinas (nome, descri, rotina, uso) VALUES ('Nome da Rotina', 'Descrição da Rotina', ?, 0)");
	$prep->bindParam(1, json_encode($arr));

	$prep->execute();
}

function updateRotina($id, $nome, $desc, $rotina){
	global $con;

	$prep = $con->prepare("UPDATE rotinas SET nome = ?, descri = ?, rotina = ? WHERE id = ?");
	$prep->bindParam(1, $nome);
	$prep->bindParam(2, $desc);
	$prep->bindParam(3, $rotina);
	$prep->bindParam(4, $id);

	$prep->execute();
}

function usarRotina($id){
	global $con;

	$prep = $con->prepare("UPDATE rotinas SET uso = 0 WHERE uso = 1");
	$prep->execute();

	$prep = $con->prepare("UPDATE rotinas SET uso = 1 WHERE id = ?");
	$prep->bindParam(1, $id);
	$prep->execute();
}

function retornarUltimoId(){
	global $con;	
	return $con->lastInsertId();
}

?>