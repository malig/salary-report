<html>
	<head>
		<meta charset='utf-8'>
	    <title>Учет сотрудников</title>
	</head>
	<body>
	    
		<form method='post'>
			<p><input type='submit'  name='addEmployee' value='Добавить сотрудника' /></p>
		</form>

		<form method='post'>
			<p><input type='submit'  name='getSalaryReport' value='Отчет по ЗП' /></p>
		</form>	

		<?php foreach ( $persons as $person ): ?>
			<?=str_repeat ('-',3*$person['level']);?>
			<?=$person['post'] ?>
			<?=$person['name'] ?>
			<?=$person['isManager'] ? ' (Менеджер)' : ' (Сотрудник)'?>
			</br>										
		<?php endforeach; ?>			 

	</body>
</html>