<?php

namespace ZaLaravel\LaravelUser\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
        if ('POST' == $this->method()) {
            return [
                'name' => 'required|unique:users|max:16|min:4|regex:/^[\w\-\_\.]+$/',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|regex:/^[\w\-\_]+$/',
            ];
        } elseif ('PATCH' == $this->method()){
            return [
                'name' => 'required|regex:/^[\w\-\_\.]+$/',
            ];
        }
	}

    public function messages()
    {
        return [
            'email.required' => 'Заполните поле email',
            'email.email' => 'Введите правильный email',
            'email.max' => 'Email слишком длинный',
            'email.unique' => 'Пользователь с таким email уже зарегестрирован',
            'name.required' => 'Введите логин',
            'name.min' => 'Логин слишком короткий',
            'name.max' => 'Логин слишком длинный',
            'name.unique' => 'Пользователь с таким логином уже есть в базе',
            'password.min' => 'Пароль должен содержать минимум 6 символов',
            'password.required' => 'Введите пароль'

        ];
    }

}
