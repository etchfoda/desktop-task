<form wire:submit.prevent="saveVoice">
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
                <label for="voiceTitle">Title</label>
                <input class="form-control" id="voiceTitle" wire:model="title"/>
                @error('title') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="voiceFile">Voice</label>
                <input class="form-control" id="voiceFile" wire:model="voice" type="file" accept="audio/*"/>
                @error('voice') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-auto mt-md-4">
            <button class="btn btn-success" type="submit">Save</button>
        </div>
        <div wire:loading wire:target="voice">Uploading...</div>
    </div>
</form>
