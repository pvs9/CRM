
@extends('layouts.crm')

@section('title', 'Статистика')

@section('add_scripts')
    <script src="{{ asset('js/Chart.bundle.js') }}"></script>
@endsection

@section('menu')
    <ul class="navbar-nav mr-auto">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('import') }}">Файл</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('events') }}">События <span class="sr-only"></span></a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="{{ route('desk') }}">Доска</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('clients') }}">Клиенты</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">Маркетинг</a>
        </li>

        <li class="nav-item">
            <a class="nav-link active" href="{{ route('statistics') }}">Статистика</a>
        </li>

    </ul>
@endsection

@section('content')
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

        <div class="card card-custom">

            <div class="card-header"><h3 class="search-header">Статистика</h3>
            </div>


            <div class="card-body">

                <div class="graph">
                    {!! $statistic->render() !!}
                </div>
            </div> <!-- Card Body end -->
        </div> <!-- Card end -->
    </div> <!-- Column end -->
@endsection