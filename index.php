<?php

require_once(__DIR__."/system/classes/complex.class.php");

$complex = new complex;

// Generate complex numbers
if (isset($_POST['count'])) {
	$i = 0;
	while ($i < @$_POST['count']) {
		$a[$i] = array('a' => random_int(-10, 10),'b' => random_int(-10, 10));
		$i++;
	}
}

// Doing calculations
if (is_array($a) && isset($_POST['act'])) {
	switch(@$_POST['act']) {
		case 'add':
			$result = $complex->add($a);
		break;
		case 'subtract':
			$result = $complex->subtract($a);
		break;
		case 'multiply':
			$result = $complex->multiply($a);
		break;
		case 'divide':
			$result = $complex->divide($a);
		break;
		default:
		break;
	}
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
<meta http-equiv="content-language" content="ru" /> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
<title>Комплексные числа</title>
<script type="text/javascript" src="/js/jquery-1.12.0.min.js"></script>
</head>


<script type="text/javascript">

$(function() {

	$("#cxcount").on('keyup',function(e){
		var num = parseInt($('#cxcount').val().replace(/\D+/g,""));
		num = isNaN(num) ? 2 : num;
		document.getElementById('cxcount').value=(num > 9) ? (String(num).slice(1) > 1) ? String(num).slice(1) : 2 : (num < 2) ? 2 : num;
	});

});

</script>


<body>

<h2>Описание</h2>

Фукнционал рассчитан на вычисление комплексных чисел от 2-ух и более членов выражения.
<br>
Но для наглядности тестирования ограничил ввод данных количества комплексных чисел до 9-ти.
<br><br>
Система автоматически генерирует значения действительной и мнимой части комплексного числа из целых чисел от -10 до 10. 
<br><br>
Значения в результате округляются до сотых. 
<br>

<h2>Управление</h2>

<form method="POST">
<table class="table table-condensed table-hover">
	
	<thead>
		<tr>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>Кол-во комплексных чисел:</td>
			<td width="10"></td>
			<td><input type="text" id="cxcount" name="count" value="<?=(isset($_POST["count"]) ? $_POST["count"] : '2')?>" size="12"></td>
			<td width="30"></td>
			<td><input type="submit" size="8" value="Выполнить"></td>
		</tr>
		<tr>
			<td>Вид операции:</td>
			<td width="10"></td>
			<td>
				<select id="act" name="act">
					<option value="add" <?=((@$_POST["act"]=='add')?' selected ':'')?>)>&nbsp;Сложение</option>
					<option value="subtract" <?=((@$_POST["act"]=='subtract')?' selected ':'')?>>&nbsp;Вычитание</option>
					<option value="multiply" <?=((@$_POST["act"]=='multiply')?' selected ':'')?>>&nbsp;Умножение</option>
					<option value="divide" <?=((@$_POST["act"]=='divide')?' selected ':'')?>>&nbsp;Деление</option>
				</select>
			</td>
			<td width="30"></td>
			<td></td>
		</tr>
	</tbody>

</table>
</form>


<?php if (isset($result)) { ?>

<h2>Входные параметры</h2>

<?php
	foreach($a as $key => $value) {
		echo 'a'.($key+1).' = '.round($value['a'],2).(($value['b'] >= 0) ? ' + '.round($value['b'],2) : ' - '.round(-1*$value['b'],2)).'i; ';
	}
?>

<h2>Результат</h2>

z = <?=round($result['a'],2).(($result['b'] >= 0) ? ' + '.round($result['b'],2).'i' : ' - '.round(-1*$result['b'],2).'i')?>

<?php } ?>

</body>
</html>

