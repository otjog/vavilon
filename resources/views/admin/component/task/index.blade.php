@extends('layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h2>Задачи</h2>

        <a class="btn btn-primary btn-sm" href="{{route('tasks.create')}}">Создать задачу</a>

        @if(isset($tasks) && count($tasks) > 0 && $tasks !== null)
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Активность</th>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Мобильный Участника</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->id}}</td>
                                <td>
                                    <form method="post" action="{{route('tasks.update', $task->id)}}">
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
                                <td>{{$task->name}}</td>
                                <td>{{$task->description}}</td>
                                <td>
                                    @if(isset($task['customer']) && count($task['customer']) > 0 && $task['customer'] !== null)
                                        Номер
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </main>

@endsection