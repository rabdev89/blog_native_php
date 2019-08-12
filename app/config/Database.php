<?php

namespace App\Config;

/**
 * Class Database Containing the Database informations
 * @package App\Config
 */
class Database extends \PDO{

    /**
     * Database constructor.
     */
    protected $db = 'blog_db';
    protected $host = 'localhost';
    protected $user = 'root';
    protected $pw = '';

    public function __construct() {
	}

	public function db_connect()
	{
		$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db;
		
		try {
			$pdo = new \PDO($dsn, $this->user, $this->pw);
			$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}
		catch(PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}

	}
	
}