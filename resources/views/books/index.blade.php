<x-layout>
    <style>
        .books_container {}
    </style>
    <form method="GET" action="{{ route('home') }}">
        <label class="search">
            მოძებნე:
            <input name="search" type="text" value="{{ $search }}">
        </label>
    </form>
    <section class="books_container">
        @foreach ($books as $book)
            <a href="{{ route('books.show', $book->id) }}" class="book_item">
                {{ $book->title }}
            </a>
            <div>authors: @foreach ($book->authors as $author)
                    {{ $author->name }}
                @endforeach
            </div>
            <br />
        @endforeach
    </section>
</x-layout>
