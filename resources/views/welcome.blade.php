<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Вавилонская лотерея</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="css/app.css">
        <!--link rel="stylesheet" href="css/cover.css"-->
        <link rel="stylesheet" href="css/product.css">

    </head>

    <body>
        <!--div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column container">
            <header class="masthead mb-auto">
                <div class="inner">
                    <i class="fas fa-bars"></i>
                    <nav class="nav nav-masthead justify-content-center">
                        <a class="nav-link active" href="#">Home</a>
                        <a class="nav-link" href="#">Features</a>
                        <a class="nav-link" href="#">Contact</a>
                    </nav>
                </div>
            </header>

            <main role="main" class="cover text-center">
                <h1 class="display-1">Вавилонская лотерея</h1>
                <p>Можно выиграть ценный приз или действие</p>
                <p class="lead">Все закономерности случайны, а случайности закономерны!</p>
                <div class="roller mx-auto">
                    <div class="js-bounty text-center"></div>
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
            </main>

            <footer class="mastfoot mt-auto">

            </footer>
        </div-->

        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <h1 class="display-4 font-weight-normal">Punny headline</h1>
                <p class="lead font-weight-normal">And an even wittier subheading to boot. Jumpstart your marketing efforts with this example based on Apple's marketing pages.</p>
                <a class="btn btn-outline-secondary" href="#">Coming soon</a>
            </div>
            <div class="product-device box-shadow d-none d-md-block"></div>
            <div class="product-device product-device-2 box-shadow d-none d-md-block"></div>
        </div>

        <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
            <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
                <div class="my-3 py-3">
                    <h2 class="display-5">Another headline</h2>
                    <p class="lead">And an even wittier subheading.</p>
                </div>
                <div class="bg-light box-shadow mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
            </div>
            <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <div class="my-3 p-3">
                    <h2 class="display-5">Another headline</h2>
                    <p class="lead">And an even wittier subheading.</p>
                </div>
                <div class="bg-dark box-shadow mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
            </div>
        </div>

        <script src="js/app.js" charset="utf-8"></script>
        <!--script src="https://unpkg.com/bounty@1.1.6/lib/bounty.js"></--script-->
        <script>
            bounty.default({
                el: '.js-bounty',
                value: Math.floor(Math.random()*10000000),
                lineHeight: 1.35,
                letterSpacing: 49,
                animationDelay: 100,
                letterAnimationDelay: 100
            })
        </script>
    </body>
</html>
