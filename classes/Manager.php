<?php
class Manager extends Person{

	private $employees = [];

	function addEmployee( Person $employee ){
		if( in_array( $employee, $this->employees, true ) ){
			return;
		}
		$employee->setLevel( $this->options['level'] + 1 );
		$this->employees[] = $employee;
	}

	function removeEmployee( Person $employee ){
		$employees = [];
		foreach ( $this->employees as $thisEmployee ) {
			if( $employee !== $thisEmployee ){
				$employees[] = $thisEmployee;
			}
		}
		$this->employees = $employees;
	}

	function personAccess( PersonHandler $personHandler ){		
		parent::personAccess( $personHandler );		
		foreach ( $this->employees as $employee ) {
			$employee->personAccess( $personHandler );
		}
	}

	public function getTotalOptions(){
		foreach ( $this->employees as $employee ) {
			$totalOptions = $employee->getTotalOptions();
			if( in_array( $totalOptions, $this->options[ 'employees' ], true ) ){
				continue;
			}			
			$this->options[ 'employees' ][] = $totalOptions;
		}
		return $this->options;
	}

	public function getByName( $name ){
		if( $person = parent::getByName( $name ) ){
			return $person;
		}
		foreach ( $this->employees as $employee ) {
			if( $person = $employee->getByName( $name ) ){
				return $person;
			}
		}		
		return null;
	}						
}