<?php
namespace site;
class Db {
	/**
	 *@var \PDO
	 */
	private $conn;
	
	/**
	 * @var \PDOStatement
	 */
	private $statement;

	/**
	 *@var Db
	 */
	private static $inst = null;
	
	private function __construct($host, $user, $password, $dbName){
		$dsn = 'mysql:dbname='.$dbName.';host='.$host;
		$this->conn = new \PDO($dsn, $user, $password);
	}

	public static function setInstance($host, $user, $pass, $dbName){
		if (self::$inst == null) {
			self::$inst = new self($host, $user, $pass, $dbName);
		}
	}

	/**
	 *@return Db
	 */
	public static function getInstance(){
		return self::$inst;
	}

	public function  query($query, array $params = []){
		$this->statement = $this->conn->prepare($query);
		$this->statement->execute($params);
	}

	public function fetchAll(){
		return $this->statement->fetchAll();
	}

	public function fetch(){
		return $this->statement->fetch();
	}

	public function rows(){
		return $this->statement->rowCount();
	}
}
?>