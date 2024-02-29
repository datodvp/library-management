<x-layout>
    <style>
        .books_container {}
    </style>

    <section class="books_container">
        <form method="POST" action="{{ route('books.store') }}" style="display:grid;">
            @csrf
            @method('post')
            <label class="authors_container">
                წიგნის ავტორი:
                <input type="text" class="author" name="authors[]" multiple>
            </label>
            <label>
                წიგნის სახელი:
                <input name="title" type="text">
            </label>
            <label>
                გამოშვების წელი:
                <input name="release_date" type="date">
            </label>
            <label>
                სტატუსი:
                <select name="available">
                    <option value="1">თავისუფალი</option>
                    <option value="0">დაკავებული</option>
                </select>
            </label>
            <button>create</button>
        </form>
    </section>
    <script>
        console.log(document.querySelector(".authors_container"));
    </script>
</x-layout>
