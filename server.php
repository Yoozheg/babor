<?php
 $address = "name@domain.com"; // АДРЕС ПОЧТЫ МЕНЯТЬ ТУТ
 
 function getStr($data, $default = ""){
  if(!isset($_POST[$data])) return $default;
  $data = $_POST[$data];
  $data = htmlspecialchars(strip_tags(trim($data)));
  return ($data != "" ? $data : $default);
 }

 $name  = getStr('name');
 $phone = getStr('phone');

 $site = "BABOR beauty spa";
 $subject = "Заявка с сайта " . $site;
 
 $mes = "Имя: ".$name." \nТелефон: ". $phone;
 
 $additional = "Content-type:text/plain;charset = UTF-8\r\nFrom: " . $site;
 $additional .= "\r\nX-Mailer: PHP/" . phpversion();
 $send = mail($address, $subject, $mes, $additional);
 
 if($send){
  echo "Ваше сообщение успешно отправлено!";
 }else{
  echo "Ошибка, сообщение не отправлено!";
 }
?>
