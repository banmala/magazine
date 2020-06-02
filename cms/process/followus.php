<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	$Followus = new followus();
	debugger($_POST);
	if ($_POST) {
		$data = array(
				'followusname'=>sanitize($_POST['followusname']),
				'icon'=>($_POST['icon']),
				'url'=>sanitize($_POST['url']),
				'status' => 'Active',
				'added_by' => $_SESSION['user_id']
			);
		// debugger($data);

		if (isset($_POST['id']) && !empty($_POST['id'])) {
			//update
			$act = 'Updat';
			$followus_id = (int)$_POST['id'];
		}else{
			//add
			$act = 'Add';
			$followus_id= false;
		}

		if ($followus_id) {
			$followus_info = $Followus->getFollowusbyId($followus_id);
			if ($followus_info) {
				if ($_SESSION['user_id'] == $followus_info[0]->added_by) {
					$success = $Followus->updateFollowusById($data,$followus_id);
				}else{
					redirect('../followus','error','You are not allowed to access this Followus');
				}
			}else{
				redirect('../followus','error','Followus not Found');
			}
		}else{
			$success = $Followus->addFollowus($data);
		}
		if ($success) {
			redirect('../followus','success','Followus '.$act.'ed Successfully');
		}else{
			redirect('../followus','error','Problem while '.$act.'ing Followus');
		}

	}else if ($_GET) {
		if (isset($_GET['id']) && !empty($_GET['id'])) {
			$followus_id = (int)$_GET['id'];
			if ($followus_id) {
				$act = substr(md5("Delete-Followus-".$followus_id.$_SESSION['token']), 3,15);
				if ($act == $_GET['act']) {
					$followus_info = $Followus->getFollowusbyId($followus_id);
					if ($followus_info) {
						$data = array(
							'status'=>'Passive'
						);
						$success = $Followus->updateFollowusById($data,$followus_id);
						if ($success) {
							redirect('../followus','success','Followus Deleted Successfully');
						}else{
							redirect('../followus','error','Error while Deleting Followus');
						}
					}else{
						redirect('../followus','error','Followus not Found');
					}
				}else{
					redirect('../followus','error','Invalid Action');
				}
			}else{
				redirect('../followus','error','ID is invalid');
			}
		}else{
			redirect('../followus','error','ID is required');
		}
	}else{
		redirect('../followus','error','Unauthorized Access');
	}
?>
