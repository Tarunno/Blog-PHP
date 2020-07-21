<?php
	require 'connect.inc.php';

	function printer($value){
		echo "<pre>" , print_r($value, true) , "</pre>";
	}

	function stmt_excute($sql, $data){
		global $con;
		$stmt = mysqli_stmt_init($con);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			echo $stmt->error;
		}
		$values = array_values($data);
		$type = str_repeat('s', count($values));
		mysqli_stmt_bind_param($stmt, $type, ...$values);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		return $result;
	}

	function selectAll($table, $conditions = []){
		global $con;
		$sql = "SELECT * FROM $table";
		if(empty($conditions)){
			$stmt = mysqli_stmt_init($con);
			mysqli_stmt_prepare($stmt, $sql);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			return $result;
		}
		else{
			$i = 0;
			foreach ($conditions as $key => $value) {
				if($i === 0){
					$sql = $sql . " WHERE $key=?";
				}else{
					$sql = $sql . " AND $key=?";
				}
				$i++;
			}
			$sql = $sql . ';';
			$result = stmt_excute($sql, $conditions);
			return $result;
		}
	}

	function selectOne($table, $conditions){
		global $con;
		$sql = "SELECT * FROM $table";
		$i = 0;
		foreach ($conditions as $key => $value) {
			if($i === 0){
				$sql = $sql . " WHERE $key=?";
			}else{
				$sql = $sql . " AND $key=?";
			}
			$i++;
		}
		$sql = $sql . ' LIMIT 1;';
		$result = stmt_excute($sql, $conditions);
		return $result;
	}

	$conditions = [
		'users_admin' => 0,
		'users_username' => 'Tarunno'
	];
