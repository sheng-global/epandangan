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

/* Reference
	// the ExtendedPdo way to do the same kind of "fetch all"
	$pdo = new ExtendedPdo(...);
	$result = $pdo->fetchAll($stm, $bind);

	// fetchAssoc() returns an associative array of all rows where the key is the
	// first column, and the row arrays are keyed on the column names
	$result = $pdo->fetchAssoc($stm, $bind);

	// fetchGroup() is like fetchAssoc() except that the values aren't wrapped in
	// arrays. Instead, single column values are returned as a single dimensional
	// array and multiple columns are returned as an array of arrays
	// Set style to PDO::FETCH_NAMED when values are an array
	// (i.e. there are more than two columns in the select)
	$result = $pdo->fetchGroup($stm, $bind, $style = PDO::FETCH_COLUMN)

	// fetchObject() returns the first row as an object of your choosing; the
	// columns are mapped to object properties. an optional 4th parameter array
	// provides constructor arguments when instantiating the object.
	$result = $pdo->fetchObject($stm, $bind, 'ClassName', array('ctor_arg_1'));

	// fetchObjects() returns an array of objects of your choosing; the
	// columns are mapped to object properties. an optional 4th parameter array
	// provides constructor arguments when instantiating the object.
	$result = $pdo->fetchObjects($stm, $bind, 'ClassName', array('ctor_arg_1'));

	// fetchOne() returns the first row as an associative array where the keys
	// are the column names
	$result = $pdo->fetchOne($stm, $bind);

	// fetchPairs() returns an associative array where each key is the first
	// column and each value is the second column
	$result = $pdo->fetchPairs($stm, $bind);

	// fetchValue() returns the value of the first row in the first column
	$result = $pdo->fetchValue($stm, $bind);

	// fetchAffected() returns the number of affected rows
	$stm = "UPDATE test SET incr = incr + 1 WHERE foo = :foo AND bar = :bar";
	$row_count = $pdo->fetchAffected($stm, $bind);
	*/
}