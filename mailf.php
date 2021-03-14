<?
function get_data($smtp_conn)
{
  $data="";
  while($str = fgets($smtp_conn,515)) 
  {
    $data .= $str;
    if(substr($str,3,1) == " ") { break; }
  }
  //echo $data."<br />";
  return $data;
}




/*
 smtp_username   Смените на адрес своего почтового ящика. с него будут идти письма (Логин и адрес совподают)
 smtp_port   Порт работы.
 smtp_host сервер для отправки почты
 smtp_password Измените пароль
 smtp_charset кодировка сообщений. (windows-1251 или utf-8, итд)
 smtp_from Ваше имя - или имя Вашего сайта. Будет показывать при прочтении в поле "От кого"
smtp_to адресс адресата
$smtp_to_name имя получателя
smtp_subject тема письма
smtp_text текст письма
smtp_file Путь до файла с файлом. Например score/a70087120_192.pdf
smtp_file_name Имя файла в письме.

*/
function mailfail($smtp_host, $smtp_port, $smtp_username, $smtp_password, $smtp_charset, $smtp_from, $smtp_to, $smtp_to_name, $smtp_subject, $smtp_text, $smtp_file, $smtp_file_name){ // 
	//заголовок письма
$header="Date: ".date("D, j M Y G:i:s")."\r\n"; 
$header.="From: =?".$smtp_charset."?Q?".str_replace("+","_",str_replace("%","=",urlencode($smtp_from)))."?= <".$smtp_username.">\r\n"; 
$header.="X-Mailer: The Bat! (v3.99.3) Professional\r\n"; 
$header.="Reply-To: =?".$smtp_charset."?Q?".str_replace("+","_",str_replace("%","=",urlencode($smtp_from)))."?= <".$smtp_username.">\r\n";
$header.="X-Priority: 3 (Normal)\r\n";
$slu=rand(100000000, 999999999);
$header.="Message-ID: <".$slu.".".date("YmjHis")."@mail.ru>\r\n";
$header.="To: =?".$smtp_charset."?Q?".str_replace("+","_",str_replace("%","=",urlencode($smtp_to_name)))."?= <".$smtp_to.">\r\n";
$header.="Subject: =?".$smtp_charset."?Q?".str_replace("+","_",str_replace("%","=",urlencode($smtp_subject)))."?=\r\n";
$header.="MIME-Version: 1.0\r\n";

//$header.="Content-Type: text/plain; charset=".$smtp_charset."\r\n";
//$header.="Content-Transfer-Encoding: 8bit\r\n";
$header.="MIME-Version: 1.0\r\n";
$header.="Content-Type: multipart/mixed; boundary=\"----------A4D921C2D10D7DB\"\r\n";

$file=$smtp_file;
$fp = fopen($file, "rb");
$code_file1 = chunk_split(base64_encode(fread($fp, filesize($file))));
fclose($fp);

$text="------------A4D921C2D10D7DB
Content-Type: text/plain; charset=".$smtp_charset."
Content-Transfer-Encoding: 8bit

".$smtp_text."

------------A4D921C2D10D7DB
Content-Type: application/octet-stream; name=\"".$smtp_file_name."\"
Content-transfer-encoding: base64
Content-Disposition: attachment; filename=\"".$smtp_file_name."\"

".$code_file1."

------------A4D921C2D10D7DB--
";

//$text = $smtp_text;


$smtp_conn = fsockopen($smtp_host, $smtp_port,$errno, $errstr, 10);
if(!$smtp_conn) {print "соединение с серверов не прошло"; fclose($smtp_conn); exit;}
//$data= get_data($smtp_coon);

fputs($smtp_conn,"EHLO vasya\r\n");
$data = get_data($smtp_conn);

fputs($smtp_conn,"AUTH LOGIN\r\n");
$data = get_data($smtp_conn);

fputs($smtp_conn,base64_encode($smtp_username)."\r\n"); // если что то логин сюда
$data = get_data($smtp_conn);

fputs($smtp_conn,base64_encode($smtp_password)."\r\n");
$data = get_data($smtp_conn);

// считаем количество символов письма со всеми заголовками, чтобы передать какого размера будет письмо
$size_msg=strlen($header."\r\n".$text); 

fputs($smtp_conn,"MAIL FROM:<".$smtp_username."> SIZE=".$size_msg."\r\n");
$data = get_data($smtp_conn);

fputs($smtp_conn,"RCPT TO:<".$smtp_to.">\r\n");
$data = get_data($smtp_conn);

fputs($smtp_conn,"DATA\r\n");
$data = get_data($smtp_conn);

fputs($smtp_conn,$header."\r\n".$text."\r\n.\r\n");
$data = get_data($smtp_conn);

fputs($smtp_conn,"QUIT\r\n");
$data = get_data($smtp_conn);
	
}

