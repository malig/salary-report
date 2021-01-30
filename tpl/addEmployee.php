<html>
	<head>
		<meta charset='utf-8'>
	    <title>Добавить сотрудника</title>
	</head>
	<body>
	    <h1>Введите данные о сотруднике</h1>  
		<form method='post'>
			<p>
				<label>Должность</label>
				<input type='text'  name='post' />
			</p>
			<p>
				<label>Имя</label>
				<input type='text'  name='name' />
			</p>
			<p>
				<label>Телефон</label>
				<input type='text'  name='phone' />
			</p>
			<p>
				<label>Возраст</label>
				<input type='text'  name='age' />
			</p>
			<p>
				<label>Тип оплаты</label>
				<select  name='salary'>
					<option value='<?=SalaryTypes::TIMED?>'>Почасовая</option>					
					<option value='<?=SalaryTypes::FIXED?>'>Фиксированная</option>					
				</select>
			</p>
			<p>
				<input type='checkbox' name='isManager' value='1'>
			</p>
			<p>
				<label>Начальник</label>
				<select  name='managerName'>
					<?php foreach ( $managers as $manager ): ?>
						<option value='<?=$manager['name']?>'><?=$manager['name']?></option>										
					<?php endforeach; ?>					
				</select>
			</p>			
			<p>
				<input type='submit'  name='savePerson' value='Сохранить' />
			</p>
		</form>		    
	</body>
</html>