<main>
	<h2>Все записи</h2>
	<hr>
	<? if($alertAdded): ?>
	<div class="alert alert-success">
		Your message was added!
	</div>
	<hr>
	<? endif; ?>
	<a href="<?=BASE_URL?>?view=table">Просмотр в таблице</a>
	<hr>
	<div>
	<? foreach($messages as $message): ?>
		<div>
			<p>Начало: <?=substr($message['dateStart'], 0, 10)?></p>
			<p>Конец: <?=substr($message['dateStart'], 12, 22)?></p>
			<p>Количество дней: <?=floor((abs(strtotime(substr($message['dateStart'], 12, 22)) - strtotime(substr($message['dateStart'], 0, 10))))/86400)?> </p>
			<p>Имя: <?=$message['name']?></p>
			<p>Почта: <?=$message['email']?></p>
			<p>Цена: <?=$message['seasonPrice']?></p>
			<p>Абсолютная скидка: <?=$message['sale']?> рублей</p>
			<p>Относительная скидка: <?=$message['relativeSale']?> %</p>
			<p>Стоимость проживания: <?=((floor((abs(strtotime(substr($message['dateStart'], 12, 22)) - strtotime(substr($message['dateStart'], 0, 10))))/86400) * $message['seasonPrice']) * (1-$message['relativeSale']/100) - $message['sale'])?> рублей</p>
			<hr>
		</div>
	<? endforeach; ?>
	</div>
</main>