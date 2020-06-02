<?php 
	class advertisement extends database{
		function __construct(){
			$this->table = 'advertisements';
			database::__construct();
		}

		public function addAdvertisement($data,$is_die=false){
			return $this->addData($data,$is_die);
		}

		public function getAdvertisementbyId($advertisement_id,$is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'id' => $advertisement_id,
						)
					)
			);
			return $this->getData($args,$is_die);
		}

		public function getAllAdvertisementWithLimitByType($type,$offset,$no_of_data,$is_die=false){
			$args = array(
				// 'fields' => ['id',
				// 	            'title',
				// 	            'content',
				// 	            'featured',
				// 	            'categoryid',
				// 	            '(SELECT categoryname from categories where id = categoryid) as category',
				// 	            'view',
				// 	            'image',
				// 	        	'created_date'],
					            
				'where' => array(
						'and' => array(
							'status'=>'Active',
							'type' =>$type
						)
					),
				'limit' => array(
							'offset' => $offset,
							'no_of_data' => $no_of_data	
				 		)
			);
			return $this->getData($args,$is_die);
		}

		public function getAllAdvertisement($is_die=false){
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
		
		public function updateAdvertisementById($data,$id,$is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'id' => $id,
						)
					)
			);
			return $this->updateData($data,$args,$is_die);
		}

		public function deleteAdvertisementById($id,$is_die=false){
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


