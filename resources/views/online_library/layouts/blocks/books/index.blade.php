@forelse($books as $book)

    <div class="col-xs-12 col-sm-12 col-md-6 pb-3 border-bottom">
        <div class="media blist pt-3">
            <a class="pull-left bcoverf" href="/{{ $book->id }}">
                <img class="media-object img-responsive" src="{{ asset('/' .$book->cover_path) }}" alt=""  style="width: 100px; margin-right: 10px;">
            </a>
            <div class="media-body">
                <p>{!! $book['author']->name !!}</p>
                <h4 class="media-heading">
                    <a href="/{{ $book->id }}">{{ $book->title }}</a>
                </h4>
                <p>{{ $book->year }}</p>
                <div class="bannot">{{ $book->description }}</div>
            </div>
        </div>
    </div>

@empty

    <p>
        Нет книг!
    </p>

@endforelse

