@extends('layouts.app')

@section('content')

        <h2>Назначить дату следующего розыгрыша</h2>
        <form method="post" action="{{route('events.update', $event->id)}}">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="{{$event->id}}">
            <input type="hidden" name="active" value="1">
            <input type="text" id="datetimepicker" data-field="datetime"  value="23-06-2019 00:00" readonly>
            <input type="hidden" id="datetimeform" name="timestamp">
            <div id="dtBox"></div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>

@endsection