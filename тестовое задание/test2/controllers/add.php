<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$fields = extractFields($_POST, ['date_input', 'name', 'email', 'cost', 'saleForRange', 'relativesaleForRange']);
	$validateErrors = messagesValidate($fields);	

	if(empty($validateErrors)){
		messagesAdd($fields);
		$_SESSION['messages.added'] = true;
		header('Location: index.php');
		exit();
	}
}
else{
	$fields = ['date_input' => '', 'name' => '', 'email' => ''];
	$validateErrors = [];
}

$pageTitle = 'Add';
$pageContent = template('messages/v_add', [
	'fields' => $fields,
	'validateErrors' => $validateErrors
]);