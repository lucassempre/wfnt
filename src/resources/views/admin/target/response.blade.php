@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
                    
            <div class="card">
                <div class="card-header">{{ __('Targets Response') }}</div>
                <div class="card-body">
                    <div class="float-left pb-2 w-100">
                        <form method="GET" action="">
                            <div class="input-group">
                                <input  id="search" name="search" value="{{ Request::get('search') }}" type="text" class="form-control" placeholder="RAW, IP">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-secondary">Search!</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="accordion">
                        @forelse ($responses as $item)
                        <div class="card">
                            <div class="card-header" id="heading{{$item->id}}">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapse{{$item->id}}">
                                        {{$item->id}} - {{$item->created_at}} 
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse{{$item->id}}" class="collapse" aria-labelledby="heading{{$item->id}}" data-parent="#accordion">
                                <div class="card-body">
                                    {{$item->raw}}
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="card">
                            <div class="card-body">
                                    Not found Tagerts
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
                @if($responses->hasPages())
                <div class="card-footer">
                    
                    <small class="text-muted">{{ $responses->appends(request()->query())->links() }}</small>

                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection