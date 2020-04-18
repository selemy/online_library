<form action="{{route('searchSimple')}}" method="get" role="search" class="search-simple form-inline">
    <div class="">
        <p class="hint">
            <small>Для поиска введите первые символы фамилии автора или название книги</small>
        </p>
        <input type="search" class="form-control bsearch ui-autocomplete-input" name="search"
               id="stext" value="{{ old('q') }}" placeholder="Поиск" autocomplete="off" required>
        <button type="submit" id="sbut" class="fa fa-search"
                style="width: 40px; height: 37px; background: #2196F3; border-radius:4px;">
        </button>
    </div>
</form>