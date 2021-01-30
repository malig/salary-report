<?php
abstract class Person{	

    protected $options = [    	
    	'post'			=> '',
        'name'   		=> '',
        'phone'   		=> '',
        'age'   		=> '',
        'duration'   	=> 0,
        'salary'   		=> '',
        'level'   		=> 0,
        'employees' 	=> [],
        'isManager'		=> 0
    ];

    private $salaryRule = null;

	function __construct( array $options = array(), SalaryRule $salaryRule ){
				
		$this->salaryRule = $salaryRule;

        foreach ( $options as $key => $value ) {
            if( isset( $this->options[ $key ] ) ){
                $this->options[ $key ] = $value;
            }            
        }        
	}

	public function getName(){
		return $this->options[ 'name' ];
	}		

	public function getPhone(){
		return $this->options[ 'phone' ];
	}	

	public function getAge(){
		return $this->options[ 'age' ];
	}

	public function addEmployee( Person $person ){}

	public function removeEmployee( Person $person ){}		

	public function getDuration(){
		return $this->options[ 'duration' ];
	}

	public function setDuration( $duration ){
		$this->options[ 'duration' ] = $duration;
	}		

	public function getSalary(){
		return $this->salaryRule->getSalary( $this );
	}

	public function personAccess( PersonHandler $personHandler ){
		$method = 'handle' . get_class( $this );
		$personHandler->$method( $this );
	}

	protected function setLevel( $level ){
		$this->options[ 'level' ] = $level;
	}

	public function getLevel(){
		return $this->options[ 'level' ];
	}

	public function getOptions(){
		return $this->options;
	}

	public function getTotalOptions(){
		return $this->options;
	}		

	public function getByName( $name ){
		if( $this->options[ 'name' ] === $name ){
			return $this;
		}
		return null;
	}			
}