function mailtext($smtp_host, $smtp_port, $smtp_username, $smtp_password, $smtp_charset, $smtp_from, $smtp_to, $smtp_to_name, $smtp_subject, $smtp_text){ // 
	//заголовок письма
$header="Date: ".date("D, j M Y G:i:s")."\r\n"; 
$header.="From: =?".$smtp_charset."?Q?".str_replace("+","_",str_replace("%","=",urlencode($smtp_from)))."?= <".$smtp_username.">\r\n"; 
$header.="X-Mailer: The Bat! (v3.99.3) Professional\r\n"; 
$header.="Reply-To: =?".$smtp_charset."?Q?".str_replace("+","_",str_replace("%","=",urlencode($smtp_from)))."?= <".$smtp_username.">\r\n";
$header.="X-Priority: 3 (Normal)\r\n";
$slu=rand(100000000, 999999999);
$header.="Message-ID: <".$slu.".".date("YmjHis")."@mail.ru>\r\n";
$header.="To: =?".$smtp_charset."?Q?".str_replace("+","_",str_replace("%","=",urlencode($smtp_to_name)))."?= <".$smtp_to.">\r\n";
$header.="Subject: =?".$smtp_charset."?Q?".str_replace("+","_",str_replace("%","=",urlencode($smtp_subject)))."?=\r\n";
$header.="MIME-Version: 1.0\r\n";

$header.="Content-Type: text/plain; charset=".$smtp_charset."\r\n";
$header.="Content-Transfer-Encoding: 8bit\r\n";




$text = $smtp_text;


$smtp_conn = fsockopen($smtp_host, $smtp_port,$errno, $errstr, 10);
if(!$smtp_conn) {print "соединение с серверов не прошло"; fclose($smtp_conn); exit;}
//$data= get_data($smtp_coon);

fputs($smtp_conn,"EHLO vasya\r\n");
$data = get_data($smtp_conn);

fputs($smtp_conn,"AUTH LOGIN\r\n");
$data = get_data($smtp_conn);

fputs($smtp_conn,base64_encode($smtp_username)."\r\n"); // если что то логин сюда
$data = get_data($smtp_conn);

fputs($smtp_conn,base64_encode($smtp_password)."\r\n");
$data = get_data($smtp_conn);

// считаем количество символов письма со всеми заголовками, чтобы передать какого размера будет письмо
$size_msg=strlen($header."\r\n".$text); 

fputs($smtp_conn,"MAIL FROM:<".$smtp_username."> SIZE=".$size_msg."\r\n");
$data = get_data($smtp_conn);

fputs($smtp_conn,"RCPT TO:<".$smtp_to.">\r\n");
$data = get_data($smtp_conn);

fputs($smtp_conn,"DATA\r\n");
$data = get_data($smtp_conn);

fputs($smtp_conn,$header."\r\n".$text."\r\n.\r\n");
$data = get_data($smtp_conn);

fputs($smtp_conn,"QUIT\r\n");
$data = get_data($smtp_conn);
	
}

 //mailfail('ssl://smtp.yandex.ru', '465', 'servis@ekodvor29.ru', 'Ylaha12', 'utf-8', 'Имя тест', 'viktorg78@gmail.com', 'Тестер', 'Тест письма тема файл', 'Привет. проверка. Ок. с файлом', 'score\a70087120_191.pdf', 'Счет a191.pdf'); 
 //mailtext('ssl://smtp.yandex.ru', '465', 'servis@ekodvor29.ru', 'Ylaha12', 'utf-8', 'Имя тест', 'viktorg78@gmail.com', 'Тестер', 'Тест письма тема без файла', 'Привет. проверка. Ок. без файла'); 

?>