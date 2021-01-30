<?php
class PersonHandler{

	private $salaryReport = '';
	private $managers = [];
	private $persons = [];


	private function calculateSalary( Person $person ){
		$person->setDuration( 40 );
		$this->writeReport( $person );
	}

	private function writeReport( Person $person ){		
		$this->salaryReport .= str_repeat ( '-' , 3 * $person->getLevel() ) . $person->getName() . ': '. $person->getSalary() . '</br>';
	}	

	public function getSalaryReport(){
		return $this->salaryReport;
	}

	public function getManagers(){
		return $this->managers;
	}

	public function getPersons(){
		return $this->persons;
	}		

	private function calculateManagers( Person $person ){
		$this->managers[] = $person->getOptions();
	}	

	private function calculatePersons( Person $person ){
		$this->persons[] = $person->getOptions();
	}			

	public function handleManager( Manager $manager ){
		$this->calculateSalary( $manager );
		$this->calculateManagers( $manager );
		$this->calculatePersons( $manager );
	}

	public function handleEmployee( Employee $employee ){
		$this->calculateSalary( $employee );
		$this->calculatePersons( $employee );
	}	
}