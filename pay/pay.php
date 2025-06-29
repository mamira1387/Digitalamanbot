<?php
/*
● In The Name Of God 
● Source 》 @jahanbots
● Developer 》 telegram:/
● website 》 http://www.jahanbots.ir/
● Channel 》 @jahanbots
*/
$MerchantID = 'مرچنت کد ';
$Description = 'خرید ربات مدیریت گروه';
$Email = 'ایمیل';
$Mobile = 'شماره تماس';
$CallbackURL = $_GET['callback'];
$Amount = $_GET['amount']; 
$client = new SoapClient('https://de.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

$result = $client->PaymentRequest(
[
'MerchantID' => $MerchantID,
'Amount' => $Amount,
'Description' => $Description,
'Email' => $Email,
'Mobile' => $Mobile,
'CallbackURL' => $CallbackURL,
]
);

if ($result->Status == 100) {
Header('Location: https://www.zarinpal.com/pg/StartPay/'.$result->Authority);
} else {
echo'ERR: '.$result->Status;
}
?>