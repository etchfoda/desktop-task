<div class="mt-2">
    {{--@isset($comments)--}}
    <div class="card p-3 mb-1">
        @auth
            <livewire:comment-form :media="$media"/>
        @else
            <h4>
                Please <a href="{{ route('login') }}">login</a> to make new comment
            </h4>
        @endauth
    </div>
    @foreach($comments as $comment)
        <livewire:comment :comment="$comment" :wire:key="$comment->id"/>
    @endforeach
    {{--@endisset--}}
</div>

