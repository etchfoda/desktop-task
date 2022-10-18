<div>
    <div class="row">
        <a href="{{ route("$route.create") }}" class="btn btn-success w-auto">Create</a>
        <div class="col-4  offset-7">
            <input class="form-control" id="searchInput" wire:model="search" placeholder="search"/>
        </div>
    </div>
    <table class="table table-sm mt-2">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Comments</th>
            <th scope="col">User</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($paginated as $media)
            <tr>
                <th scope="row">{{ $media->id }}</th>
                <td>{{ $media->title }}</td>
                <td>{{ $media->comments_count }}</td>
                <td>{{ $media->user->name }}</td>
                <td>
                    <a href="{{ route("$route.show", $media) }}" class="btn btn-outline-primary">View</a>
                    @can('delete', $media)
                        <a wire:click="deleteMedia({{ $media->id }})"
                           onclick="confirm('Are you sure ?') || event.stopImmediatePropagation();"
                           class="btn btn-danger">Delete</a>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $paginated->links() }}
</div>
