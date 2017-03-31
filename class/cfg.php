<?php

	## Define globals
	define('_DB_HOST_', 'localhost');
	define('_DB_USERNAME_', 'root');
	define('_DB_PASSWORD_', '');
	define('_DB_NAME_', 'slipseknuden');
	define('_LOG_PATH_', './log/');

	## CLass autoloader
	function classLoader($className){
		$className = str_replace('\\', '/', $className);
		if(file_exists(__DIR__ .'/Classes/'. $className . '.php')){
			require_once __DIR__ .'/Classes/'. $className . '.php';
		} else {
			echo 'ERROR: '. __DIR__ .'/Classes/'. $className . '.php';
		}
	}
	spl_autoload_register('classLoader');

  use Database\DB;

	$conn = new DB(_DB_HOST_, _DB_USERNAME_, _DB_PASSWORD_, _DB_NAME_);

	$id = 0;
	$sql = $conn->prepQuery("SELECT * FROM users");
		if($sql->execute()){
				$data = $sql->fetchAll(PDO::FETCH_OBJ);
				echo '<pre>';
				foreach($data as $val){
						print_r($val->userName . '<br>');
				}
				#print_r($data);
				echo '</pre>';
		}


