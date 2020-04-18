<ul class="list-unstyled genres">

    @forelse($genres as $genre)

        <li>
            <a href="/genre/{{ $loop->iteration }}" title="{{ $genre->name }}">{{ $genre->name }}</a>
        </li>

    @empty

        <li>
            Нет жанров!
        </li>

    @endforelse
</ul>
