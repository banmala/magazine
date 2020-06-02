<?php 
	class followus extends database{
		function __construct(){
			$this->table = 'followsus';
			database::__construct();
		}

		public function addFollowus($data,$is_die=false){
			return $this->addData($data,$is_die);
		}

		public function getFollowusbyId($followus_id,$is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'id' => $followus_id,
						)
					)
			);
			return $this->getData($args,$is_die);
		}

		public function getAllFollowus($is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'status'=>'Active',
						)
					),
				'order'=>'ASC'
			);
			return $this->getData($args,$is_die);
		}
		
		public function updateFollowusById($data,$id,$is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'id' => $id,
						)
					)
			);
			return $this->updateData($data,$args,$is_die);
		}

		public function deleteFollowusById($id,$is_die=false){
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


