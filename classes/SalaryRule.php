<?php
abstract class SalaryRule {
	abstract function getSalary( Person $person );
}