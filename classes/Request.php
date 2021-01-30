<?php
class Request{
	private $params = [];

	public function __construct(){
		$this->params = $_REQUEST;
	}

	public function addParam( $key, $val ){
		$this->params[ $key ] = $val;
	}

	public function getParam( $key ){
		if( isset( $this->params[$key ] ) ){
			return $this->params[$key ];
		}
		return null;
	}	
}