@extends('online_library.layouts.blocks.default')

@section('title', 'Users')

@section('content')

    <div class="container">
        <div class="jumbotron pb-1">
            <h1 class="display-3 text-center">Список пользователей</h1>

            @if(!empty($message))
                <div class="alert alert-success"> {{ $message }}</div>
            @endif

        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Имя</th>
                <th scope="col">Email</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>

            @forelse($users as $user)

                <tr>
                    <th class="align-middle" scope="row">{{ $user->id }}</th>
                    <th class="align-middle" >{{ $user->name }}</th>
                    <th class="align-middle" >{{ $user->email }}</th>
                    <th class="d-flex">
                        <a class="btn btn-primary" href="{{ route('user_edit', $user->id) }}" style="width: 90px; height: 37px;">Изменить</a>
                        <form id="destroy-form" action="{{ route('user_delete', $user->id) }}" method="post">

                            @csrf

                            @method('delete')

                            <button class="btn btn-danger btn-sm" type="submit" style="width: 90px; height: 37px;">Удалить</button>
                        </form>
                    </th>
                </tr>

            @empty

            @endforelse

            </tbody>
        </table>

        {{ $users->links() }}

    </div>

@endsection
