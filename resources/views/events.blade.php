
@extends('layouts.crm')

@section('title', 'События')

@section('add_scripts')
    <script src="{{ asset("js/gijgo.min.js") }}"></script>
    <script src="{{ asset("js/call.js") }}"></script>
    <link rel="stylesheet" href="{{ asset("css/gijgo.min.css") }}">
@endsection

@section('menu')
    <ul class="navbar-nav mr-auto">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('file') }}">Файл</a>
        </li>

        <li class="nav-item ">
            <a class="nav-link active" href="{{ route('events') }}">События <span class="sr-only"></span></a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="{{ route('desk') }}">Доска</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('clients') }}">Клиенты</a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link" href="#">Маркетинг</a>
        </li> --}}

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
                                    @if (Session::has('error'))
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

            <div class="card-header"><h3 class="search-header">События</h3>
                <div class="input-group" id="adv-search">

                    <input type="text" id="table_search" class="form-control" placeholder="Поиск по событиям" />
                </div>
            </div>


            @isset($events)
            <div class="card-body">
                <table id="data_table" class="table table-striped table-hover ">
                    <tbody>
                    @foreach ($events as $event)
                        @if (Route::current()->parameter('id', null) == $event->client_id)
                            <tr class="active-tr">
                                <td><a href="{{ route('events', ['id' => $event->client_id]) }}">{{ $event->last_name }} {{ $event->first_name }} {{ $event->given_name }}</a></td>
                                <td id="phone"><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> Звонок</a></td>
                                <td><a href="mailto:{{ $event->email }}"><i class="fa fa-envelope" aria-hidden="true"></i> Письмо</a></td>
                                <td><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> {{ $event->type }}, {{ $event->date }}</a></td>
                            </tr>
                        @else
                            <tr>
                                <td><a href="{{ route('events', ['id' => $event->client_id]) }}">{{ $event->last_name }} {{ $event->first_name }} {{ $event->given_name }}</a></td>
                                <td id="phone"><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> Звонок</a></td>
                                <td><a href="mailto:{{ $event->email }}"><i class="fa fa-envelope" aria-hidden="true"></i> Письмо</a></td>
                                <td><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> {{ $event->type }}, {{ $event->date }}</a></td>
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
                            <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true" >Основное</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false" >Контакт</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false" >История</a>
                        </li>

                    </ul>
                </div> <!-- Card Header end -->


                <div class="card-body tab-content" id="sideTabContent">

                    <div class="info">
                        <h3> {{ $client_side->last_name }} {{ $client_side->first_name }} {{ $client_side->given_name }} </h3>
                        <p> {{ $client_side->position }} </p>
                        <p> {{ $client_side->company }} </p>
                        <div>
                            <button type="button" id="phone" class="btn btn-primary"><i class="fa fa-phone" aria-hidden="true"></i> Звонок</button>
                            <a href="mailto:{{ $client_side->email }}"><button type="button" class="btn btn-secondary"><i class="fa fa-envelope" aria-hidden="true"></i> Письмо</button></a>
                        </div>
                    </div> <!-- Info Block end -->

                    <hr />

                    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">

                        <div class="block">
                            <h5>Последний комментарий </h5>
                            <p>{{ $client_side->last_comment }}</p>
                        </div> <!-- Last Comment end -->

                        @isset($nst_event)
                            <hr />
                            <div class="block">
                                <h5>Ближайшее событие </h5>
                                <p> <h3> {{ $nst_event->type }} </h3><h6>{{ $nst_event->date }}</h6>{{ $nst_event->address }}</p>

                                <form method="POST" action="{{ route('event_delete', ['id' => $nst_event->id]) }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Добавить комментарий о событии</label>
                                        <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Завершить</button>
                                    <button type="button" onclick="showTransfer()" class="btn btn-secondary">Перенести</button>
                                </form>
                            </div> <!-- Next Event end -->
                            <div class="block" id="transferevent" style="display: none;">
                                <hr />
                                <form method="POST" action="{{ route('event_transfer', ['id' => $nst_event->id]) }}">
                                    {{ csrf_field() }}
                                    <label for="datepicker">Дата</label>
                                    <input id="datepickerMove" width="276" />
                                    <script>
										$('#datepickerMove').datepicker({
											uiLibrary: 'bootstrap4',
											iconsLibrary: 'fontawesome',
											format: 'yyyy-mm-dd'
										});
                                    </script>
                                    <label for="exampleFormControlSelect1">Время</label>
                                    <div class="form-row">
                                        <div class="col">
                                            <select class="form-control" id="hourselectMove">
                                                <option>09</option>
                                                <option>10</option>
                                                <option>11</option>
                                                <option>12</option>
                                                <option>13</option>
                                                <option>14</option>
                                                <option>15</option>
                                                <option>16</option>
                                                <option>17</option>
                                                <option>18</option>
                                                <option>19</option>
                                                <option>20</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-control" id="minuteselectMove">
                                                <option>00</option>
                                                <option>05</option>
                                                <option>10</option>
                                                <option>15</option>
                                                <option>20</option>
                                                <option>25</option>
                                                <option>30</option>
                                                <option>35</option>
                                                <option>40</option>
                                                <option>45</option>
                                                <option>50</option>
                                                <option>55</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br />
                                    <input type="hidden" name="date" class="form-control" id="datetimeMoveField" placeholder="datetime">
                                    <script>
										function moveEvent() {
											document.getElementById('datetimeMoveField').value = document.getElementById('datepickerMove').value + " " + document.getElementById('hourselectMove').value + ":" + document.getElementById('minuteselectMove').value + ":00";
										}
                                    </script>
                                    <button type="submit" onclick="moveEvent()" class="btn btn-primary">Сохранить</button>
                                </form>
                            </div> <!-- Transfer Event end -->
                            <script>
								function showTransfer() {
									var x = document.getElementById('transferevent');
									if (x.style.display === "none") {
										x.style.display = "block";
									} else {
										x.style.display = "none";
									}
								}
                            </script>
                        @endisset
                        <hr />
                        <div class="block">
                            <h5>Новое событие</h5>
                            <form method="POST" action="{{ route('event_create', ['client_id' => $client_side->id, 'old_id' => $nst_event->id]) }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Выберите событие</label>
                                    <select name="type" class="form-control" id="exampleFormControlSelect1">
                                        <option>Предложение</option>
                                        <option>Письмо</option>
                                        <option>Звонок</option>
                                        <option>Встреча</option>
                                        <option>Договор</option>
                                    </select>
                                </div>
                                <label for="datepicker">Дата</label>
                                <input id="datepicker" width="276" />
                                <script>
									$('#datepicker').datepicker({
										uiLibrary: 'bootstrap4',
										iconsLibrary: 'fontawesome',
										format: 'yyyy-mm-dd'
									});
                                </script>
                                <label for="exampleFormControlSelect1">Время</label>
                                <div class="form-row">
                                    <div class="col">
                                        <select class="form-control" id="hourselect">
                                            <option>09</option>
                                            <option>10</option>
                                            <option>11</option>
                                            <option>12</option>
                                            <option>13</option>
                                            <option>14</option>
                                            <option>15</option>
                                            <option>16</option>
                                            <option>17</option>
                                            <option>18</option>
                                            <option>19</option>
                                            <option>20</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control" id="minuteselect">
                                            <option>00</option>
                                            <option>05</option>
                                            <option>10</option>
                                            <option>15</option>
                                            <option>20</option>
                                            <option>25</option>
                                            <option>30</option>
                                            <option>35</option>
                                            <option>40</option>
                                            <option>45</option>
                                            <option>50</option>
                                            <option>55</option>
                                        </select>
                                    </div>
                                </div>
                                <br />
                                <label for="address">Адрес</label>
                                <textarea id="address" name="address" class="form-control" rows="1"></textarea>
                                <br />
                                <input type="hidden" name="date" class="form-control" id="datetimeCreateField" placeholder="datetime">
                                <script>
									function makeEvent() {
										document.getElementById('datetimeCreateField').value = document.getElementById('datepicker').value + " " + document.getElementById('hourselect').value + ":" + document.getElementById('minuteselect').value + ":00";
									}
                                </script>
                                <button type="submit" onclick="makeEvent()" class="btn btn-primary">Добавить</button>
                            </form>
                        </div> <!-- New Event end -->

                    </div> <!-- General end -->

                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                        <div class="block">
                            <h5><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> {{ $client_side->telephone }}</a></h5>
                            <p>Основной мобильный <a class="text-muted" href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                            <h5><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> {{ $client_side->telephone2 }}</a></h5>
                            <p>Дополнительный мобильный <a class="text-muted" href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                            <h5><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> {{ $client_side->email }}</a></h5>
                            <p>Основная почта <a class="text-muted" href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                        </div> <!-- Contact Data end -->

                        <!-- <button type="button" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Добавть контакт</button> -->

                    </div> <!-- Contact end -->

                    <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                        @isset($cl_events)
                            <div class="block">
                               {{-- <button type="button" class="btn btn-secondary">История событий</button>
                                <button type="button" class="btn btn-secondary">История звонков</button>
                                <hr />--}}
                                @foreach ($cl_events as $cl_event)
                                    <div id="history-event">
                                        <h5>{{ $cl_event->created_at }}</h5>
                                        <p>Создано событие "{{ $cl_event->type }}" на {{ $cl_event->date }}. Адрес: {{ $cl_event->address }}</p>
                                        <hr />
                                    </div>
                                @endforeach
                            </div> <!-- Contact Data end -->
                        @endisset
                    </div> <!-- History end -->

                </div> <!-- Tab Body end -->

            </div> <!-- Card end -->

        </div> <!-- Column end -->
    @endisset
@endsection