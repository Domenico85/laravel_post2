<x-layout>

    <main class="container post-container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <section class="row ">
            <article class="col-12 text-center">
                <h1 class="text-white">Post Detail</h1>

                <p><strong class="text-danger">Title:</strong>{{ $post->title }}</p>
                <p><strong class="text-danger">Description:</strong>{{ $post->description }}</p>
                <p><strong class="text-danger">Created by:</strong>{{ $post->user->name }}</p>

                @auth
                    @if (Auth::user()->id === $post->user_id)
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateForm">Modify
                            Post</button>
                    @endif

                @endauth
            </article>

        </section>
    </main>


    <div class="modal fade" id="updateForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modify your post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('post_update', ['post' => $post]) }}">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="title"
                                value="{{ $post->title }}">

                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $post->description }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

</x-layout>
