<div class="form-group">
    {!! Form::label('name', 'Имя пользователя', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('name', $user->name, ["class"=>"form-control",
        "placeholder"=>"Логин",'required' => 'required', 'pattern' => '[\w\-\_\.]+' ]) !!}
    </div>
</div>

@if ('create' == $action)
    <div class="form-group">
        {!! Form::label('email', 'email', ["class"=>"col-sm-3 control-label"]) !!}
        <div class="col-sm-6">
            {!! Form::email('email', null, ["class"=>"form-control",
            "placeholder"=>"email",'required' => 'required' ]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Пароль', ["class"=>"col-sm-3 control-label"]) !!}
        <div class="col-sm-6">
            {!! Form::text('password', null, ["class"=>"form-control",
            "placeholder"=>"Пароль", 'required', 'pattern' => '[\w\-\_]+']) !!}
        </div>
    </div>
@else
    <div class="form-group">
        {!! Form::label('email', 'email', ["class"=>"col-sm-3 control-label"]) !!}
        <div class="col-sm-6">
            <p>{{ $user->email }}</p>
        </div>
    </div>
@endif

<div class="form-group">
    {!! Form::label('role', 'Роли', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        @foreach($roles as $role)
            <p>
                {!! Form::checkbox('roleCheck[]', $role->id, $user->hasRole($role->name), ['id'=> 'role'.$role->id]) !!}
                {!! Form::label('role'.$role->id, $role->name) !!}
            </p>
        @endforeach
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        {!! Form::button('<i class="fa fa-btn fa-save"></i> Сохранить', ['type'=>'submit',
        'class' =>
        'btn btn-primary']) !!}
    </div>
</div>