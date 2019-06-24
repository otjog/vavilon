@extends('layouts.app')

@section('content')

    <a class="btn btn-primary btn-sm" href="{{route('events.create')}}">Назначить дату нового розыгрыша</a>

        <h2>Прошедшие розыгрыши</h2>
        @if(isset($lotteries) && count($lotteries) > 0 && $lotteries !== null)
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Выигрышный номер</th>
                        <th>Время Розыгрыша</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($lotteries as $lottery)
                        <tr>
                            <td>{{$lottery->id}}</td>
                            <td>{{$lottery->key_id}}</td>
                            <td>{{$lottery->datetime}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif

@endsection