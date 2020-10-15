@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    
            <div class="card">
                <div class="card-header">{{ __('Targets') }}</div>
                <div class="card-body">
                    <div class="float-left pb-2 w-75">
                        <form method="GET" action="">
                            <div class="input-group">
                                <input  id="search" name="search" value="{{ Request::get('search') }}" type="text" class="form-control" placeholder="Origin, Target, Key">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-secondary">Search!</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="float-right pb-2">
                        <a href="{{route('targets.create')}}"  type="submit" class="btn btn-secondary ml-5">New Target</a>
                    </div>
                    <table class="table table-responsive-sm table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Target</th>
                                <th>key</th>
                                <th>Status</th>
                                <th>Origin</th>
                                <th width="80"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($targets as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->target}}</td>
                                    <td>{{$item->key}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>{{$item->origin}}</td>
                                    <td>
                                        <a href="{{route('targets.edit', $item->id)}}" class="btn btn-primary btn-sm mb-2" title="Editar">
                                            <i class="material-icons">Edit</i>
                                        </a>
                                        <a href="{{route('responses', $item->id)}}" class="btn btn-primary btn-sm" title="Responses">
                                            <i class="material-icons">Responses</i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Not found Tagerts</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                </div>
                @if($targets->hasPages())
                <div class="card-footer">
                    
                    <small class="text-muted">{{ $targets->appends(request()->query())->links() }}</small>

                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection