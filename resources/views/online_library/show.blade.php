@extends('online_library.layouts.blocks.default')

@section('title', 'Book Info')

@section('content')

    <main role="main">
        <div class="jumbotron pb-1">
            <div class="container">
                <h1 class="display-3 text-center">Онлайн библиотека</h1>
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
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <p>
                                <img itemprop="image" class="media-object img-responsive" src="{{ asset('/' .$book->cover_path) }}" alt=""  style="width: 265px;">
                            </p>

                            @guest

                                <p>
                                    Для скачивания книги авторизуйтесь!
                                </p>

                            @endguest

                            @auth

                            <p>
                                <a type="file" href="storage/{{ $book->file_path }}" target="_blank">Скачать в формате xml</a>
                            </p>

                            @endauth

                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-8"><h2 itemprop="name">{{ $book->title }}</h2>
                            <p><strong>{!! $book['author']->name !!}</strong></p>
                            <h3>аннотация</h3>
                            <div itemprop="description">{{ $book->description }}</div>
                        </div>
                        <div class="pt-5"><a class="btn btn-primary btn-lg" href="{{back()->getTargetUrl()}}" role="button">Вернуться назад</a></div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection