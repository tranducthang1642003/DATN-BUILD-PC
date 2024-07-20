@include('public.header.index')
<p>

<h1 class="text-center text-4xl font-bold my-8">Tin tức công nghệ</h1>
</p>
<section class="container mx-auto py-8 p-10">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach ($projects as $blog)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-8">
                <img class="w-full h-64 object-cover object-center" src="{{ $blog->blog_image }}" alt="{{ $blog->title }}">
                <div class="p-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">{{ $blog->title }}</h1>
                    <div class="px-6 py-4">
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#{{ $blog->category_blog->name }}</span>
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">{{ $blog->created_at->format('d-m-Y') }}</span>
                    </div>
                    <p class="text-gray-700 text-base overflow-hidden" style="-webkit-line-clamp: 4; -webkit-box-orient: vertical; display: -webkit-box;">
                        {{ Str::limit(strip_tags($blog->content), 200) }}
                    </p>
                    <div class="mt-4">
                        <a href="{{ route('blog.project_show', $blog->slug) }}" class="inline-block bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Xem thêm </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

@include('public.footer.footer')
