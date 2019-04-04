@extends('layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h2>Последние новости</h2>
        <a class="btn btn-primary btn-sm" href="{{route('news.create')}}">Создать новость</a>
        @if(isset($news) && count($news) > 0 && $news !== null)
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Активность</th>
                        <th>Заголовок</th>
                        <th>Дата создания</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($news as $oneNews)
                        <tr>
                            <td>{{$oneNews->id}}</td>
                            <td>
                                <div class="text-center">
                                    @if($oneNews->active)
                                        <span class="py-0 text-success">V</span>
                                    @else
                                        <span class="py-0 text-danger">X</span>
                                    @endif
                                </div>
                            </td>
                            <td><a href="{{route('news.edit', $oneNews->id)}}">{{$oneNews->name}}</a> </td>
                            <td>{{$oneNews->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </main>
@endsection