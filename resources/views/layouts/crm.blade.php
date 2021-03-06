<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <title>@yield('title')</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <script src="https://use.fontawesome.com/e916dcd032.js"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/crm-style.css') }}">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    @yield('add_scripts')

</head>


<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white shape-custom">
    <a class="navbar-brand" href="{{ url('/') }}">CRM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @yield('menu')

        <div class="header__profile">
            <div class="profile">
                <div class="profile__name">{{ Auth::user()->last_name }} {{ substr(Auth::user()->first_name,0,2) }}.</div>
                <div class="profile__link"><a href="{{ route('user') }}">Открыть профиль</a></div>
            </div>
            <div class="time">
                <div class="time__time"></div>
                <div class="time__date">{{ date('d F') }}</div>
            </div>
            <script>
				window.onload = function() {

					var date, hours, minutes, time;
					function getDate() {
						date = new Date();
						hours = date.getHours();
						minutes = date.getMinutes();
						if(date.getMinutes() < 10) {
							minutes = '0' + String(minutes);
						}
						time = hours+':'+minutes;
						document.getElementsByClassName('time__time')[0].innerHTML = time;
					}
					setInterval(getDate(), 1000);
				};
            </script>
        </div>
    </div>
</nav>


<div class="row">
    @yield('content')
</div>
</body> <!-- Body end -->

</html> <!-- World's end (alsmost as Maya prophesied) -->

