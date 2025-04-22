<section class="py-8">
    <div class="container mx-auto mt-8">
        <h1 class="text-4xl font-bold mb-6">টপ নিউজ</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($latestNews as $news)
                <div class="rounded-lg shadow">
                    <img src="{{ Storage::url($news->image) }}" alt="News Image"
                        class="w-full h-[400px] object-cover rounded-lg">

                    <div class="text-2xl font-bold mt-4">
                        <a href="{{ route('news.details', $news->id) }}" class="hover:underline">
                            {{ $news->title }}
                        </a>
                    </div>
                    <div class="text-gray-700 mt-2">
                        <a href="{{ route('news.details', $news->id) }}" class="hover:underline">
                            {{ Str::limit($news->content, 100, '...') }}
                        </a>
                    </div>
                    <div class="text-gray-700 mt-2">
                        👁️ {{ $news->views }} বার পড়া হয়েছে
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</section>
