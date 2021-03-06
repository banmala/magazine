<?php 
	class contact extends database{
		function __construct(){
			$this->table = 'contacts';
			database::__construct();
		}

		public function addContact($data,$is_die=false){
			return $this->addData($data,$is_die);
		}

		public function getContactbyId($contact_id,$is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'id' => $contact_id,
						)
					)
			);
			return $this->getData($args,$is_die);
		}

		public function getAllContact($is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'state' => 'waiting',
						)
					),
				'order'=>'ASC'
			);
			return $this->getData($args,$is_die);
		}

		public function getAllContactWithLimit($offset,$no_of_data,$is_die=false){
			$args = array(         
				'where' => array(
						'or' => array(
							'state' => 'waiting',
						)
					),
				'order'=>'ASC',
				'limit' => array(
							'offset' => $offset,
							'no_of_data' => $no_of_data	
				 		)
			);
			return $this->getData($args,$is_die);
		}

		public function updateContactById($data,$id,$is_die=false){
			$args = array(
				'where' => array(
						'and' => array(
							'id' => $id,
						)
					)
			);
			return $this->updateData($data,$args,$is_die);
		}

		public function deleteContactById($id,$is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'id' => $id,
						)
					)
			);
			return $this->deleteData($args,$is_die);
		}
	}

 ?>


