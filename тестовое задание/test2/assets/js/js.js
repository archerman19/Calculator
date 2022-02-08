//опции календаря
$('.datepicker-here').datepicker({
    clearButton: true
});
//Валидация

$('.calc').validate({
    rules: {
        date_input: {
            required: true,
        },
        name: {
            required: true,
            minlength: 2
        },
        email: {
            required: true,
            email: true
        },
        saleForRange:{
            digits: true
       },
        relativesaleForRange:{
            digits: true
        }
    },
    messages: {
        date_input: {
            required: 'Выберите дату из календаря'
        },
        name: {
            required: 'Заполните поле',
            minlength: 'Минимум 2 символа'
        },
        email: {
            required: 'Заполните поле',
            email: 'Некорректный адрес почты'
        },
        saleForRange: {
            digits: 'Только цифры'
        },
        relativesaleForRange: {
            digits: 'Только цифры'
        }
    }
});

var myDatepicker = $('.datepicker-here').datepicker().data('datepicker');
$('.sale').focus(function() { 
    if($(".showDate").val().length){ 
        range = (myDatepicker.selectedDates[1] - myDatepicker.selectedDates[0])/(1000 * 3600 * 24);
        dateRange = range ? range : 0;
        document.getElementById("range").innerHTML = dateRange;
    }
});

$('.relativesale').focus(function() { 
    if($(".showDate").val().length){ 
        range = (myDatepicker.selectedDates[1] - myDatepicker.selectedDates[0])/(1000 * 3600 * 24);
        dateRange = range ? range : 0;
        document.getElementById("relativerange").innerHTML = dateRange;
    }
});