@extends('layouts.app')
@section('title', $user->name)

@section('nav')
    <ol class="breadcrumb">
        <li><a href="/">首页</a></li>
        <li><a href="{{ route('users.index') }}">用户管理</a></li>
        <li class="active">{{ $user->name }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body pt-30">
                    <div class="text-center">
                        <img src="{{ $user->gravatar(120) }}" class="thumbnail mx-auto mb-20" alt="">
                        <div>
                            <h4>{{ $user->name }}</h4>
                            <p>
                                <a href="matilto:{{ $user->email }}" class="text-muted">
                                    <i class="glyphicon glyphicon-envelope"></i> {{ $user->email }}
                                </a>
                            </p>
                            <p>
                                <span>{{ $user->department ? $user->department->name : '' }}</span>
                                @if($user->level)
                                    <span class="mx-5">&middot;</span>
                                    <span>{{ $user->level ? $user->level->name : '' }}</span>
                                @endif
                            </p>
                            <p>
                                @if($user->posts)
                                    @foreach($user->posts as $post)
                                        <span class="label label-info">{{ $post->name }}</span>
                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="panel panel-default panel-tabs">
                <div class="panel-heading">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                Home
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile">
                                Profile
                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages">
                                Messages
                            </div>
                            <div role="tabpanel" class="tab-pane" id="settings">
                                Settings
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Ta的审批</div>
                <div class="panel-body">
                    ...
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Ta的项目</div>
                <div class="panel-body">
                    ...
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Ta的待办事项</div>
                <div class="panel-body">
                    ...
                </div>
            </div>
        </div>
    </div>
@stop