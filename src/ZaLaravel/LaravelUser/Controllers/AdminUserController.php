<?php

namespace ZaLaravel\LaravelUser\Controllers;

use ZaLaravel\LaravelUser\Requests;
use ZaLaravel\LaravelAdmin\Controllers\AbstractAdminController;
use ZaLaravel\LaravelUser\Models\Role;
use ZaLaravel\LaravelUser\Models\User;
use ZaLaravel\LaravelUser\Models\Interfaces\UserInterface;

use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as RequestFacade;

class AdminUserController extends AbstractAdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request, UserInterface $user)
	{
		$users = $user::orderBy('id', 'desc');

        if ($request->input('id')) {
            $users = $users->where('id', '=', $request->input('id'));
        }

        if ($request->input('email')) {
            $users = $users->where('email', 'LIKE', '%'.$request->input('email').'%');
        }

        if ($request->input('name')) {
            $users = $users->where('name', 'LIKE', '%'.$request->input('name').'%');
        }

        $users = $users->paginate(10);

        return view('laravel-user::index', [
            'users' => $users,
            'f_id' => $request->input('id'),
            'f_email' => $request->input('email'),
            'f_name' => $request->input('name')
        ]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(UserInterface $user)
	{
        $roles = Role::orderBy('id', 'asc')->get();
		return view('laravel-user::create', ['user' => $user, 'roles'=> $roles, 'action' => 'create']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\UserRequest $request, Registrar $registrar)
	{
        $data = $request->all();
        if (!array_key_exists('roleCheck', $data)) $data['roleCheck'] = [];
        $user = $registrar->create($data);

        $user->roles()->sync($data['roleCheck']);

        \Session::flash('message', 'Пользователь создан');
        return redirect()->route('admin.user.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(UserInterface $user)
	{
        $roles = Role::orderBy('id', 'asc')->get();
        return view('laravel-user::edit', ['user' => $user, 'roles'=> $roles, 'action' => 'edit']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UserInterface $user, Requests\UserRequest $request)
	{
        $data = $request->all();

        // If no one checkbox was checked we need to set 'roleCheck' as empty array to avoid error
        if (!array_key_exists('roleCheck', $data)) $data['roleCheck'] = [];

        if ($user->update($data)) {
            $user->roles()->sync($data['roleCheck']);
        }
        \Session::flash('message', 'Пользователь обновлен');
        return redirect()->route('admin.user.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(UserInterface $user)
	{
		$user->delete();
        return redirect()->route('admin.user.index');
	}

    public function block(UserInterface $user){
        $user->update(RequestFacade::all());
        return redirect()->route('admin.user.index');
    }

}
