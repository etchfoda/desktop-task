<form wire:submit.prevent="saveVideo">
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-md col-sm-12">
            <div class="form-group">
                <label for="videoTitle">Title</label>
                <input class="form-control" id="videoTitle" wire:model="title"/>
                @error('title') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="videoFile">Video</label>
                <input class="form-control" id="videoFile" wire:model="video" type="file" accept="video/*"/>
                @error('video') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-auto mt-md-4">
            <button class="btn btn-success" type="submit">Save</button>
        </div>
        <div wire:loading wire:target="video">Uploading...</div>
    </div>
</form>
