<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	$Advertisement = new advertisement();
	// debugger($_POST,true);
	// debugger($_FILES,true);Gcaktm
	if ($_POST) {
		$data = array(
				'url'=>sanitize($_POST['url']),
				'type' => htmlentities($_POST['type']),				
				'status' => 'Active',
				'added_by' => $_SESSION['user_id']
			);
		// debugger($data,true);
		if (isset($_FILES) && !empty($_FILES) && !empty($_FILES['image']) && $_FILES['image']['error'] == 0) {
			$success=uploadImage($_FILES['image'],'advertisement');
			if ($success) {
				$data['image'] = $success;
				if (isset($_POST['old_img']) && !empty($_POST['old_img']) && file_exists(UPLOAD_PATH.'advertisement/'.$_POST['old_img'])) {
					unlink(UPLOAD_PATH.'advertisement/'.$_POST['old_img']);
				}
			}else{
				redirect('../advertisement','error','Error while uploading Image');
			}
		}


		if (isset($_POST['id']) && !empty($_POST['id'])) {
			//update
			$act = 'Updat';
			$advertisement_id = (int)$_POST['id'];
		}else{
			//add
			$act = 'Add';
			$advertisement_id= false;
		}

		if ($advertisement_id) {
			$advertisement_info = $Advertisement->getAdvertisementbyId($advertisement_id);
			if ($advertisement_info) {
				if ($_SESSION['user_id'] == $advertisement_info[0]->added_by) {
					$success = $Advertisement->updateAdvertisementById($data,$advertisement_id);
				}else{
					redirect('../advertisement','error','You are not allowed to access this Advertisement');
				}
			}else{
				redirect('../advertisement','error','Advertisement not Found');
			}
		}else{
			$success = $Advertisement->addAdvertisement($data);
		}
		if ($success) {
			redirect('../advertisement','success','Advertisement '.$act.'ed Successfully');
		}else{
			redirect('../advertisement','error','Problem while '.$act.'ing Advertisement');
		}
	}else if ($_GET) {
		// debugger($_GET,true);
		if (isset($_GET['id']) && !empty($_GET['id'])) {
			$advertisement_id = (int)$_GET['id'];
			if ($advertisement_id) {
				$act = substr(md5("Delete-Advertisement-".$advertisement_id.$_SESSION['token']), 3,15);
				if ($act == $_GET['act']) {
					$advertisement_info = $Advertisement->getAdvertisementbyId($advertisement_id);
					if ($advertisement_info) {
						$data = array(
							'status'=>'Passive'
						);
						$success = $Advertisement->updateAdvertisementById($data,$advertisement_id);
						if ($success) {
							redirect('../advertisement','success','Advertisement Deleted Successfully');
						}else{
							redirect('../advertisement','error','Error while Deleting Advertisement');
						}
					}else{
						redirect('../advertisement','error','Advertisement not Found');
					}
				}else{
					redirect('../advertisement','error','Invalid Action');
				}
			}else{
				redirect('../advertisement','error','ID is invalid');
			}
		}else{
			redirect('../advertisement','error','ID is required');
		}
	}else{
		redirect('../advertisement','error','Unauthorized Access');
	}
?>
