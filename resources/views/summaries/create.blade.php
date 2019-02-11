@extends('layouts.app')
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
        <div class="col-md-8 main">
            <div class="panel panel-default">
                <div class="panel-body">
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

                        <div class="form-group">
                            <label>收件人</label>
                            <div class="users-container">
                                <div class="user-box">
                                    <div class="user-avatar">
                                        <img src="{{ Auth::user()->report->gravatar(50) }}" class="img-circle" alt="">
                                    </div>
                                    <div class="user-infos">
                                        <div class="user-heading">
                                            <span class="user-name">{{ Auth::user()->report->name }}</span>
                                        </div>
                                        <div class="user-body">
                                            <small>{{ implode('/', Auth::user()->posts->pluck('name')->toArray()) }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>抄送人</label>
                            @include('shared._user_selector')
                        </div>

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

@section('scripts')
    <script>
        $('.users-container .insert-user').click(function() {
            layer.open({
                type: 1,
                title: '选择用户',
                area: ['100%', '100%'],
                scrollbar: false,
                content: `
<div class="panel panel-default panel-tabs no-bordered">
    <div class="panel-heading">
        <ul role="tablist" class="nav nav-tabs">
            @foreach($departments as $department)
            <li role="presentation" class="{{ Auth::user()->department_id == $department->id ? 'active' : '' }}">
                <a href="#{{ $department->name }}" aria-controls="{{ $department->name }}" role="tab" data-toggle="tab">{{ $department->name }}</a>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="panel-body">
        <div class="tab-content">
            @foreach($departments as $department)
            <div role="tabpanel" id="{{ $department->name }}" class="tab-pane {{ Auth::user()->department_id == $department->id ? 'active' : '' }}">
                <div class="users-container">
                @foreach($department->users as $user)
                    <div class="user-box">
                        <div class="user-avatar">
                            <img src="{{ $user->gravatar(50) }}" class="img-circle" alt="">
                        </div>
                        <div class="user-infos">
                            <div class="user-heading">
                                <span class="user-name">{{ $user->name }}</span>
                            </div>
                            <div class="user-body">
                                <small>{{ implode('/', $user->posts->pluck('name')->toArray()) }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
                `,
            })
        })
    </script>
@endsection