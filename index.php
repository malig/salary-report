<?php
include( 'helper.php' );

$request = new Request();
$company = new Company();

if( $request->getParam( 'addEmployee' ) ){

	$managers = $company->getManagers();
	
	include( TPL_DIR . 'addEmployee.php' );
	exit();

} elseif ( $request->getParam( 'getSalaryReport' ) ) {

	$report = $company->getSalaryReport();
	include( TPL_DIR . 'getSalaryReport.php' );
	exit();

} elseif ( $request->getParam( 'savePerson' ) ) {

	$company->addPerson(
		$request->getParam( 'post' ),
		$request->getParam( 'name' ),
		$request->getParam( 'phone' ),
		$request->getParam( 'age' ),
		$request->getParam( 'managerName' ),
		$request->getParam( 'salary' ),
		$request->getParam( 'isManager' ) ? 1 : 0
	);
	$company->save();
}

$persons = $company->getPersons();

	// echo '<pre>';
	// print_r($persons);
	// echo '</pre>';

include( TPL_DIR . 'home.php' );

?>