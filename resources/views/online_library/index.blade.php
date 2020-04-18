@extends('online_library.layouts.blocks.default')

@section('title', 'Books')

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

                    @include('online_library.layouts.blocks.search.index')

                    <h3 class="pt-2"><span class="glyphicon glyphicon-certificate"></span>Жанры</h3>

                    @include('online_library.layouts.blocks.genre.index')

                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-md-push-3">
                    <div class="row">

                        @include('online_library.layouts.blocks.books.index')

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center">

                    <?php echo $books->links(); ?>

                </div>
            </div>
        </div>
    </main>

@endsection

