<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Вавилонская лотерея</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <link rel="stylesheet" href="css/app.css">

        <link rel="stylesheet" href="css/product.css">

    </head>

    <body>

        {{-- Block 1 --}}
        <div class="position-relative overflow-hidden p-3 px-md-5 pb-md-5 text-center main-block">

            <div class="header">
                <div class="navbar navbar-dark bg-transparent shadow-sm">
                    <div class="container d-flex justify-content-between">

                        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="row">
                            <div class="col">
                                <a href="https://vk.com/lotovavilon" target="_blank" class="navbar-brand d-flex align-items-center">
                                    <strong><i class="fab fa-vk fa-2x"></i></strong>
                                </a>
                            </div>
                            <div class="col">

                            </div>
                            <div class="col my-auto">
                                <span style="font-size: 1.5rem">
                                    18+
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="cover text-center">
                <h1 class="gotic-fonts">Вавилонская лотерея</h1>
                <h2>Выиграй ценный приз или действие</h2>
                <div class="roller mx-auto">
                    <div class="js-bounty text-center">
                        <span class="default-number">
                            0000000
                        </span>
                    </div>
                </div>

                <h3 class="cover-heading text-center gotic-fonts">Правила лотереи</h3>
                <div class="container text-left">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <ul>
                                <li>Розыгрыш проводится каждую неделю</li>
                                <li>Получить номер можно только на условиях Компании</li>
                                <li>Номер - вечный</li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-6">
                            <ul>
                                <li>Номер - бесплатный</li>
                                <li>Результаты выигрыша отправляются СМС сообщением и публикуются на сайте</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Block TIMER --}}
        <div class="d-md-flex flex-column w-100 pl-md-3 text-center block block-2">
            <div class="col-md-8 p-lg-5 py-3 mx-auto">
                <h2 class="gotic-fonts">Время до следующего розыгрыша</h2>
                <div class="row" id="timer"></div>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="mt-5">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-dark btn-lg" data-toggle="modal" data-target="#modal">
                        Получить вечный номер
                    </button>
                </div>

            </div>
        </div>

        @if(isset($news) && $news !== null && count($news) > 0)
            {{-- Block NEWS --}}
            <div class="d-md-flex flex-column w-100 pl-md-3 text-center block block-news">
                <div class="col-md-8 p-lg-3 py-lg-5 py-3 mx-auto">
                    <h2 class="gotic-fonts text-light">Новости компании</h2>

                    <div class="card-deck pb-lg-5">
                        @foreach($news as $oneNews)

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{$oneNews->name}}</h5>
                                    <p class="card-text">{{$oneNews->description}}</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">{{$oneNews->created_at}}</small>
                                </div>
                            </div>

                        <!--div class="col">
                            <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                                <div class="card-body d-flex flex-column align-items-start">
                                    <h3 class="mb-0">{{$oneNews->name}}</h3>
                                    <div class="mb-1 text-muted">{{$oneNews->created_at}}</div>
                                    <p class="card-text mb-auto">{{$oneNews->description}}</p>
                                </div>
                            </div>
                        </div-->
                        @endforeach
                    </div>

                </div>
            </div>
        @endif

        {{-- Block 5 --}}
        <div class="d-md-flex flex-column w-100 pl-md-3 text-center gotic-fonts block block-5">
            <div class="col-md-8 p-lg-5 py-3 mx-auto">
                <p>
                    Если выиграно действие!
                </p>
                <ul class="list-unstyled" style="line-height: 2rem">
                    <li>Выигранное действие знаете только Вы;</li>
                    <li>Действие может иметь понятную цель, быть звеном в общей цепи событий, а может быть абсолютно бессмысленным;</li>
                    <li>Для Компании нет никаких моральных принципов при присуждении действия.</li>
                </ul>
                <p>
                    Действуй!
                </p>
            </div>
        </div>

        {{-- Block 3 --}}
        <div class="d-md-flex flex-column w-100 pl-md-3 block block-3">
            <div class="col-md-6 mx-auto my-md-5 px-5 py-3 rounded bg-transparent-light">
                <p class="lead font-weight-normal ">
                    Он (народ) добился, чтобы лотерея была тайной, бесплатной и всеобщей. Продажа жребиев за деньги была упразднена. Всякий свободный человек, пройдя посвящение в таинства Бела, автоматически становился участником священных жеребьевок, которые совершались в лабиринтах этого бога каждые шестьдесят ночей и определяли судьбу человека до следующей жеребьевки. Последствия были непредсказуемы. Счастливый розыгрыш мог возвысить его до Совета магов, или дать ему власть посадить в темницу своего врага (явного или тайного), или даровать свидание в уютной полутьме опочивальни с женщиной, которая начала его тревожить или которую он уже не надеялся увидеть снова; неудачная жеребьевка могла принести увечье, всевозможные виды позора, смерть.
                </p>
            </div>
            <div class="py-3 text-center">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#modal">
                    Получить вечный номер
                </button>
            </div>
        </div>

        {{-- Block CONTACT --}}
        <div class="d-md-flex flex-column w-100 pl-md-3 text-center block block-contact">
            <div class="col-md-8 p-lg-5 py-3 mx-auto">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="my-5">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-dark btn-lg" data-toggle="modal" data-target="#contact">
                        Обращение в компанию
                    </button>
                    <div class="p-2">
                        <p>
                            Идеи, доносы, другие сообщения
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Block 4 --}}
        <div class="d-md-flex flex-column w-100 pl-md-3 py-lg-5 block block-4">
            <div class="col-md-6 mx-auto my-md-5 px-5 py-3 rounded bg-transparent-dark">
                <p class="lead font-weight-normal ">
                    Весь Вавилон - не что иное, как бесконечная игра случайностей"
                    Хорхе Луис Борхес "Лотерея в Вавилоне"
                </p>
            </div>
            <div class="col-md-6 mx-auto my-md-5 px-5 py-3 rounded bg-transparent-dark">
                <p class="lead font-weight-normal ">
                    Жизнь человека в Вавилоне подчинена Случаю, который входит в нее через лотерею. И уже не отличишь естественную случайность от результата лотерейных жеребьевок…
                </p>
            </div>
            <div class="py-3 text-center">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#modal">
                    Получить вечный номер
                </button>
            </div>
        </div>

        {{-- Block 6 --}}
        <div class="d-md-flex flex-column w-100 pl-md-3 text-center block block-contact">
            <div class="col-md-8 my-lg-5 p-lg-5 py-3 mx-auto">
                <h2 class="gotic-fonts">
                    Компания думает о вас!
                </h2>
            </div>
        </div>

        {{-- Block Sending --}}
        <div class="d-md-flex flex-column w-100 pl-md-3 pt-5 text-center block block-sending">

            <h2 class="gotic-fonts">Сотрудничество с Компанией</h2>

            <div class="col-md-6 mx-auto my-md-5 px-5 py-3 rounded bg-transparent-dark">
                <p class="lead font-weight-normal ">
                    Каждый человек, если он этого хочет, может принять участие в жизни «Вавилонской лотереи».
                </p>
                <p class="lead font-weight-normal ">
                    Как это сделать?
                </p>
                <p class="lead font-weight-normal ">
                    Существует много возможностей способствовать развитию «Вавилонской лотереи».

                    Компания нуждается в людях, знаниях, экспертах, финансовых источниках, нуждается в контактах с отдельными лицами и организациями, способными помочь.

                    Если вы хотите больше узнать о том, как присоединиться, пожалуйста, свяжитесь с нашим представителем.
                </p>
            </div>

            <div class="col-md-8 p-lg-5 py-3 mx-auto">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="my-5">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-dark btn-lg" data-toggle="modal" data-target="#contact">
                        Обращение в компанию
                    </button>
                </div>
            </div>
        </div>

        <footer class="container-fluid py-5 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md">

                        <h2 class="gotic-fonts">
                            ВАВИЛОНСКАЯ ЛОТЕРЕЯ
                        </h2>
                        <p class="gotic-fonts" style="font-size: 1.5rem">
                            По мотивам рассказа Луи Хорхе Борхеса "Лотерея в Вавилоне".
                        </p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Modal -->
        <div class="modal" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Заявка на получение уникального кода</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form method="post" action="{{route('customers.store')}}" class="needs-validation" novalidate>
                        {{ csrf_field() }}
                        <div class="modal-body text-left">
                            <div class="form-group">
                                <label for="name">Ваше Имя</label>
                                <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Укажите вашу имя" required>
                                <div class="valid-feedback">
                                    Корректные данные
                                </div>
                                <div class="invalid-feedback">
                                    Укажите ваше имя
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone">Ваш телефон</label> <small>(10 цифр, без 8 или +7)</small>
                                <input type="tel" class="form-control form-control-lg" id="phone" name="phone" placeholder="пример: 9205743885" required>
                                <div class="valid-feedback">
                                    Корректные данные
                                </div>
                                <div class="invalid-feedback">
                                    Укажите ваш телефон
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Ваш email</label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Укажите ваш email" required>
                                <div class="valid-feedback">
                                    Корректные данные
                                </div>
                                <div class="invalid-feedback">
                                    Укажите ваш email
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city">Ваш город</label>
                                <input type="text" class="form-control form-control-lg" id="city" name="city" placeholder="Укажите ваш город" required>
                                <div class="valid-feedback">
                                    Корректные данные
                                </div>
                                <div class="invalid-feedback">
                                    Укажите ваш город
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer text-center">
                            <button type="submit" class="btn btn-danger btn-block btn-lg">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal" id="contact" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Отправить запрос в нашу компанию</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form method="post" class="needs-validation" novalidate>
                        {{ csrf_field() }}
                        <div class="modal-body text-left">
                            <div class="form-group">
                                <label for="name">Ваше Имя</label>
                                <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Укажите вашу имя" required>
                                <div class="valid-feedback">
                                    Корректные данные
                                </div>
                                <div class="invalid-feedback">
                                    Укажите ваше имя
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Ваш email</label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Укажите ваш email" required>
                                <div class="valid-feedback">
                                    Корректные данные
                                </div>
                                <div class="invalid-feedback">
                                    Укажите ваш email
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Ваше сообщение</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                <div class="invalid-feedback">
                                    Напишите что-нибудь)
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer text-center">
                            <button type="submit" class="btn btn-danger btn-block btn-lg">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Scripts -->
        <script src="js/app.js" charset="utf-8"></script>
        <script>
            /*
            bounty.default({
                el: '.js-bounty',
                value: Math.floor(Math.random()*10000000),
                lineHeight: 1,
                letterSpacing: 16,
                animationDelay: 100,
                letterAnimationDelay: 500
            });
            */
            /////////////////////////////
            let timestamp = 1559498400000;
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
            });
            /////////////////////////////
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

            (function() {
                'use strict';
                window.addEventListener('resize', function(e) {
                    e = e || event;

                    let target = e.target || e.srcElement;

                    let width = target.innerWidth;

                    let rollerWrap = document.getElementsByClassName('roller');
                    let bountyWrap = document.getElementsByClassName('js-bounty');
                    let svg = bountyWrap[0].getElementsByTagName('svg');

                    if(width < 576){
                        startOdometer(16);
                    }else if(width >= 992){
                        startOdometer(33);
                    }else if(width >= 768){
                        startOdometer(24);
                    }else if(width >= 576){
                        startOdometer(20);
                    }


                }, false);
            })();

            function startOdometer(letterSpacing){
                bounty.default({
                    el: '.js-bounty',
                    value: 1234567,
                    lineHeight: 1,
                    letterSpacing: letterSpacing,
                    animationDelay: 0,
                    letterAnimationDelay: 0
                });
            }

        </script>

    </body>
</html>
