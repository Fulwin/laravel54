@extends('layouts.default')
@section('title', request('type') === 'common' ? '创建通用模板总结' : '创建资源模板总结')

@section('nav')
    <ol class="breadcrumb">
        <li><a href="/">首页</a></li>
        <li><a href="{{ route('summaries.index') }}">工作总结</a></li>
        <li class="active">
            {{ request('type') === 'common' ? '创建通用模板总结' : '创建资源模板总结' }}
        </li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body p-30">
                    <form action="/summaries" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>标题</label>
                            <input type="text" name="title" class="form-control" placeholder="标题">
                        </div>
                        <div class="form-group">
                            <label>本周总结</label>
                            <textarea name="content" rows="10" class="form-control w-100" placeholder="本周总结内容"></textarea>
                        </div>
                        <div class="form-group">
                            <label>下周任务</label>
                            <textarea name="next_week_mission" rows="10" class="form-control w-100" placeholder="下周工作任务"></textarea>
                        </div>
                        <div class="form-group">
                            <label>协调事项</label>
                            <textarea name="coordination" rows="10" class="form-control w-100" placeholder="需要其他部门辅助或协调的事项"></textarea>
                        </div>
                        @if(count($errors) > 0)
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary">提交</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="box box-primary">
                <div class="panel panel-default">
                    <div class="panel-body">
                        ...
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection