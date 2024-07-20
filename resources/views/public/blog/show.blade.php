@include('public.header.index')

<section class="container mx-auto py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <img class="w-full h-64 object-cover object-center" src="{{ $blog->blog_image }}" alt="{{ $blog->title }}">
            <div class="p-6">
                <h1 class="text-2xl font-bold text-gray-800">{{ $blog->title }}</h1>
                <div class="flex items-center mt-4">
                    <span class="bg-gray-200 text-gray-700 py-1 px-2 rounded text-sm">{{ $blog->category_blog->name }}</span>
                    <span class="text-gray-600 text-sm ml-2">{{ $blog->created_at->format('d-m-Y') }}</span>
                </div>
                <div class="mt-4 text-gray-700 leading-relaxed">
                    {!! $blog->content !!}
                </div>
            </div>
            <div class="px-6 py-4 bg-gray-100 border-t border-gray-200">
                <a href="{{ route('blog.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 0 1 1 1v3.293l2.146-2.147a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 1.414-1.414L9 7.293V4a1 1 0 0 1 1-1z" clip-rule="evenodd" />
                    </svg>
                    Back to Blog
                </a>
            </div>
        </div>

        {{-- <div class="mt-8">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Related Posts</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($relatedBlogs as $relatedBlog)
                <div class="max-w-xs rounded overflow-hidden shadow-lg">
                    <img class="w-full" src="{{ $relatedBlog->blog_image }}" alt="{{ $relatedBlog->title }}">
                    <div class="px-6 py-4">
                        <div class="font-bold text-lg mb-2">{{ $relatedBlog->title }}</div>
                        <p class="text-gray-700 text-base overflow-hidden" style="-webkit-line-clamp: 5; -webkit-box-orient: vertical; display: -webkit-box;">
                            {!! $relatedBlog->content !!}
                        </p>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        <a href="{{ route('blog.project_show', $relatedBlog->slug) }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Read more</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div> --}}
</section>
