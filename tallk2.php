<?php
	$mytext=strip_tags($_POST['mytext']);
	$mytell=strip_tags($_POST['mytell']);
	$sity=strip_tags($_POST['sity']);
	$error="";
	if ($mytext=="" && $mytell=="") $error="er1";
	elseif ($mytext=="") $error="er2";
	elseif ($mytell=="") $error="er3";
	if($error!=""){
		echo $error;
		exit;
	}
	//require_once "bloks/function.php";
	require_once "bloks/connect.php";
	require_once "mailf.php";
	$si="";
	if ($sity == "1")
		$si="Архангельск";
	if ($sity == "2")
		$si="Вологда";
	$message = '
	Заказ звонка
	
	Заказ звонка с сайта "МАСЛА"
	Имя: '.$mytext.'
	Телефон: '.$mytell.'
	Город: '.$si.'
	Дата: '.date("d.m.Y H:i");
	
	
	/*
	$smtp_host			сервер для отправки почты
	$smtp_port			Порт работы.
	$smtp_username		Смените на адрес своего почтового ящика. с него будут идти письма (Логин и адрес совподают)
	$smtp_password		Измените пароль 
	$smtp_charset		кодировка сообщений. (windows-1251 или utf-8, итд) 
	$smtp_from			Ваше имя - или имя Вашего сайта. Будет показывать при прочтении в поле "От кого" 
	$smtp_to			адресс адресата
	$smtp_to_name		имя получателя 
	$smtp_subject		тема письма 
	$smtp_text			текст письма
	*/

	
	if  ($sity == "1") 
		mailtext($smtp_host, $smtp_port, $smtp_username, $smtp_password, $smtp_charset, $smtp_from, $EmailA, $NameA, 'Звонок', $message); 
	
	if  ($sity == "2") mailtext($smtp_host, $smtp_port, $smtp_username, $smtp_password, $smtp_charset, $smtp_from, $EmailV, $NameV, 'Звонок', $message); 
	
	$error=true;
	echo $error;
?>