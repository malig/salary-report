<?php
class FixedSalaryRule extends SalaryRule {
	function getSalary( Person $person ){
		return 30;
	}
}