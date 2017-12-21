
@extends('layouts.crm')

@section('title', 'Импорт Клиентов')

@section('menu')
    <ul class="navbar-nav mr-auto">

        @if (Auth::user()->user_group > 1)
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('file') }}">Файл</a>
            </li>
        @endif

        <li class="nav-item ">
            <a class="nav-link" href="{{ route('events') }}">События <span class="sr-only"></span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('clients') }}">Клиенты</a>
        </li>

        {{--<li class="nav-item">
            <a class="nav-link" href="#">Маркетинг</a>
        </li>--}}

        <li class="nav-item">
            <a class="nav-link" href="{{ route('statistics') }}">Статистика</a>
        </li>

    </ul>
@endsection

@section('content')
    @if ((count($errors) > 0) || (Session::has('error')))
        <div class="modal" id="errorModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ошибка</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                @if(Session::has('error'))
                                    <li>{{ Session::get('error') }}</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
			$('#errorModal').modal('show');
        </script>
    @endif
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
        <div class="card card-custom">
            <div class="card-header"><h3 class="search-header">Импортированные клиенты</h3>
                <div class="input-group" id="adv-search">
                    <input type="text" id="table_search" class="form-control" placeholder="Поиск по клиентам" />
                </div>
            </div>
            @isset($clients)
            <div class="card-body">
                <table class="table table-striped table-hover ">
                    <tbody>
                    @foreach ($clients as $client)
                        @if (Route::current()->parameter('id', null) == $client->id)
                            <tr class="active-tr">
                                <td><a href="{{ route('clients_imported', ['id' => $client->id]) }}">{{ $client->last_name }} {{ $client->first_name }} {{ $client->given_name }}</a></td>
                                <td id="phone"><a href="#"><i class="fa fa-phone" aria-hidden="true"></i>  Звонок</a></td>
                                <td><a href="mailto:{{ $client->email }}"><i class="fa fa-envelope" aria-hidden="true"></i>  Письмо</a></td>
                                <td>{{ $client->company }}</td>
                            </tr>
                        @else
                            <tr>
                                <td><a href="{{ route('clients_imported', ['id' => $client->id]) }}">{{ $client->last_name }} {{ $client->first_name }} {{ $client->given_name }}</a></td>
                                <td id="phone"><a href="#"><i class="fa fa-phone" aria-hidden="true"></i>  Звонок</a></td>
                                <td><a href="mailto:{{ $client->email }}"><i class="fa fa-envelope" aria-hidden="true"></i>  Письмо</a></td>
                                <td>{{ $client->company }}</td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
                <script>
					$(document).ready(function(){
						$("#table_search").keyup(function(){
							_this = this;
							$.each($("#data_table tbody tr"), function() {
								if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1) {
									$(this).hide();
								} else {
									$(this).show();
								}
							});
						});
					});
                </script>
            </div> <!-- Card Body end -->
            @endisset
        </div> <!-- Card end -->
    </div> <!-- Column end -->
    @isset($client_side)
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="card card-custom">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" role="tablist" id="sideTab">
                    <li class="nav-item">
                        <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true" >Привязать</a>
                    </li>
                </ul>
            </div> <!-- Card Header end -->

            <div class="card-body tab-content" id="sideTabContent">
                <div class="info">
                    <h3> {{ $client_side->last_name }} {{ $client_side->first_name }} {{ $client_side->given_name }} </h3>
                    <p> {{ $client_side->position }} </p>
                    <p> {{ $client_side->company }} </p>
                </div> <!-- Info Block end -->

                <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                    <hr />
                    <div class="block">
                        <h5>Привязать менеджеру</h5>
                        <form method="POST" action="{{ route('client_tether') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Выберите менеджера</label>
                                <select class="form-control" name="user_id" id="exampleFormControlSelect1" required>
                                @foreach($managers as $manager)
                                    <option value="{{ $manager->id }}">{{ $manager->last_name }} {{ $manager->first_name }}</option>
                                @endforeach
                                </select>
                                <input type="hidden" name="client_id" value="{{ $client_side->id }}">
                            </div>
                            <button type="submit"  class="btn btn-primary">Привязать</button>
                        </form>
                    </div> <!-- Last Comment end -->
                </div> <!-- General end -->
            </div> <!-- Tab Body end -->
        </div> <!-- Card end -->
    </div> <!-- Column end -->
    @endisset
@endsection