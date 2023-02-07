@if ($posts->count() > 0)
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse ($posts as $post)
            <div class="shadow">
                <a href="{{ route('posts.index', ['user' => $post->user]) }}"
                    class="font-bold text-black">/{{ $post->user->username }}</a>
                <a href="{{ route('posts.show', ['user' => $post->user, 'post' => $post]) }}">
                    <div>
                        <h3 class="text-sm text-gray-500">{{ $post->title }}</h3>
                        <img src="{{ asset('uploads') . '/' . $post->image }}" alt="Post Image {{ $post->title }}">
                    </div>
                </a>
            </div>
        @empty
            <h1 class="text-center">No hay posts, sigue a alguien para poder ver sus publicaciones en tu feed</h1>
        @endforelse

        <div class="my-10">
            {{ $posts->links() }}
        </div>
    </div>
@else
    <h2 class="text-4xl text-center font-black my-10"> Sin Publicaciones </h2>
@endif
