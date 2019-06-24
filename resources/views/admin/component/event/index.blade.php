@extends('layouts.app')

@section('content')

        <h2>Виды розыгрышей</h2>
        @if(isset($events) && count($events) > 0 && $events !== null)
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Активность</th>
                        <th>Название</th>
                        <th>Время проведения</th>
                        <th>Изменить</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($events as $event)
                        <tr>
                            <td>{{$event->id}}</td>
                            <td>
                                <div class="">
                                    @if($event->active)
                                        <span class="py-0 text-success">V</span>
                                    @else
                                        <span class="py-0 text-danger">X</span>
                                    @endif
                                </div>
                            </td>
                            <td>{{$event->name}}</td>
                            <td>{{$event->datetime}}</td>
                            <td>    <a class="btn btn-primary btn-sm" href="{{route('events.edit', $event->id)}}">{{$event->button_header}}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif

@endsection