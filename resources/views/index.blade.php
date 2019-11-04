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
                <h2>Городской квест</h2>
                <h1 class="gotic-fonts mb-4">План Борхеса</h1>
                <h2>Выиграй ценный приз или действие</h2>
                <div class="roller mx-auto">
                    <div class="js-bounty text-center" data-lotterykey="{{isset($lottery->keys[0]->key) ? $lottery->keys[0]->key : '0000000' }}">
                        <span class="default-number">
                           {{isset($lottery->keys[0]->key) ? $lottery->keys[0]->key : '0000000' }}
                        </span>
                    </div>
                </div>

                <h3 class="cover-heading text-center gotic-fonts">Правила участия</h3>
                <div class="container text-left">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <ul>
                                <li>Чтобы начать игру получи Вечный Номер</li>
                                <li>Не беспокойся о деньгах - номер бесплатный, но на условиях компании</li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-6">
                            <ul>
                                <li>Пока есть мы, твой номер всегда будет участником розыгрыша</li>
                                <li>Каждую неделю жди розыгрыша и надейся на случай</li>
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
                <div class="row" id="timer" data-timestamp="{{$event->timestamp}}"></div>

                <div class="mt-5">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-dark btn-lg" data-toggle="modal" data-target="#modal">
                        Получить вечный номер
                    </button>
                </div>

            </div>
        </div>

        {{-- Block NEWS --}}
        <div class="d-md-flex flex-column w-100 pl-md-3 text-center block block-news">
                <div class="col-md-8 p-lg-3 py-lg-5 py-3 mx-auto">
                    @if(isset($news) && $news !== null && count($news) > 0)
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

                            @endforeach


                            @if($lottery !== null)
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Последние победители</h5>
                                            @for($i = 0; $i < count($lottery->keys) && $i < $lottery->shortListKeysQuantity; $i++)
                                                <p class="card-text">{{$lottery->keys[$i]->key}}</p>
                                            @endfor
                                            @isset($lottery->declisionKeysPhrase)
                                                <a data-toggle="modal" data-target="#lastLottery" href="#" >{{$lottery->declisionKeysPhrase}}</a>
                                            @endisset
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">{{$lottery->created_at}}</small>
                                        </div>
                                    </div>
                                @endif

                        </div>
                    @endif
                </div>
            </div>

        {{-- Block 4 --}}
        <div class="d-md-flex flex-column w-100 pl-md-3 text-center gotic-fonts block block-5">
            <div class="col-md-8 p-lg-5 py-3 mx-auto">
                <p>
                    Если выигран ценный приз - все просто. Выиграл - получил.
                </p>
                <p>
                    Если Вы выиграли действие, это значит,что в ближайшее время Вам выпадет шанс поучавствовать в гео-квесте, командном задании или абсолютной бессмыслице!
                </p>
                <p>
                    Выбор за Борхесом!
                </p>
            </div>
        </div>

        {{-- Block 5 --}}
        <div class="d-md-flex flex-column w-100 pl-md-3 py-5 block block-3">
            <div class="col-md-6 mx-auto my-md-5 px-5 py-5 rounded bg-transparent-light">
                <p class="lead font-weight-bold text-center">
                    "Сегодня я хочу чего-то нового в своей жизни!"
                </p>
                <p class="lead font-weight-normal">
                    Если такой фразой Вы начинаете свой день, то проект, созданный нами точно придется Вам по вкусу. Городской квест "Борхес" - то, что нужно именно сейчас! Игра, которая погрузит каждого в мир случая и неизвестности. Вечный Номер из семи цифр достанется бесплатно и будет первым шагом на пути к незабываемым приключениям. Каждый из номеров имеет возможность выиграть уникальный приз: деньги, ценный подарок, или действие...
                </p>
            </div>
        </div>

        {{-- Block CONTACT --}}
        <div class="d-md-flex flex-column w-100 pl-md-3 text-center block block-contact">
            <div class="col-md-8 p-lg-5 py-3 mx-auto">
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

        {{-- Block 7 --}}
        <div class="d-md-flex flex-column w-100 pl-md-3 py-lg-5 block block-4">
            <div class="col-md-6 mx-auto my-md-5 px-5 py-3 rounded bg-transparent-dark">
                <p class="lead font-weight-normal ">
                    Весь Вавилон - не что иное, как бесконечная игра случайностей"
                    Хорхе Луи Борхес
                </p>
            </div>
            <div class="col-md-6 mx-auto my-md-5 px-5 py-3 rounded bg-transparent-dark">
                <p class="lead font-weight-normal ">
                    Что-то новое, что-то интересное, кое-что таинственное. Согласись, все этого не хватает в обыденной жизни!Присоединяйся прямо сейчаси не пожалеешь!
                    Здесь ничего невозможно предугадать, кроме уверенности в отлично проведенном времени на протяжении всей игры.
                    Раз в неделю доверьтесь Борхесу. Доверьтесь неизвестному и жизнь заиграет новыми, яркими красками!
                    Действуй!
                </p>

                <div class="py-3 d-md-none d-sm-block text-center">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#modal">
                        Получить вечный номер
                    </button>
                </div>

            </div>
            <div class="py-3 d-none d-md-block text-center">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#modal">
                    Получить вечный номер
                </button>
            </div>
        </div>

        {{-- Block 8 --}}
        <div class="d-md-flex flex-column w-100 pl-md-3 text-center block block-contact">
            <div class="col-md-8 my-lg-5 p-lg-5 py-3 mx-auto">
                <h2 class="gotic-fonts">
                    Компания думает о тебе!
                </h2>
            </div>
        </div>

        {{-- Block Sending --}}
        <div class="d-md-flex flex-column w-100 pl-md-3 pt-0 pt-md-5 text-center block block-sending">

            <h2 class="gotic-fonts d-none d-md-block">Сотрудничество с Компанией</h2>

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
                            ПЛАН БОРХЕСА
                        </h2>
                        <p class="gotic-fonts" style="font-size: 1.5rem">
                            По мотивам произведений Хорхе Луи Борхеса.
                        </p>
                    </div>
                </div>
            </div>
        </footer>

        @if (count($errors) > 0)
            <span id="modal_caller" data-modal="modal"></span>
        @endif
        @if (session('status_new_customer'))
            <span id="modal_caller" data-modal="success"></span>
        @endif
        @if (session('status_new_contact'))
            <span id="modal_caller" data-modal="success"></span>
        @endif
        <!-- Modal -->
        <div class="modal" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Заявка на получение уникального кода</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{route('customers.store')}}" class="needs-validation" novalidate>
                        {{ csrf_field() }}
                        <div class="modal-body text-left">
                            <div class="form-group">
                                <label for="name">Ваше Имя</label>
                                <input value="{{ old('name') }}" type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Укажите ваше имя" required>
                                <div class="valid-feedback">
                                    Корректные данные
                                </div>
                                <div class="invalid-feedback">
                                    Укажите ваше имя
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone">Ваш телефон</label> <small>(10 цифр, без 8 или +7)</small>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">+7</div>
                                        </div>

                                        <input value="{{ old('phone') }}" type="tel" class="form-control form-control-lg" id="phone" name="phone" placeholder="пример: 9205743885" required>
                                    </div>
                                <div class="valid-feedback">
                                    Корректные данные
                                </div>
                                <div class="invalid-feedback">
                                    Укажите корректный телефон, только 10 цифр без 8 или +7
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Ваш email</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">@</div>
                                    </div>

                                    <input value="{{ old('email') }}" type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Укажите ваш email" required>
                                </div>
                                <div class="valid-feedback">
                                    Корректные данные
                                </div>
                                <div class="invalid-feedback">
                                    Укажите корректный email
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city">Ваш город</label>
                                <input value="{{ old('city') }}" type="text" class="form-control form-control-lg" id="city" name="city" placeholder="Укажите ваш город" required>
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
                                <input value="{{ old('name') }}" type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Укажите вашу имя" required>
                                <div class="valid-feedback">
                                    Корректные данные
                                </div>
                                <div class="invalid-feedback">
                                    Укажите ваше имя
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Ваш email</label>
                                <input value="{{ old('email') }}" type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Укажите ваш email" required>
                                <div class="valid-feedback">
                                    Корректные данные
                                </div>
                                <div class="invalid-feedback">
                                    Укажите ваш email
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Textarea1">Ваше сообщение</label>
                                <textarea value="{{ old('message') }}" class="form-control" id="Textarea1" name="message" rows="3"></textarea>
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

        @if($lottery !== null)
            <div class="modal" id="lastLottery" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-center">Последние победители</h5>
                            @for($i = 0; $i < count($lottery->keys); $i++)
                                <p class="card-text">{{$lottery->keys[$i]->key}}</p>
                            @endfor
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">{{$lottery->created_at}}</small>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="modal" id="success" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">

                <div class="modal-content gotic-fonts rounded">
                    <div class="modal-header">
                        <h1 class="w-100 text-center">Спасибо Вам!
                        </h1>
                        <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body py-5 text-center" style="font-size:1.5rem">
                        <p>{{ session('status_new_customer') }}</p>
                        <p>{{ session('status_new_contact') }}</p>
                    </div>
                </div>

            </div>
        </div>

        <!-- Scripts -->
        <script src="js/app.js" charset="utf-8"></script>
    </body>
</html>
