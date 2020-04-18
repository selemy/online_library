@extends('online_library.layouts.blocks.default')

@section('title', 'Edit Users')

@section('content')

    <div class="container">
        <div class="jumbotron pb-1">
            <h1 class="display-3 text-center">Редактирование пользователя</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('user_update',$user->id) }}" method="post">

                    @csrf

                    @method('put')

                    <div class="md-form form-group">
                        <input type="text" id="user-name" name="name" class="form-control" value="{{ $user->name }}">
                        <label for="user-name">Имя пользователя</label>
                    </div>
                    <div class="form-group">
                        <label for="user-role">Роль пользователя</label>
                        <select class="form-control" id="user-role" name="role">
                            <option @if ($user->is_admin == '1') selected="selected" @endif value="admin">Администратор</option>
                            <option @if ($user->is_admin == '0') selected="selected" @endif value="user">Пользователь</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Изменить</button>
                    <a class="btn btn-primary" href="{{ route('users') }}">Вернуться назад</a>
                </form>
            </div>
        </div>
    </div>

@endsection
