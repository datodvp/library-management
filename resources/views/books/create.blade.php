<x-layout>
    <section class="w-[80%] m-auto text-white">
        <form method="POST" action="{{ route('books.store') }}" class="grid p-3 border border-gray-700 rounded-md">
            @csrf
            @method('post')
            <div>წიგნის ავტორი(ავტორები):</div>
            <div class="authors_container flex flex-col w-[30%]"><input type="text" placeholder="შოთა რუსთაველი..."
                    required class="author bg-transparent p-2 outline-none border border-gray-800 rounded-lg m-1"
                    name="authors[]">
            </div>
            <div class="p-1">
                <button type="button" onclick="addInputField()"
                    class="px-4 py-2 border border-gray-800 rounded-lg">+</button>
                <button type="button" onclick="removeInputField()"
                    class="px-5 py-2 border border-gray-800 rounded-lg">-</button>
            </div>
            <label class="w-max">
                წიგნის სახელი:
                <input name="title" type="text" required
                    class="author bg-transparent p-2 outline-none border border-gray-800 rounded-lg m-1">
            </label>
            <label class="w-max">
                გამოშვების თარიღი:
                <input name="release_date" type="date" required
                    class="author bg-transparent p-2 outline-none border border-gray-800 rounded-lg m-1">
            </label>
            <label>
                სტატუსი:
                <select name="available" class="p-2 bg-transparent outline-none border border-gray-800 rounded-lg">
                    <option value="1" class="bg-gray-500">თავისუფალი</option>
                    <option value="0" class="bg-gray-500">დაკავებული</option>
                </select>
            </label>
            <button class="w-max p-2 bg-gray-900 rounded-lg my-5">დამატება</button>
        </form>
    </section>
    <script>
        function addInputField() {
            const authorsContainer = document.querySelector(".authors_container");
            const input = document.createElement('input');
            input.setAttribute('type', 'text');
            input.setAttribute('name', 'authors[]');
            input.setAttribute('placeholder', 'შოთა რუსთაველი...');
            input.setAttribute('required', true);
            input.classList.add('bg-transparent', 'p-2', 'outline-none', 'border', 'border-gray-800', 'rounded-lg', 'm-1');
            authorsContainer.appendChild(input);
            console.log(input);
        }

        function removeInputField() {
            const authorsContainer = document.querySelector(".authors_container");
            if (authorsContainer.children.length !== 1) {
                authorsContainer.removeChild(authorsContainer.lastChild);
            }
        }
    </script>
</x-layout>
