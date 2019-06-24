@extends('layouts.app')

@section('content')

        <h2>Редактировать задачу</h2>
        <form method="post" action="{{route('tasks.update', $task->id)}}">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <div class="col-lg-1 col-12">
                    <div class="form-check">
                        <input
                                class="form-check-input"
                                type="checkbox"
                                value="1"
                                id="taskActive"
                                name="active"
                                @if($task->active)
                                    checked
                                @endif
                        >
                        <label class="form-check-label" for="taskActive">
                            Активна
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="form-group">
                        <label for="taskName">Название задачи</label>
                        <input type="text" class="form-control" id="taskName" name="name" value="{{$task->name}}" placeholder="Название задачи">
                    </div>
                </div>
                <div class="col-lg-5 col-12">
                    <div class="form-group">
                        <label for="taskCustomer">Выберите игрока <small>(не обязательно)</small></label>
                        <select class="form-control" id="taskCustomer" name="customer_id">
                            @foreach($customers as $customer)
                                <option
                                        value="{{$customer->id}}"
                                        @if($customer->id === $task['customer']->id)
                                            selected
                                        @endif
                                >
                                    {{$customer->phone}} - {{ $customer->name}} - {{$customer->city}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="taskDescription">Подробное описание</label>
                <textarea class="form-control" id="taskDescription"  name="description" rows="10" cols="45">{{$task->description}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>

@endsection