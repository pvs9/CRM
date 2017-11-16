
@extends('layouts.crm')

@section('title', 'Клиенты')

@section('menu')
    <ul class="navbar-nav mr-auto">

        <li class="nav-item">
            <a class="nav-link" href="#">Файл</a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="#">События <span class="sr-only"></span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link active" href="#">Клиенты</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">Маркетинг</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">Статистика</a>
        </li>

    </ul>
@endsection

@section('content')
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

        <div class="card card-custom">

            <div class="card-header"><h3 class="search-header">Клиенты</h3>
                <div class="input-group" id="adv-search">

                    <input type="text" class="form-control" placeholder="Поиск по клиентам" />
                    <div class="input-group-btn">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-primary">Поиск</button>
                        </div>
                    </div>
                </div>
            </div>

            @isset($clients)
            <div class="card-body">
                <table class="table table-striped table-hover ">
                    <tbody>
                    @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->last_name }} {{ $client->first_name }} {{ $client->given_name }}</td>
                        <td><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> Звонок</a></td>
                        <td><a href="mailto:{{ $client->email }}"><i class="fa fa-envelope" aria-hidden="true"></i> Письмо</a></td>
                        <td>{{ $client->company }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div> <!-- Card Body end -->
            @endisset
        </div> <!-- Card end -->
    </div> <!-- Column end -->
@endsection

