<x-layout>
    <section class="m-auto">
        <form method="GET" action="{{ route('home') }}" class="m-10 flex justify-between items-center">
            <label class="search text-white">
                მოძებნე:
                <input name="search" type="text" value="{{ $search }}"
                    class="text-white bg-transparent border border-gray-700 rounded-lg outline-none p-2 text-lg">
            </label>
            <div>
                <select class="p-2 bg-transparent rounded-lg outline-none border border-gray-800">
                    <option>ავტორების სია</option>
                    @foreach ($authors as $author)
                        <option disabled>{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
        </form>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-10">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            სათაური
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ავტორი(ავტორები)
                        </th>
                        <th scope="col" class="px-6 py-3">
                            გამოშვების დრო
                        </th>
                        <th scope="col" class="px-6 py-3">
                            სტატუსი
                        </th>
                        <th scope="col" class="px-6 py-3">
                            მოქმედება
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $book->title }}
                            </th>
                            <td class="px-6 py-4 dark:text-white">
                                @foreach ($book->authors as $author)
                                    | {{ $author->name }}
                                @endforeach
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                {{ $book->release_date }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                {{ $book->available ? 'თავისუფალი' : 'დაკავებული' }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('books.edit', ['book' => $book->id]) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">რედაქტირება</a>
                                <form method="POST" action="{{ route('books.destroy', ['book' => $book->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        წაშლა</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</x-layout>
