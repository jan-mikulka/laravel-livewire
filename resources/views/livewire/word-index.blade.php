<div class="m-auto w-1/2">
    <div wire:offline>
        You are offline
    </div>


    @foreach ($words as $word)
        <div class="mt-5 p-3" wire:key="{{$word->id}}">
            <h3 class="text-2xl text-blue-500 mb-3 hover:text-blue-700"
                wire:offline.class.remove="text-blue-500 hover:text-blue-700" wire:offline.class="bg-red-500">
                <a href="/words/{{$word->id}}">{{$word->title}}</a>
            </h3>
            <p>
                {{ str($word->content)->words(30) }}
            </p>
        </div>
    @endforeach
</div>