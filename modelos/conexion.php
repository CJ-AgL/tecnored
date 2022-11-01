<?php

// class Conexion{

// 	static public function conectar(){

// 		$link = new PDO("mysql:host=single-4710.banahosting.com;dbname=aenuhxby_tecnored_db",
// 			            "aenuhxby_tr_user",
// 			            "Tecnored*2022");

// 		$link->exec("set names utf8");

// 		return $link;

// 	}

// }


class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=tecnored",
			            "root",
			            "");

		$link->exec("set names utf8");

		return $link;

	}

}