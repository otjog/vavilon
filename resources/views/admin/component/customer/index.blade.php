@extends('layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h2>Игроки</h2>
        @if(isset($customers) && count($customers) > 0 && $customers !== null)
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Активность</th>
                        <th>Имя</th>
                        <th>Телефон</th>
                        <th>Email</th>
                        <th>Город</th>
                        <th>Номера</th>
                        <th>Действие</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($customers as $customer)
                        <tr>
                            <td>{{$customer->id}}</td>
                            <td>
                                <form method="post" action="{{route('customers.update', $customer->id)}}">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <input type="hidden" name="active" value="{{$customer->active}}">
                                    @if($customer->active)
                                        <button type="submit" class="btn btn-link py-0 text-success">V</button>
                                    @else
                                        <button type="submit" class="btn btn-link py-0 text-danger">X</button>
                                    @endif
                                </form>
                            </td>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->phone}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->city}}</td>
                            <td>
                                @if(isset($customer['keys']) && $customer['keys'] !== null)
                                    <a
                                            data-toggle="collapse"
                                            href="#collapseKeysFor{{$customer->id}}"
                                            aria-expanded="false"
                                            aria-controls="collapseKeysFor{{$customer->id}}">
                                        Активных номеров:{{count($customer['keys'])}}
                                    </a>
                                    <div class="collapse" id="collapseKeysFor{{$customer->id}}">

                                        @if(count($customer['keys']) > 0)
                                            <ul class="list-unstyled">
                                                <li>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            Номер
                                                        </div>
                                                        <div class="col-6">
                                                            Активность
                                                        </div>
                                                    </div>
                                                </li>
                                                @foreach($customer['keys'] as $key)
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                {{$key->key}}
                                                            </div>
                                                            <div class="col-6">
                                                                <form method="post" action="{{route('keys.update', $key->id)}}">
                                                                    {{csrf_field()}}
                                                                    {{method_field('PUT')}}
                                                                    <input type="hidden" name="active" value="{{$key->active}}">
                                                                    @if($key->active)
                                                                        <button type="submit" class="btn btn-link py-0 text-success">V</button>
                                                                    @else
                                                                        <button type="submit" class="btn btn-link py-0 text-danger">X</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif

                                        <form method="post" action="{{route('keys.store')}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="customer_id" value="{{$customer->id}}">
                                            <button class="btn btn-success btn-sm" type="submit">Добавить номер</button>
                                        </form>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <button
                                        type="button"
                                        class="btn btn-warning btn-sm"
                                        data-toggle="modal"
                                        data-target="#customerMailModal"
                                        data-customername="{{$customer->name}}"
                                        data-customeremail="{{$customer->email}}">
                                    Отправить задание
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </main>

    <div class="modal fade" id="customerMailModal" tabindex="-1" role="dialog" aria-labelledby="customerMailModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="customerMailModalLabel">Новое задание</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <fieldset disabled>
                            <div class="form-group">
                                <label for="customerMailName">Кому</label>
                                <input type="text" id="customerMailName" class="form-control" placeholder="Disabled input">
                            </div>
                            <div class="form-group">
                                <label for="customerMailEmail">Адрес</label>
                                <input type="text" id="customerMailEmail" class="form-control" placeholder="Disabled input">
                            </div>
                        </fieldset>
                        <div class="form-group">
                            <label for="customerMailMessage" class="col-form-label">Суть задания:</label>
                            <textarea class="form-control" id="customerMailMessage"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary">Отправить задание</button>
                </div>
            </div>
        </div>
    </div>


@endsection