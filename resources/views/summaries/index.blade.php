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
            <div class="panel panel-default">
                <div class="panel-body p-30">

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
            <div class="box box-primary">
                <div class="panel panel-default">
                    <div class="panel-heading">创建总结</div>
                    <div class="panel-body">
                        <div class="mx-auto text-center">
                            <a href="{{ route('summaries.create', ['type' => 'common']) }}" class="btn btn-default btn-block create-summary-btn">
                                <i class="glyphicon glyphicon-plus"></i> 创建通用模板总结
                            </a>
                            @if(Auth::user()->department_id === 11)
                                <a href="{{ route('summaries.create', ['type' => 'resource']) }}" class="btn btn-default btn-block create-summary-btn">
                                    <i class="glyphicon glyphicon-plus"></i> 创建资源模板总结
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection