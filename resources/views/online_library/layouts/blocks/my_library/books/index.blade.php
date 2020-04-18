@forelse($books as $book)

    <div class="row border-bottom mt-3">
        <div class="col-xs-11 col-sm-11 col-md-11 col-md-push-11">
            <div class="media blist">
                <a class="pull-left bcover" href="/{{ $book->id }}">
                    <img class="media-object img-responsive" src="{{ asset('/' .$book->cover_path) }}" alt="" style="width: 130px; margin-right: 10px;">
                </a>
                <div class="media-body">
                    <p>{!! $book['author']->name !!}</p>
                    <h4 class="media-heading">
                        <a href="/{{ $book->id }}">{{ $book->title }}</a>
                    </h4>
                    <p>{{ $book->year }}</p>
                    <div>{{ $book->description }}</div>
                </div>
            </div>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-1 col-md-push-1 align-self-center">
            <a href="{{ route('book_edit', $book) }}">
                <input type="submit" class="btn btn-outline-success" value="Изменить" style="width: 100px; margin: 20px 0;">
            </a>
            <form id="destroy-form" action="{{ route('book_delete', $book->id) }}" method="post">

                @csrf

                @method('delete')

                <button class="btn btn-outline-danger" type="submit" style="width: 100px; margin: 20px 0;">Удалить</button>
            </form>
        </div>
    </div>

    @empty
        <p>
            Нет книг!
        </p>
    @endforelse

<?php echo $books->links(); ?>