@extends('laravel-admin::layout')
@section('title')
    Полезная пользователя
@stop
@section('js')
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Создать пользователя</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Пользователь
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12   ">
                            @include('laravel-admin::partials.errors.basic')
                            {!! Form::model($user,['route'=>['admin.user.store'],
                            'method' => 'POST',
                            'class'=>'form-horizontal', 'role'=>'form']) !!}
                                @include('laravel-user::_form')
                            {!! Form::close() !!}
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
@stop
