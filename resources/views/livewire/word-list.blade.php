<div class="m-auto mb-4 bg-white p-4 rounded-lg shadow">
    <div class="mb-3 flex justify-between items-center">
        <a href="/dashboard/words/create" class="text-blue-500 hover:text-blue-700" wire:navigate>
            Create Word
        </a>
    </div>
    @if (session('status'))
        <div class="text-center bg-green-400 text-gray-800 p-2 rounded">
            {{ session('status') }}
        </div>
    @endif
    <div class="my-3">
        {{$words->links()}}
    </div>
    <table class="w-full">
        <thead class="text-xs uppercase bg-gray-200 text-gray-700">
            <tr>
                <th class="px-6 py-3">Title</th>
                <th class="px-6 py-3">Content</th>
                <th class="px-6 py-3">Languages</th> {{-- Added Language column --}}
                <th class="px-6 py-3"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($words as $word)
                <tr wire:key="{{$word->id}}" class="hover:bg-gray-100">
                    <td class="px-6 py-3">{{$word->name}}</td>
                    <td class="px-6 py-3">{{$word->content}}</td>
                    <td class="px-6 py-3">
                        @foreach($word->languages as $language)
                            <span
                                class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-900">{{ $language->name }}</span>
                        @endforeach
                    </td> {{-- Added language chips --}}
                    <td class="px-6 py-3 flex items-center">
                        <a class="p-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-sm"
                            href="/dashboard/words/{{$word->id}}/edit" wire:navigate>
                            Edit
                        </a>
                        <button class="p-2 ml-2 bg-red-400 hover:bg-red-600 text-gray-800 rounded-sm"
                            wire:click="delete({{$word->id}})" wire:confirm="Are you sure you want to delete this word?">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{$words->links()}}
    </div>
</div>