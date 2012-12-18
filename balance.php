<?php 
	header('Content-Type: text/javascript; charset=UTF-8');

	$login = 'yourcontractnumber';
	$password = 'yourpassword';

	include('config.php');

	$data = new SimpleXMLElement(file_get_contents('https://api.novotelecom.ru/billing/?method=userInfo&login=' . 
		urlencode($login) . '&passwordHash=' . urlencode(
		isset($passwordHash) ? $passwordHash : md5($password))));

	if($result = round((float)$data->balance, 2)):
?>
	document.write("<?php echo $result ?>");

<?php endif;
