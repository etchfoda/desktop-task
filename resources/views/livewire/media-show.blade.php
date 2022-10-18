<div>
    <h4>Title: <b>{{ $media->title }}</b></h4>
    @if($media instanceof \App\Models\Video)
        <video class="video-js" controls preload="auto" data-setup="{seeking: true}">
            <source src="{{ asset("storage/{$media->path}") }}" type="video/mp4"/>
            <p class="vjs-no-js">
                To view this video please enable JavaScript, and consider upgrading to a
                web browser that
                <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
            </p>
        </video>
    @elseif($media instanceof \App\Models\Voice)
        <audio class="video-js" controls width="400" height="60" preload="auto"
               data-setup="{seeking: true, audioOnlyMode: true}">
            <source src="{{ asset("storage/{$media->path}") }}" type="audio/mp3"/>
            <p class="vjs-no-js">
                To view this video please enable JavaScript, and consider upgrading to a
                web browser that
                <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
            </p>
        </audio>
    @endif

    <livewire:comment-list :media="$media"/>
</div>
