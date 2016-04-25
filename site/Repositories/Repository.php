<?php 
namespace site\Repositories;
use site\Db;

class Repository {
		protected $db;

		protected function __construct(Db $db){
		$this->db = $db;
	}
}
?>