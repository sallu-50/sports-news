<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }} - নিউজ সাইট</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

<body class="bg-gray-100">
    <div class="bg-gray-200 text-gray-700 text-center p-2 text-2xl">
        <span id="current-date"></span>
    </div>
    <x-navbar />

    <div class="container mx-auto mt-12">
        <h1 class="text-4xl font-bold mb-6">{{ $category->name }}</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse ($articles as $article)
                <div class="rounded-lg shadow mb-6">
                    <img src="{{ Storage::url($article->image) }}" alt="News Image"
                        class="w-full h-[200px] object-cover rounded-lg">
                    <div class="p-4">
                        <div class="text-2xl font-bold mt-4">
                            <a href="{{ route('news.details', $article->id) }}">{{ $article->title }}</a>
                        </div>
                        <div class="text-gray-700 mt-2">
                            <a href="{{ route('news.details', $article->id) }}">{{ Str::limit($article->content, 100, '...') }}</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 text-center text-xl">No articles found in this category.</p>
            @endforelse
        </div>
        <div class="mt-8">
            {{ $articles->links() }}
        </div>
    </div>

    <x-footer></x-footer>

    <script>
        document.getElementById("current-date").innerText = new Date().toLocaleDateString("bn-BD", {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });

        document.getElementById("menu-toggle").addEventListener("click", function() {
            document.getElementById("menu").classList.toggle("hidden");
        });
    </script>
</body>

</html>
