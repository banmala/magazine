<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	$Contact = new contact();
	debugger($_POST);
	if ($_POST) {
		$act='Add';
		$data = array(				
				'email'=>filter_var($_POST['email'],FILTER_VALIDATE_EMAIL),
				'subject' => sanitize(htmlentities($_POST['subject'])),
				'message' => sanitize(htmlentities($_POST['message'])),				
			);
		$success = $Contact->addContact($data);
		if ($success) {
			redirect('../contact','success','Contact '.$act.'ed Successfully');
		}else{
			redirect('../contact','error','Problem while '.$act.'ing Contact');
		}
	}
