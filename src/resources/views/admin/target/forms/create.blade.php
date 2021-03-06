@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Target') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('targets.store')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="target" class="col-md-4 col-form-label text-md-right">{{ __('Target') }}</label>

                            <div class="col-md-6">
                                <input id="target" type="text" class="form-control @error('target') is-invalid @enderror" name="target" value="{{ old('target') }}" autofocus>

                                @error('target')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="key" class="col-md-4 col-form-label text-md-right">{{ __('key') }}</label>

                            <div class="col-md-6">
                                <input id="key" type="text" class="form-control @error('key') is-invalid @enderror" name="key" value="{{ old('key') }}" required>

                                @error('key')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="origin" class="col-md-4 col-form-label text-md-right">{{ __('Origin') }}</label>

                            <div class="col-md-6">
                                <input id="origin" type="text" class="form-control @error('origin') is-invalid @enderror" name="origin">

                                @error('origin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="body_type" class="col-md-4 col-form-label text-md-right">{{ __('Body Type') }}</label>

                            <div class="col-md-6">
                                <input id="body_type" type="text" class="form-control @error('body_type') is-invalid @enderror" name="body_type">

                                @error('body_types')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
                            <div class="col-auto my-1">
                                <select class="custom-select mr-sm-2" name="status">
                                    <option value="1" selected>Select...</option>
                                    <option value="1">Active</option>
                                    <option value="0">Deactivate</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="one_to_one" class="col-md-4 col-form-label text-md-right">{{ __('Run only once') }}</label>
                            <div class="col-auto my-1">
                                <select class="custom-select mr-sm-2" name="one_to_one">
                                    <option value="0" selected>Select...</option>
                                    <option value="1">Active</option>
                                    <option value="0">Deactivate</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="show_by_origin" class="col-md-4 col-form-label text-md-right">{{ __('Show content according the configured origin') }}</label>
                            <div class="col-auto my-1">
                                <select class="custom-select mr-sm-2" name="show_by_origin">
                                    <option value="0" selected>Select...</option>
                                    <option value="1">Active</option>
                                    <option value="0">Deactivate</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="body_response">Body Response</label>
                            <textarea name="body" class="form-control" id="body_response" rows="3"></textarea>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
