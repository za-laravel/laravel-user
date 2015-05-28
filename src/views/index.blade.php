@extends('laravel-admin::layout')
@section('title')
    Пользователи
@stop
@section('js')

@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Пользователи</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Все Пользователи
                <div class="pull-right">
                    <div class="btn-toolbar  btn-group-xs" role="toolbar" aria-label="...">
                        <a href="{{route('admin.user.create')}}"
                            data-toggle="tooltip"
                            data-original-title="Добавить пользователя"
                            class="btn btn-default btn-mini"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover" ng-controller="UsersController">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Логин</th>
                            <th>email</th>
                            <th>Заблокирован</th>
                            <th>&nbsp;</th>
                        </tr>

                        <tr>
                            {!! Form::open(['route'=>['admin.user.index'], 'class'=>'form-horizontal confirm',
                                'role'=>'form', 'method' => 'GET']) !!}
                            <th>
                                {!! Form::text('id', $f_id, ['class' => 'form-control', 'size' => '3'] ) !!}
                            </th>
                            <th>
                                {!! Form::text('name', $f_name, ['class' => 'form-control'] ) !!}
                            </th>
                            <th>
                                {!! Form::text('email', $f_email, ['class' => 'form-control'] ) !!}
                            </th>
                            <th>&nbsp;</th>
                            <th>
                                <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-original-title="Отфильтровать">
                                    <i class="fa fa-filter"></i>
                                </button>
                                <a class="btn btn-default" href="{{route('admin.user.index')}}" data-toggle="tooltip" data-original-title="Очистить">
                                    <i class="fa fa-eraser"></i>
                                </a>
                            </th>
                            {!! Form::close() !!}
                        </tr>

                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if (1 == $user->blocked)
                                        <i class="fa fa-ban"></i>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="...">
                                        <a href="{{route('admin.user.edit',['id'=>$user->id])}}" data-toggle="tooltip" data-original-title="Редактировать"
                                           class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                        {!! Form::open(['route'=>['admin.user.destroy',$user->id], 'class'=>'form-horizontal confirm',
                                        'role'=>'form', 'method' => 'DELETE']) !!}
                                        <button type="submit" class="btn btn-danger confirm-btn" data-toggle="tooltip" data-original-title="Удалить"><i class="fa fa-trash-o"></i></button>
                                        {!! Form::close() !!}

                                        {!! Form::open(['route'=>['admin.user.block',$user->id], 'class'=>'form-horizontal confirm',
                                        'role'=>'form', 'method' => 'POST']) !!}
                                        @if (0 == $user->blocked)
                                            {!! Form::hidden('blocked', 1) !!}
                                            <button type="submit" class="btn btn-danger confirm-block" data-toggle="tooltip" data-original-title="Заблокировать"><i class="fa fa-ban"></i></button>
                                        @else
                                            {!! Form::hidden('blocked', 0) !!}
                                            <button type="submit" class="btn btn-success confirm-unblock" data-toggle="tooltip" data-original-title="Разблокировать"><i class="fa fa-ban"></i></button>
                                        @endif
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->

            <div class="panel-footer">
                <div class="text-center">{!! $users->render() !!}</div>
            </div>
        </div>
        <!-- /.panel -->
        <!-- /.panel -->
    </div>
@stop
