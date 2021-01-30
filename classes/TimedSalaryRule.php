<?php
class TimedSalaryRule extends SalaryRule {

	function getSalary( Person $person ){
		return ( $person->getDuration() * 5 );
	}
}