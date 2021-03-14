<!DOCTYPE html>
<html lang="ru">
 <head>
    <!-- Необходимые Мета-теги всегда на первом месте -->  
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/main.css" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/modific.css" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/str_tallk.css" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/header_izm.css" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/footer_izm.css" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/tallk_izm.css" charset="utf-8">
	<meta name="description" content="Пркупка, продажа отработанного масла.">
	<meta name="Keywords" content="Архангельск, Северодвинс, Вологда, отработанное масло, Покупка отработанного масла, Покупка неликвидов, Перевозка опасных грузов">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="img/logomini.ico" rel="shortcut icon" type="image/x-icon">
	<title>Масло</title>
	
   </head>
<body>
<div id="wrapper">
	<div id="content">
	<!--Шапка и меню в header.php-->
	<?php
		require_once "bloks/header.php";		
	?>
		
	<!--Основная часть сайта-->
	<div id="main">
		<div id="searchStr">
			<input class="te" type="text" id="mytext" placeholder="Введите имя" onclick="$(this).css('border-color', '#b1c918')" /><br />
			<input class="te" type="text" id="mytell" placeholder="Введите телефон" onclick="$(this).css('border-color', '#b1c918')" /><br />
			<table>
			<tr>	
			 <td><input class="te1" name="sity" type="radio" value="1" checked></td><td>Архангельск</td>
			</tr>
			<tr>
			<td><input class="te1" name="sity" type="radio" value="2"></td><td>Вологда</td>
			</tr>
			</table>
			<span id="strsbmit">ОТПРАВИТЬ ЗАПРОС</span>			
		</div>
		<div id="searchText">
		</div>
</div>
</div>
	<!--начало подвала-->
	<?php
		require_once "bloks/footer.php";		
	?>
	
</div>
	<!--Шрифтовые значки-->
	<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>

	<!--jQery-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<?php
		require_once "bloks/js_skript.php";
	?>
	<script src="/js/tell.js"></script>
</body>
</html>