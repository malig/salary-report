<?php
class Company{

	private $directorOptions = null;

	function __construct(){	
		if( $personsJson = JsonHelper::get() ){

			$this->createDirector( 
				$personsJson[ 'post' ], 
				$personsJson[ 'name' ], 
				$personsJson[ 'phone' ], 
				$personsJson[ 'age' ],
				$personsJson[ 'name' ], 
				$personsJson[ 'salary' ], 
				$personsJson[ 'isManager' ] );

			$this->buildObjectPersons( $personsJson['employees'], $this->director->getName() );
		} else {
			$this->createDirector( 
				'Генеральный директор', 
				'Андриенко', 
				'89609788660', 
				'34',
				'Андриенко',
				'TimedSalaryRule',
				1 );			
		}							
	}

	public function buildObjectPersons( $employees, $masterName ){
		for ( $i=0; $i < count( $employees ); $i++ ) { 
			$this->addPerson( 
				$employees[ $i ][ 'post' ], 
				$employees[ $i ][ 'name' ], 
				$employees[ $i ][ 'phone' ], 
				$employees[ $i ][ 'age' ], 
				$masterName, 
				$employees[ $i ][ 'salary' ], 
				$employees[ $i ][ 'isManager' ] );

			$this->buildObjectPersons( $employees[ $i ]['employees'], $employees[ $i ][ 'name' ] );
		}	
	}	

	public function createDirector( $post, $name, $phone, $age, $managerName, $salary, $isManager ){
		$this->director = new Manager( [
		    	'post'	=> $post,
		        'name'  => $name,
		        'phone' => $phone,
		        'age'  	=> $age,
		        'salary'=> $salary,
		        'isManager' => $isManager		        
			], new $salary());
	}	

	public function getManagerByName( $managerName ){
		return $this->director->getByName( $managerName );
	}	

	public function getManagers(){
		$personHandler = new PersonHandler();
		$this->director->personAccess(  $personHandler );
		return $personHandler->getManagers();
	}

	public function getPersons(){
		$personHandler = new PersonHandler();
		$this->director->personAccess(  $personHandler );
		return $personHandler->getPersons();
	}

	public function getSalaryReport(){
		$personHandler = new PersonHandler();
		$this->director->personAccess(  $personHandler );
		return $personHandler->getSalaryReport();
	}			

	public function addPerson( $post, $name, $phone, $age, $managerName, $salary, $isManager ){
		if( $isManager ){
			$this->addManager( $post, $name, $phone, $age, $managerName, $salary, $isManager );
		} else {
			$this->addEmploee( $post, $name, $phone, $age, $managerName, $salary, $isManager );
		}
	}	

	public function addManager( $post, $name, $phone, $age, $managerName, $salary, $isManager ){

		$manager = new Manager( [
			    	'post'	=> $post,
			        'name'  => $name,
			        'phone' => $phone,
			        'age'  	=> $age,
			        'salary'=> $salary,
			        'isManager' => $isManager			
				], new $salary() );

		$master = $this->getManagerByName( $managerName );			
		$master->addEmployee( $manager );
	}

	public function addEmploee( $post, $name, $phone, $age, $managerName, $salary, $isManager ){

		$employee = new Employee( [
			    	'post'	=> $post,
			        'name'  => $name,
			        'phone' => $phone,
			        'age'  	=> $age,
			        'salary'=> $salary,
			        'isManager' => $isManager				
				], new $salary() );

		$master = $this->getManagerByName( $managerName );		
		$master->addEmployee( $employee );
	}

	public function save(){
		JsonHelper::save( $this->director->getTotalOptions() );
	}			
}