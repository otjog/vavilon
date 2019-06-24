@extends('layouts.app')

@section('content')

        <h2>Редактировать новость</h2>
        <form method="post" action="{{route('news.update', $oneNews->id)}}">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="{{$oneNews->id}}">
            <div class="form-check">
                <input
                        class="form-check-input"
                        type="checkbox"
                        value="1"
                        id="newsActive"
                        name="active"
                        @if($oneNews->active)
                            checked
                        @endif
                >
                <label class="form-check-label" for="newsActive">
                    Активна
                </label>
            </div>
            <hr>
            <div class="form-group">
                <label for="newsName">Заголовок</label>
                <input type="text" class="form-control" id="newsName" name="name" value="{{$oneNews->name}}" placeholder="Название новости">
            </div>
            <div class="form-group">
                <label for="newsDescription">Подробное описание</label>
                <textarea class="form-control" id="newsDescription"  name="description" rows="10" cols="45">{{$oneNews->description}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>

@endsection