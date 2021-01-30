<?php
class JsonHelper{

	static $path = './data/data.json';

	static function get(){
		$json = file_get_contents( JSON_DIR );
		$array = json_decode( $json, true );		
		unset( $json );
		return $array;
	}

	static function put( $toJson ){
		file_put_contents( JSON_DIR, json_encode( $toJson ) );	          
		unset( $toJson );
	}	
	
	static function save( $toJson ){
		self::put( $toJson );
	}
}