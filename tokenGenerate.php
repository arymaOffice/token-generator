<?php 
	ini_set('display_errors',1);
    error_reporting(E_ALL);

$token = '123456789123565'; 




$host = "auth.condivision.cloud";
$db = "authcond_phpauth";
$login = "authcond_support";
$pwd = "FortesTensorSloughRaffle18";


//Connessione al Database
function connect($host, $login, $pwd,$db){
$connect = mysqli_connect($host, $login, $pwd,$db);
if (mysqli_connect_error()) { (isset($_SESSION['failure']) ) ? $_SESSION['failure']++ : $_SESSION['failure'] = 1; @smail(mail_admin, "Connessione fallita ".$_SESSION['failure']." volte per $db  su ".client,"User IP: ".$_SERVER['REMOTE_ADDR'], intestazioni); die ("<div style=\"text-align: center; margin: 20% auto; font-family: Arial;\"><h1 style=\"color: #009900;\">Ops..!</h1><h2>Il server &egrave; momentaneamente non raggiungibile.</h2><p>Riprova tra pochi minuti. Ci scusiamo per il disagio.</p></div>"); } 
return $connect;
}
$connect = connect($host, $login, $pwd,$db);

$GLOBALS['connect'] = $connect;



echo $auth = 'INSERT INTO `phpauth_cookie_request` (`token`, `domain_id`) VALUES ( \''.$token.'\', \'2\');';
mysqli_query($GLOBALS['connect'],$auth);

header('Location: http://auth.condivision.cloud/index.php?cookie='.$token);
exit;
