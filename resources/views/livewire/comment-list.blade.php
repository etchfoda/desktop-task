<div class="mt-2">
    {{--@isset($comments)--}}
    <div class="card p-3 mb-1">
        @auth
            @if(auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && is_null(auth()->user()->email_verified_at))
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif

                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }},
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                </form>
            @else
                <livewire:comment-form :media="$media"/>
            @endif
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

