@extends('layouts.app')
@section('title', '用户管理')

@section('nav')
    <ol class="breadcrumb">
        <li><a href="/">首页</a></li>
        <li class="active">用户管理</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">

                    @foreach ($users as $user)
                        <div class="user-box">

                            <div class="attr-item user-avatar">
                                <a href="{{ route('users.show', $user->id) }}">
                                    <img src="{{ $user->gravatar(50) }}" class="img-circle" alt="">
                                </a>
                            </div>

                            <div class="attr-item user-name-email px-10">
                                <div>
                                    <a href="{{ route('users.show', $user->id) }}"><b>{{ $user->name }}</b></a>
                                    @if(!$user->activated)
                                        <span class="label label-warning">未激活</span>
                                    @endif
                                </div>
                                <div>
                                    <small class="text-muted">
                                        <a href="mailto:{{ $user->email }}"
                                           class="text-muted">{{ $user->email }}</a>
                                    </small>
                                </div>
                            </div>

                            <div class="flex-item text-muted user-dpl px-10">
                                <div>
                                    <span>{{ $user->department ? $user->department->name : '' }}</span>
                                    @if($user->level)
                                        <span class="mx-5">&middot;</span>
                                        <span>{{ $user->level ? $user->level->name : '' }}</span>
                                    @endif
                                </div>
                                <div>
                                    @if($user->posts)
                                        @foreach($user->posts as $post)
                                            <small class="mr-10 inline-block">{{ $post->name }}</small>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="flex-item text-muted user-report px-10">
                                <div>{{ $user->report ? $user->report->name : '无' }}</div>
                            </div>

                            <!-- Split button -->
                            <div class="flex-item user-actions">
                                @can('destroy', $user)
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-default btn-sm mb-5">
                                    <i class="glyphicon glyphicon-edit"></i> 编辑
                                </a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-default btn-sm">
                                        <i class="glyphicon glyphicon-trash"></i> 删除
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </div>
                    @endforeach

                    <div class="user-pages">
                        {!! $users->render() !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="box box-primary">
                <div class="panel panel-default">
                    <div class="panel-heading">筛选</div>
                    <div class="panel-body">
                        ...
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop