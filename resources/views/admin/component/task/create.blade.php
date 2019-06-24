@extends('layouts.app')

@section('content')

        <h2>Создать задачу</h2>
        <form method="post" action="{{route('tasks.store')}}">
            {{csrf_field()}}
            <div class="row">
                <div class="col-lg-1 col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="taskActive" name="active" checked>
                        <label class="form-check-label" for="taskActive">
                            Активна
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="form-group">
                        <label for="taskName">Название задачи</label>
                        <input type="text" class="form-control" id="taskName" name="name" placeholder="Название задачи">
                    </div>
                </div>
                <div class="col-lg-5 col-12">
                    <div class="form-group">
                        <label for="taskCustomer">Выберите игрока <small>(не обязательно)</small></label>
                        <select class="form-control" id="taskCustomer" name="customer_id">
                            <option>Выберите игрока</option>
                            @foreach($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->phone}} - {{ $customer->name}} - {{$customer->city}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="taskDescription">Подробное описание</label>
                <textarea class="form-control" id="taskDescription"  name="description" rows="10" cols="45"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>

@endsection