@extends('layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h2>Прошедшие розыгрыши</h2>
        @if(isset($lotteries) && count($lotteries) > 0 && $lotteries !== null)
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Активность</th>
                        <th>Выигрышный номер</th>
                        <th>Время Розыгрыша</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($lotteries as $lottery)
                        <tr>
                            <td>{{$lottery->id}}</td>
                            <td>
                                <form method="post" action="{{route('lotteries.update', $lottery->id)}}">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <input type="hidden" name="active" value="{{$lottery->active}}">
                                    @if($lottery->active)
                                        <button type="submit" class="btn btn-link py-0 text-success">V</button>
                                    @else
                                        <button type="submit" class="btn btn-link py-0 text-danger">X</button>
                                    @endif
                                </form>
                            </td>
                            <td>{{$lottery->key_id}}</td>
                            <td>{{$lottery->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </main>
@endsection