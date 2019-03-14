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
                                <a href="#" class="navbar-brand d-flex align-items-center">
                                    <strong><i class="fab fa-vk fa-2x"></i></strong>
                                </a>
                            </div>
                            <div class="col">
                                <a href="#" class="navbar-brand d-flex align-items-center">
                                    <strong><i class="fab fa-facebook-f fa-2x"></i></strong>
                                </a>
                            </div>
                            <div class="col">
                                <a href="#" class="navbar-brand d-flex align-items-center">
                                    <strong><i class="fab fa-instagram fa-2x"></i></strong>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="cover text-center">
                <h1>Вавилонская лотерея</h1>
                <p>Выиграй ценный приз или действие</p>
                <p class="lead">Все закономерности случайны, а случайности закономерны!</p>
                <div class="roller mx-auto">
                    <div
                            class="js-bounty text-center">
                        <span class="default-number">
                            0000000
                        </span>
                    </div>
                </div>

                <h1 class="cover-heading text-center">Правила лотереи</h1>
                <div class="container text-left">
                    <div class="row">
                        <div class="col-6">
                            <ul>
                                <li>Розыгрыш проводится каждый день</li>
                                <li>Получить номер можно только на условиях Компании</li>
                                <li>Номер - вечный</li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul>
                                <li>Один человек может иметь множество номеров</li>
                                <li>Результаты выигрыша отправляются СМС сообщением и публикуются на сайте</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Block 2 --}}
        <div class="d-md-flex flex-column w-100 pl-md-3 text-center block block-2">
            <div class="col-md-8 p-lg-5 py-3 mx-auto">
                <h1>Время до следующего розыгрыша</h1>
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

        {{-- Block 4 --}}
        <div class="d-md-flex flex-column w-100 pl-md-3 block block-4">
            <div class="col-md-6 mx-auto my-md-5 px-5 py-3 rounded bg-transparent-dark">
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

        <footer class="container-fluid py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mb-2" focusable="false" role="img"><title>Product</title><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
                        <small class="d-block mb-3 text-muted">© 2017-2018</small>
                    </div>
                    <div class="col-6 col-md">
                        <h5>Features</h5>
                        <ul class="list-unstyled text-small">
                            <li><a class="" href="#">Cool stuff</a></li>
                            <li><a class="" href="#">Random feature</a></li>
                            <li><a class="" href="#">Team feature</a></li>
                            <li><a class="" href="#">Stuff for developers</a></li>
                            <li><a class="" href="#">Another one</a></li>
                            <li><a class="" href="#">Last time</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md">
                        <h5>Resources</h5>
                        <ul class="list-unstyled text-small">
                            <li><a class="" href="#">Resource</a></li>
                            <li><a class="" href="#">Resource name</a></li>
                            <li><a class="" href="#">Another resource</a></li>
                            <li><a class="" href="#">Final resource</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md">
                        <h5>Resources</h5>
                        <ul class="list-unstyled text-small">
                            <li><a class="" href="#">Business</a></li>
                            <li><a class="" href="#">Education</a></li>
                            <li><a class="" href="#">Government</a></li>
                            <li><a class="" href="#">Gaming</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md">
                        <h5>About</h5>
                        <ul class="list-unstyled text-small">
                            <li><a class="" href="#">Team</a></li>
                            <li><a class="" href="#">Locations</a></li>
                            <li><a class="" href="#">Privacy</a></li>
                            <li><a class="" href="#">Terms</a></li>
                        </ul>
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
            let classStr = 'badge badge-light';
            let htmlParentElementName = 'div';
            timerStr += '<' + htmlParentElementName + ' class="col-3 p-0"><span class="' + classStr + '">%D</span></' + htmlParentElementName + '>';
            timerStr += '<' + htmlParentElementName + ' class="col-3 p-0"><span class="' + classStr + '">%H</span></' + htmlParentElementName + '>';
            timerStr += '<' + htmlParentElementName + ' class="col-3 p-0"><span class="' + classStr + '">%M</span></' + htmlParentElementName + '>';
            timerStr += '<' + htmlParentElementName + ' class="col-3 p-0"><span class="' + classStr + '">%S</span></' + htmlParentElementName + '>';

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
