<div class="container mx-auto mt-12">
    <h1 class="text-4xl font-bold mb-6">অন্যখেলা</h1>
    <section class="">

        @if (!empty($otherSportsNews) && $otherSportsNews->isNotEmpty())
            <div class="container mx-auto mt-8 grid grid-cols-1">
                @foreach ($otherSportsNews as $news)
                    <div class="rounded-lg shadow mb-6">
                        <img src="{{ Storage::url($news->image) }}" alt="News Image"
                            class="w-full h-[400px] object-cover rounded-lg">
                        <div class="text-2xl font-bold mt-4">
                            <a href="{{ route('news.details', $news->id) }}">{{ $news->title }}</a>
                        </div>
                        <div class="text-gray-700 mt-2">
                            <a href="{{ route('news.details', $news->id) }}">
                                {{ Str::limit($news->content, 300, '...') }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 text-center text-xl">এই ক্যাটাগরিতে কোনো পোস্ট নেই।</p>
        @endif



    </section>
    <div class="grid grid-cols-1 mt-14">
        <!-- Cricket News Section (Left Side) -->
        @if (!empty($otherSportsNews) && $otherSportsNews->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @foreach ($otherSportsNews as $news)
                    <div class="rounded-lg shadow mb-6">
                        <img src="{{ Storage::url($news->image) }}" alt="News Image"
                            class="w-full h-[150px] object-cover rounded-lg">
                        <div class="text-2xl font-bold mt-4"><a
                                href="{{ route('news.details', $news->id) }}">{{ $news->title }}</a></div>
                        <div class="text-gray-700 mt-2"><a
                                href="{{ route('news.details', $news->id) }}">{{ Str::limit($news->content, 100, '...') }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 text-center text-xl">এই ক্যাটাগরিতে কোনো পোস্ট নেই।</p>
        @endif






    </div>
</div>
</div>
