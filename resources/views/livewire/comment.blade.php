@if(!$comment->trashed())
    <div class="card p-3 mb-1">
        <div class="d-flex justify-content-between align-items-center">
            <div class="user d-flex flex-row align-items-center">
                <img src="{{ asset('img/avatar.png') }}" width="30" class="user-img rounded-circle mr-2 me-2">
                <span>
                        <small
                            class="font-weight-bold text-primary">{{ optional($comment->user)->name ?: 'n/a' }}</small>:&nbsp;
                        <b class="font-weight-bold">{{ $comment->content }}</b>
                    </span>
            </div>
            @if($comment->created_at)
                <small>{{ $comment->created_at->diffForHumans() }}</small>
            @endif
        </div>
        @can('delete', $comment)
            <div class="action d-flex justify-content-between mt-2 align-items-center">
                <div class="reply px-4">
                    <button wire:click="deleteComment"
                            onclick="confirm('Are you sure ?') || event.stopImmediatePropagation();"
                            class="btn btn-sm btn-danger">Delete</button>
                </div>
            </div>
        @endcan
    </div>
@endif
