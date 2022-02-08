<h2>Добавление записи</h2>
<form class="calc" method="post">
    <label>Дата</label>
    <input name="date_input" autocomplete="off" type="text" data-range="true" data-multiple-dates-separator=" - "  class="datepicker-here showDate form-control"/>
    <br>
    <label>Имя</label>
    <input type="text" name="name" class="form-control name">
    <br>
    <label>Email</label>
    <input type="email" name="email" class="form-control email" >
    <br>
    <label>Сезонная цена</label>
    <select name="cost" class="form-control">
        <option selected data-price="850" value="850">Выберите цену</option>
        <option data-price="600">600</option>
        <option dta-price="700">700</option>
        <option data-price="800">800</option>
        <option data-price="900">900</option>
    </select>
    <br>
    <label>Абсолютная скидка за период <span id="range"></span></label>
    <input type="text" value="0" name="saleForRange" class="form-control sale">
    <br>
    <label>Относительная скидка за период <span id="relativerange"></span></label>
    <input type="text" value="0" name="relativesaleForRange" class="form-control relativesale">
    <br> 
    <button class="btn btn-success btn-block">Отправить</button>
    <div class="alert error-list">
    <? foreach($validateErrors as $error): ?>
        <p class="text-danger"><?=$error?></p>
    <? endforeach; ?>
    </div>	
</form>
	