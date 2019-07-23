@extends('layouts.app')

@section('content')

        <h2>Прошедшие розыгрыши</h2>
        @if(isset($lotteries) && count($lotteries) > 0 && $lotteries !== null)
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Время Розыгрыша
                        <th>Выигрышный номер</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lotteries as $lottery)
                        @if(isset($lottery->keys) && $lottery->keys !== null)
                            @foreach($lottery->keys as $keyModel)
                                <tr>
                                    <td>{{$lottery->id}}</td>
                                    <td>{{$lottery->created_at}}</td>
                                    <td>{{$keyModel->key}}</td>
                                </tr>
                            @endforeach
                        @endif
                        <tr>
                            <th>#</th>
                            <th>Время Розыгрыша
                            <th>Выигрышный номер</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif

@endsection