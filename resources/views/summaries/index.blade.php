@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">

                    @foreach($summaries as $summary)
                    <div class="summary-box clearfix">
                        <div class="pull-left mr-20">
                            <img src="{{ $summary->user->gravatar() }}" class="img-circle" width="50" alt="">
                        </div>

                        <div class="pull-left">
                            <div class="summary-title">
                                <a href="{{ route('summaries.show', $summary->id) }}">{{ $summary->title }}</a>
                            </div>
                            <small class="text-muted">
                                <span>{{ $summary->user->name }}</span>
                                <span>发布于</span>
                                <span>{{ $summary->published_at }}</span>
                            </small>
                        </div>

                        @can('destroy', $summary)
                        <div class="pull-right">
                            <form action="{{ route('summaries.destroy', $summary->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-default btn-sm">
                                    <i class="glyphicon glyphicon-trash"></i> 删除
                                </button>
                            </form>
                        </div>
                        @endcan
                    </div>
                    @endforeach

                    {{ $summaries->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    ...
                </div>
            </div>
        </div>
    </div>
@endsection