<div>
    <div class="d-flex justify-content-between align-items-center">
        <h1>Posts</h1>
        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createPostModal">
            + Create
        </button>
    </div>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Author</th>
                <th scope="col">Is Pushished?</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr wire:key="{{ $post->id }}">
                <th scope="row">{{ $loop->index + 1 }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
                <td>{{ $post->author }}</td>
                <td>{{ $post->is_published == 1 ? "Yes" : "No" }}</td>
                <td>
                    <button @click="$dispatch('edit-mode',{id: {{ $post->id }} })" data-bs-toggle="modal" data-bs-target="#createPostModal" class="btn btn-sm btn-success">Edit</button>
                    <button @click="$dispatch('delete-post',{id: {{ $post->id }} })" wire:confirm="Are you sure?" class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <livewire:post.create>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Livewire.on('refresh-posts', function () {
            var modalEl = document.getElementById('createPostModal');
            if (modalEl) {
                var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
                modal.hide();
            }
        });
    });
</script>
@endpush