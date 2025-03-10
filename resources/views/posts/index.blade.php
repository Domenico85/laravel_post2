<x-layout>

    <main class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <section class="row">
            <article class="col-12 text-center">
                <h1 class="text-white">All Posts</h1>
            </article>
            @foreach ($posts as $post)
                <article class="col-12 col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $post->title }}</h5>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('post_show', ['post' => $post]) }}" class="btn btn-primary">View
                                    Detail</a>
                                @auth
                                    @if (Auth::user()->id === $post->user_id)
                                        <form action="{{ route('post_delete', ['post' => $post]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete post</button>
                                        </form>
                                    @endif

                                @endauth
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </section>
    </main>

</x-layout>
