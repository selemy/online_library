@extends('online_library.layouts.blocks.default')

@section('title', 'Add Book')

@section('content')

    <div class="container">
        <div class="jumbotron pb-1">
            <h1 class="display-3 text-center">Редактирование книги</h1>
        </div>
        <form action="{{ route('book_update',$book->id) }}" class="was-validated" method="post" enctype="multipart/form-data">

            @csrf

            @method('put')

            <div class="custom-file mt-3 mb-3">
                <input type="file" class="custom-file-input" id="validatedCustomFile" name="file_path" value="{{ $book->file_path }}" required>
                <label class="custom-file-label" for="validatedCustomFile">Файл книги</label>

                @error('file_path')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="custom-file mt-3 mb-3">
                <input type="file" class="custom-file-input" id="validatedCustomFile" name="cover_path" value="{{ $book->cover_path }}" required>
                <label class="custom-file-label" for="validatedCustomFile">Файл обложки</label>

                @error('cover_path')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="row mt-3 mb-3">
                <div class="col form-group">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                           value="{{ $book->title }}" name="title" required>

                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="col form-group">
                    <input type="text" class="form-control @error('year') is-invalid @enderror" id="year"
                           value="{{ $book->year }}" name="year" required>

                    @error('year')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col form-group">
                    <input type="text" class="form-control @error('author_id') is-invalid @enderror" id="author_id"
                           value="{{ $book->author_id }}" name="author_id" required>

                    @error('author_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="col">
                    <select class="custom-select @error('genre_id') is-invalid @enderror" id="genre_id" name="genre_id"
                            required>
                        <option value="">Выберите жанр</option>

                        @include('online_library.layouts.blocks.my_library.files.genre.index')

                    </select>

                    @error('genre_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="form-group mt-4 mb-4">
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3"
                          name="description" required>{{ $book->description }}</textarea>

                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <button type="submit" class="btn btn-primary btn btn-block mb-4">Внести изменения</button>
        </form>
    </div>

@endsection
