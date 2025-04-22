<div class="container mx-auto mt-12">
    <h1 class="text-4xl font-bold mb-6">ক্রিকেট</h1>
    <div class="grid grid-cols-1 md:grid-cols-[70%,30%] gap-6">
        <!-- Cricket News Section (Left Side) -->
        <div class="grid grid-cols-1 gap-6">
            <div class="rounded-lg shadow mb-6">
                <img src="{{ Storage::url($news->image) }}" alt="News Image" class="w-full rounded-lg">
                {{-- <img src="{{ $news->image }}" alt="News Image" class="w-full rounded-lg"> --}}
                <div class="text-2xl font-bold mt-4">{{ $news->title }}</div>
                <div class="text-gray-700 mt-2">{{ $news->content }}</div>
            </div>
        </div>

        <!-- Most Read News Section (Right Side) -->
        <div class="">
            <h2 class="text-4xl font-bold mb-4">সর্বশেষ</h2>
            <div class="rounded-lg shadow mb-6 ">
                @foreach ($lastNews as $news)
                    <div class="flex my-2">
                        <!-- Image Section -->
                        <img src="{{ Storage::url($news->image) }}" alt="News Image" class="w-1/3 rounded-lg">

                        <!-- Text Section -->
                        <div class="ml-4 w-2/3">
                            <div class="text-2xl font-bold">{{ $news->title }}</div>
                            <div class="text-gray-700 mt-2">
                                {{ Str::limit($news->content, 100, '...') }}
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>

        </div>
    </div>
</div>
