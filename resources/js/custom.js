import Ajax from './ajax';

$('#customerMailModal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget); // Button that triggered the modal
    let name = button.data('customername'); // Extract info from data-* attributes
    let email = button.data('customeremail'); // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    let modal = $(this);
    modal.find('.modal-body #customerMailName').val(name);
    modal.find('.modal-body #customerMailEmail').val(email);
});

/* Admin Event Calendar */
$(document).ready(function()
{
    let oDTP2;
    $("#dtBox").DateTimePicker({
        'shortDayNames' : ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
        'fullDayNames'	: ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"],
        'shortMonthNames' :	["Янв", "Фев", "Март", "Апр", "Май", "Июнь", "Июль", "Авг", "Сен", "Окт", "Ноя", "Дек"],
        'fullMonthNames' :	["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],
        'titleContentDateTime' : 'Установить дату следующего розыгрыша',
        'setButtonContent' : 'Установить',
        'clearButtonContent' : 'Очистить',
        init: function()
        {
            oDTP2 = this;
        },
        afterHide : function()
        {
            let fullDateString = oDTP2.getDateObjectForInputField($("#datetimepicker"));
            let date = new Date(fullDateString);
            let timestamp = date.getTime()/1000 + 10800;//+3 часа
            $("#datetimeform").val(timestamp);
        }
    });
});
/* END Admin Event Calendar */

 /* Jquery Countdown */

    let timestamp = $('#timer').data('timestamp')*1000-10800000;//отнимаем 3 часа
    let timerStr = '';
    let htmlParentElementName = 'div';
    let classParentStr = 'col-3 p-0';
    let htmlChildElementName = 'span';
    let classChildStr = 'badge badge-light';

    timerStr += '<' + htmlParentElementName + ' class="' + classParentStr + '"><' + htmlChildElementName + ' class="' + classChildStr + '">%D</' + htmlChildElementName + '><span class="timer_notation">Дни</span></' + htmlParentElementName + '>';
    timerStr += '<' + htmlParentElementName + ' class="' + classParentStr + '"><' + htmlChildElementName + ' class="' + classChildStr + '">%H</' + htmlChildElementName + '><span class="timer_notation">Часы</span></' + htmlParentElementName + '>';
    timerStr += '<' + htmlParentElementName + ' class="' + classParentStr + '"><' + htmlChildElementName + ' class="' + classChildStr + '">%M</' + htmlChildElementName + '><span class="timer_notation">Минуты</span></' + htmlParentElementName + '>';
    timerStr += '<' + htmlParentElementName + ' class="' + classParentStr + '"><' + htmlChildElementName + ' class="' + classChildStr + '">%S</' + htmlChildElementName + '><span class="timer_notation">Секунды</span></' + htmlParentElementName + '>';

    $('#timer').countdown(timestamp, function(event) {
        $(this).html(event.strftime(timerStr));
    })
        .on('finish.countdown', function(){
            startEventLottery();
        });

/* END Jquery Countdown */

/* Bootstrap */
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

/* Bootstrap */

/* Odometr */

function startOdometer(lotteryKeys){

    let width = window.innerWidth;

    let bountyWrap = document.getElementsByClassName('js-bounty');
    /**
     * Получаем последний номер на счетчике. Чтобы новое вращение начиналось с этого числа, а не с числа вида 0000000.
     * Мы сохраняем его в массив с индексом "-1", чтобы в цикле в первой итерации обратиться к нему через выражение
     * вида lotteryKeys[i -1], при этом элемент с таким индексом не влияет на длину массива
     */
    lotteryKeys[-1] = bountyWrap[0].dataset.lotterykey;

    let letterSpacing = 16;

    if(width < 576){
        letterSpacing = 16;
    }else if(width >= 992){
        letterSpacing = 33;
    }else if(width >= 768){
        letterSpacing = 24;
    }else if(width >= 576){
        letterSpacing = 20;
    }


    for (let i = 0; i < lotteryKeys.length; i++) {
        setTimeout(function () {
            bounty.default({
                el: '.js-bounty',
                initialValue: lotteryKeys[i-1],
                value: lotteryKeys[i],
                lineHeight: 1,
                letterSpacing: letterSpacing,
                animationDelay: 0,
                letterAnimationDelay: 0
            })
        }, 7000 * i);

    }
}

/* END Odometr */


function startEventLottery()
{
    let ajaxReq = new Ajax("GET", '', '', 'lottery');

    ajaxReq.req.onloadstart = function(){
        //
    };

    ajaxReq.req.ontimeout = function() {
        //
    };

    ajaxReq.req.onreadystatechange = function() {

        if (ajaxReq.req.readyState !== 4) return;

        let lotteryKeys = JSON.parse(ajaxReq.req.responseText);

        startOdometer(lotteryKeys);

    };

    ajaxReq.sendRequest();
}