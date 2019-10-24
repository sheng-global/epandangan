<?php
use Aura\Sql\ExtendedPdo;

Class Model {

	public function __construct()
	{
		$this->pdo = new ExtendedPdo(
		    'mysql:host='.getenv('DB_HOST').';dbname='.getenv('DB_NAME').'',
		    ''.getenv('DB_USER').'',
		    ''.getenv('DB_PASS').'',
		    [], // driver attributes/options as key-value pairs
		    []  // queries to execute after connection
		);
	}
}