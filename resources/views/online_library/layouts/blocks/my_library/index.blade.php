@extends('online_library.layouts.blocks.default')

@section('title', 'Books')

@section('content')

    <main role="main">
        <div class="jumbotron pb-1">
            <div class="container">
                <h1 class="display-3 text-center">Онлайн библиотека</h1>

                @if(!empty($message))
                    <div class="alert alert-success"> {{ $message }}</div>
                @endif

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3 col-md-pull-9">
                    <form method="post" action="#" role="search" enctype="multipart/form-data" id="sForm"
                          class="form-inline">
                        <div class="">
                            <p class="hint">
                                <small>Для поиска введите первые символы фамилии автора или название книги</small>
                            </p>
                            <input type="text" class="form-control bsearch ui-autocomplete-input" name="stext"
                                   id="stext" value="" placeholder="Поиск" autocomplete="off">
                            <button type="submit" id="sbut" class="fa fa-search"
                                    style="width: 40px; height: 37px; background: #2196F3; border-radius:4px;">
                            </button>
                        </div>
                    </form>
                    <h3 class="pt-2"><span class="glyphicon glyphicon-certificate"></span>Жанры</h3>

                    @include('online_library.layouts.blocks.genre.index')

                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-md-push-3">
                    <h2>Список моих книг</h2>

                    @include('online_library.layouts.blocks.my_library.books.index')

                </div>
            </div>
        </div>
    </main>

@endsection

