<?php
session_start();
	require 'db.inc.php';

	function create($table, $data){
		global $con;
		$sql = "INSERT INTO $table SET";
		$i = 0;
		foreach ($data as $key => $value) {
			if($i === 0){
				$sql = $sql . " $key=?";
			}else{
				$sql = $sql . ", $key=?";
			}
			$i++;
		}
		$sql = $sql . ';';
		$result = stmt_excute($sql, $data);
		return $result;
	}

	function update($table, $id, $data){
		global $con;
		$sql = "UPDATE $table SET";
		$i = 0;
		foreach ($data as $key => $value) {
			if($i === 0){
				$sql = $sql . " $key=?";
			}else{
				$sql = $sql . ", $key=?";
			}
			$i++;
		}
		$sql = $sql . ' WHERE id=?;';
		$data['id'] = $id;
		$result = stmt_excute($sql, $data);
		return $result;
	}

	function delete($table, $id){
		global $con;
		$sql = "DELETE FROM $table WHERE id=?;";
		$result = stmt_excute($sql, ['id'=> $id]);
		return $result;
	}

	$data = [
		'users_username' => 'Dolly',
		'users_admin' => 0,
		'users_email' => 'dolly@gmail.com',
		'users_password' => 123,
	];
