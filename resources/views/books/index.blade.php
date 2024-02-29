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
        @foreach ($booksList as $bookInfo)
            <div>
                <div>
                    book: {{ $bookInfo->book->title }}
                </div>
                <div>
                    author: {{ $bookInfo->author->name }}
                </div>
                <div>
                    გამოშვების წელი: {{ $bookInfo->book->release_date }}
                </div>
            </div>
            <hr>
        @endforeach
    </section>
</x-layout>
