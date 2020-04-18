<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user();
        $users = User::where('id', '!=', $id['id'])->paginate(10);
        return view('online_library.layouts.admin.blocks.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('online_library.layouts.admin.blocks.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param \App\Models\User $user
     * @return void
     */
    public function update(UpdateRequest $request, User $user)
    {
        $request->validated();
        if ($request['role'] === 'user') {
            $data['is_admin'] = 0;
        } else {
            $data['is_admin'] = 1;
        }
        $data['name'] = $request['name'];
        $user->update($data);
        $users = User::where('id', '!=', Auth::user()->id)->paginate(10);
        return view('online_library.layouts.admin.blocks.users.index', compact('users'))->with('message','Данные пользователя успешно обновлены');
    }

    public function destroy(User $user)
    {
        $user->delete();
        $users = User::where('id', '!=', Auth::user()->id)->paginate(10);
        return view('online_library.layouts.admin.blocks.users.index', compact('users'))->with('message','Пользователь успешно удален');
    }
}
