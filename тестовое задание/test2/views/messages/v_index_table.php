<main>
	<h1>Таблица</h1>
	<hr>
	<a href="<?=BASE_URL?>">Просмотр в списке</a>
	<hr>
	<table class="table table-bordered">
		<tbody>
		<tr>
			<td>Имя</td>
			<td>Интервал</td>
			<td>Дней</td>
			<td>Почта</td>
			<td>Цена</td>
			<td>Скидка(рублей)</td>
			<td>Скидка(%)</td>
			<td>Итого</td>
		</tr>
		<? foreach($messages as $message): ?>
			<tr>
				<td><?=$message['name']?></td>
				<td><?=$message['dateStart']?></td>
				<td><?=floor((abs(strtotime(substr($message['dateStart'], 12, 22)) - strtotime(substr($message['dateStart'], 0, 10))))/86400)?></td>
				<td><?=$message['email']?></td>
				<td><?=$message['seasonPrice']?></td>
				<td><?=$message['sale']?></td>
				<td><?=$message['relativeSale']?></td>
				<td><?=((floor((abs(strtotime(substr($message['dateStart'], 12, 22)) - strtotime(substr($message['dateStart'], 0, 10))))/86400) * $message['seasonPrice']) * (1-$message['relativeSale']/100) - $message['sale'])?></td>
			</tr>
		<? endforeach; ?>
		</tbody>
	</table>
</main>