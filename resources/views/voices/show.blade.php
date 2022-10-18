@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Voice Show') }}</div>
                    <div class="card-body">
                        <livewire:media-show :media="$voice"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
