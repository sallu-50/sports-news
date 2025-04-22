<x-layouts.app>
    <div class="max-w-4xl mx-auto px-4 py-6">
        <img src="{{ Storage::url($article->image) }}" alt="News Image" class="w-full rounded-lg">
        <h1 class="text-2xl font-bold mb-4">{{ $article->title }}</h1>
        <p class="text-gray-700 leading-relaxed">{{ $article->content }}</p>

        <div class="mt-10">
            <h2 class="text-xl font-semibold mb-4">Related Posts</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($relatedArticles as $related)
                    <div class="bg-white rounded-2xl shadow-md overflow-hidden transition hover:shadow-lg">
                        <a href="{{ route('news.details', $related->slug) }}">
                            <img src="{{ $related->image ? Storage::url($related->image) : 'https://via.placeholder.com/400x200?text=No+Image' }}"
                                alt="{{ $related->title }}" class="w-full h-48 object-cover rounded-t-lg">

                            <div class="p-4">
                                <h3 class="text-lg font-bold text-gray-800">{{ $related->title }}</h3>
                                <p class="text-sm text-gray-600 mt-2 line-clamp-2">
                                    {{ Str::limit(strip_tags($related->content), 80) }}
                                </p>
                                <span class="text-sm text-blue-500 mt-3 inline-block">Read more →</span>
                            </div>
                        </a>
                    </div>
                @empty
                    <p class="text-gray-500">No related posts found.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-layouts.app>
