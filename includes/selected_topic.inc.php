<?php
	include 'curd.inc.php';

	if(isset($_GET['topic'])){
		$topic = str_replace('_',' ',$_GET['topic']);
	}
