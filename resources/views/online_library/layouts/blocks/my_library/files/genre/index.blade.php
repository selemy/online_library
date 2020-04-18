@forelse($genres as $genre)

    <option value="{{ $loop->iteration }}">{{ $genre->name }}</option>

@empty

    <option>
        Нет жанров!
    </option>

@endforelse
