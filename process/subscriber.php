<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	$Subscriber = new subscriber();
	debugger($_POST);
	if ($_POST) {
		$act='Add';
		$data = array(				
				'email'=>filter_var($_POST['email'],FILTER_VALIDATE_EMAIL),		
			);
		$success = $Subscriber->addSubscriber($data);
		if ($success) {
			redirect('../index','success','Subscriber '.$act.'ed Successfully');
		}else{
			redirect('../index','error','Problem while '.$act.'ing Subscriber');
		}
	}
