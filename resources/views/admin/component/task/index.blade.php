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
                        <th>Имя Участника</th>
                        <th>Город Участника</th>
                        <th>Мобильный Участника</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($tasks as $task)

                            <tr>
                                <td>{{$task->id}}</td>
                                <td>
                                    <div class="text-center">
                                        @if($task->active)
                                            <span class="py-0 text-success">V</span>
                                        @else
                                            <span class="py-0 text-danger">X</span>
                                        @endif
                                    </div>
                                </td>
                                <td><a href="{{route('tasks.edit', $task->id)}}">{{$task->name}}</a></td>
                                <td>{{$task->description}}</td>
                                <td>
                                    @if(isset($task['customer']) && $task['customer'] !== null)
                                        {{$task['customer']->name}}
                                    @endif
                                </td>
                                <td>
                                    @if(isset($task['customer']) && $task['customer'] !== null)
                                        {{$task['customer']->city}}
                                    @endif
                                </td>
                                <td>
                                    @if(isset($task['customer']) && $task['customer'] !== null)
                                        {{$task['customer']->phone}}
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