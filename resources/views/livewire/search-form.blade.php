<div class="relative mt-2 md:mt-0 w-full md:w-auto">
    <form class="relative">
        <input type="text" wire:model.live.debounce.300ms="query" placeholder="সার্চ করুন..."
            class="w-full md:w-64 p-2 pr-10 rounded-lg text-black border" required>
        <button type="submit" class="absolute right-2 top-2 text-gray-600">
            <i class="fas fa-search"></i>
        </button>
    </form>


    @if ($query)
        <ul class="absolute bg-white text-black w-full mt-1 rounded shadow-md z-10">
            @forelse ($this->results as $news)
                <li class="p-2 border-b hover:bg-gray-200 cursor-pointer">
                    <a href="{{ url('/article/' . $news->slug) }}">{{ $news->title }}</a>

                </li>
            @empty
                <li class="p-2 text-gray-600">কোনও ফলাফল পাওয়া যায়নি।</li>
            @endforelse
        </ul>
    @endif
</div>
