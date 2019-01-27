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

                    <div class="flex flex-heading">
                        <div class="flex-item">头像 / 姓名 / 邮箱</div>
                        <div class="flex-item">部门 / 级别 / 职位</div>
                        <div class="flex-item">汇报关系</div>
                        <div class="flex-item">操作</div>
                    </div>

                    <hr>

                    @foreach ($users as $user)
                        <div class="flex">

                            <div class="flex-item">
                                <div class="clearfix">
                                    <div class="pull-left mr-15">
                                        <div class="clearfix">
                                            <div class="pull-left">
                                                <a href="{{ route('users.show', $user->id) }}">
                                                    <img src="{{ $user->gravatar(44) }}" class="img-circle" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pull-left">
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
                                        {{--<div>
                                            <small class="mr-10">创建于{{ $user->created_at }}</small>
                                        </div>
                                        <div>
                                            <small class="mr-10">更新于{{ $user->updated_at }}</small>
                                        </div>--}}
                                    </div>
                                </div>
                            </div>

                            <div class="flex-item text-muted">
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

                            <div class="flex-item text-muted">
                                <div>{{ $user->report ? $user->report->name : '无' }}</div>
                            </div>

                            <!-- Split button -->
                            <div class="flex-item">
                                <div class="btn-group">
                                    @can('destroy', $user)
                                        <button type="button" class="btn btn-default btn-sm">操作</button>
                                        <button type="button" class="btn btn-default btn-sm dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{ route('users.edit', $user->id) }}">
                                                    <i class="glyphicon glyphicon-edit"></i> 编辑
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" class="delete-user">
                                                    <i class="glyphicon glyphicon-trash"></i> 删除
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="sr-only">
                                            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>
                                        </div>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {!! $users->render() !!}
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