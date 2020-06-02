<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	$Contact = new contact();
	debugger($_GET);
	if ($_GET) {
		if (isset($_GET['id']) && !empty($_GET['id'])) {
			$contact_id = (int)$_GET['id'];
			if ($contact_id) {
				$accept_act = substr(md5("Accept-Contact-".$contact_id.$_SESSION['token']), 3,15);
				$reject_act = substr(md5("Reject-Contact-".$contact_id.$_SESSION['token']), 3,15);
				if ($accept_act == $_GET['act']) {
					$contact_info = $Contact->getContactbyId($contact_id);
					if ($contact_info) {
						$data = array(
							'state'=>'responded'
						);
						$success = $Contact->updateContactById($data,$contact_id);
						if ($success) {
							redirect('../contact','success','Contact Responded Successfully');
						}else{
							redirect('../contact','error','Error while Responding Contact');
						}
					}else{
						redirect('../contact','error','Contact not Found');
					}
				}else{
					redirect('../contact','error','Invalid Action');
				}
			}else{
				redirect('../contact','error','ID is invalid');
			}
		}else{
			redirect('../contact','error','ID is required');
		}
	}else{
		redirect('../contact','error','Unauthorized Access');
	}
?>
