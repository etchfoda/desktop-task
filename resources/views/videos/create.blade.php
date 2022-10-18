@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Video Create') }}</div>
                    <div class="card-body">
                        <livewire:video-form/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
