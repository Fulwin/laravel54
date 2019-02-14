@extends('layouts.app')

@section('nav')
    <ol class="breadcrumb">
        <li><a href="/">首页</a></li>
        <li class="active">工作总结</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            @foreach($summaries as $summary)
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="media">
                            <div class="media-left">
                                <img src="{{ $summary->user->gravatar() }}" class="img-circle" width="50" alt="">
                            </div>
                            <div class="media-body">
                                <div class="summary-title">
                                    <a href="{{ route('summaries.show', $summary->id) }}">{{ $summary->title }}</a>
                                </div>
                                <div class="text-muted">
                                    <small>{{ $summary->user->name }}</small>
                                    <small>发布于</small>
                                    <small>{{ $summary->published_at }}</small>
                                </div>
                            </div>
                        </div>

                        {{--<div class="summary-box">
                            <div class="summary-item">
                                <img src="{{ $summary->user->gravatar() }}" class="img-circle" width="50" alt="">
                            </div>

                            <div class="summary-item px-15">
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
                            <div class="summary-item">
                                <form action="{{ route('summaries.destroy', $summary->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-default btn-sm">
                                        <i class="glyphicon glyphicon-trash"></i> 删除
                                    </button>
                                </form>
                            </div>
                            @endcan
                        </div>--}}
                    </div>
                </div>
            @endforeach

            {{ $summaries->links() }}
        </div>

        <div class="col-md-4">
            <div class="box box-primary">
                <div class="panel panel-default">
                    <div class="panel-heading">创建总结</div>
                    <div class="panel-body">
                        <div class="mx-auto text-center">
                            <a href="{{ route('summaries.create', ['type' => 'common']) }}" class="btn btn-default btn-block create-summary-btn">
                                <i class="glyphicon glyphicon-plus"></i> 创建通用模板总结
                            </a>
                            @can('isRD')
                                <a href="{{ route('summaries.create', ['type' => 'resource']) }}" class="btn btn-default btn-block create-summary-btn">
                                    <i class="glyphicon glyphicon-plus"></i> 创建资源模板总结
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection