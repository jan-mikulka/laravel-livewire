<div class="m-auto mb-4 bg-white p-4 rounded-lg shadow">
    <div class="mb-3 flex justify-between items-center">
        <a href="/dashboard/books/create" class="text-blue-500 hover:text-blue-700" wire:navigate>
            Create Book
        </a>
    </div>
    @if (session('status'))
        <div class="text-center bg-green-400 text-gray-800 p-2 rounded">
            {{ session('status') }}
        </div>
    @endif
    <div class="my-3">
        {{$books->links()}}
    </div>
    <table class="w-full">
        <thead class="text-xs uppercase bg-gray-200 text-gray-700">
            <tr>
                <th class="px-6 py-3">Title</th>
                <th class="px-6 py-3">Author</th>
                <th class="px-6 py-3">ISBN</th>
                <th class="px-6 py-3">Description</th> {{-- Example field --}}
                <th class="px-6 py-3"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr wire:key="{{$book->id}}" class="hover:bg-gray-100">
                    <td class="px-6 py-3">{{$book->title}}</td>
                    <td class="px-6 py-3">{{$book->author}}</td>
                    <td class="px-6 py-3">{{$book->isbn}}</td>
                    <td class="px-6 py-3">{{$book->description}}</td> {{-- Example field --}}
                    <td class="px-6 py-3 flex items-center">
                        <a class="p-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-sm"
                            href="/dashboard/books/{{$book->id}}/edit" wire:navigate>
                            Edit
                        </a>
                        <button class="p-2 ml-2 bg-red-400 hover:bg-red-600 text-gray-800 rounded-sm"
                            wire:click="delete({{$book->id}})" wire:confirm="Are you sure you want to delete this book?">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{$books->links()}}
    </div>
</div>