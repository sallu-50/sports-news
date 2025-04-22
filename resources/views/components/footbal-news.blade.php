<div class="container mx-auto mt-12">
    <h1 class="text-4xl font-bold mb-6">ফুটবল</h1>
    <div class="grid grid-cols-1 md:grid-cols-[70%,30%] gap-6">
        <!-- Cricket News Section (Left Side) -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @if ($footballNews->isEmpty())
                <p class="text-gray-500 text-center text-xl">No football news available.</p>
            @else
                @foreach ($footballNews as $news)
                    <div class="rounded-lg shadow mb-6">
                        <img src="{{ Storage::url($news->image) }}" alt="News Image"
                            class="w-full h-[150px] object-cover rounded-lg">
                        <div class="text-2xl font-bold mt-4">
                            <a href="{{ route('news.details', $news->id) }}">{{ $news->title }}</a>
                        </div>
                        <div class="text-gray-700 mt-2">
                            <a
                                href="{{ route('news.details', $news->id) }}">{{ Str::limit($news->content, 100, '...') }}</a>
                        </div>
                    </div>
                @endforeach
            @endif




        </div>

        <!-- Most Read News Section (Right Side) -->
        <div class="">
            <h2 class="text-4xl font-bold mb-4">সর্বাধিক পঠিত</h2>
            <div class="rounded-lg shadow mb-6 ">
                @if ($topView->isEmpty())
                    <p class="text-gray-500 text-center text-xl">No trending news available.</p>
                @else
                    @foreach ($topView as $news)
                        <div class="flex my-2">
                            <!-- Image Section -->
                            <img src="{{ Storage::url($news->image) }}" alt="News Image"
                                class="w-1/3 h-auto object-cover rounded-lg">

                            <!-- Text Section -->
                            <div class="ml-4 w-2/3">
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
                        </div>
                    @endforeach
                @endif



            </div>

        </div>
    </div>
</div>
