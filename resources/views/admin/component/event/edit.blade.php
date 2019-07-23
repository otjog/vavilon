@extends('layouts.app')

@section('content')

        <h2>Назначить дату следующего розыгрыша</h2>
        <form method="post" action="{{route('events.update', $event->id)}}">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="{{$event->id}}">
            <input type="hidden" name="active" value="1">
            <input type="hidden" id="datetimeform" name="timestamp">

            <div class="form-group row">
                <label for="datetimepicker" class="col-sm-2 col-form-label">Дата</label>
                <div class="col-sm-10">
                    <input type="text" id="datetimepicker" data-field="datetime"  value="23-06-2019 00:00" readonly>
                    <div id="dtBox"></div>
                </div>
            </div>
            <div class="form-group row">
                <label for="quantity" class="col-sm-2 col-form-label">Кол-во победителей</label>
                <div class="col-sm-10">
                    <input type="number" id="quantity" name="quantity" value="1" min="1" max="999">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </form>

@endsection