<form wire:submit.prevent="saveComment">
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
                <label for="commentContent">Your Comment</label>
                <textarea class="form-control" id="commentContent" rows="3" wire:model="content"></textarea>
                @error('content') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-auto mt-md-4">
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
    </div>
</form>
