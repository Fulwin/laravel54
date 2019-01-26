@extends('layouts.app')
@section('title', '所有用户')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>用户列表</h5>
        </div>
        <div class="panel-body">

            @foreach ($users as $user)
            <div class="user-box clearfix">

                <div class="pull-left">
                    <a href="{{ route('users.show', $user->id) }}">
                        <img src="{{ $user->gravatar(68) }}" class="img-circle" alt="">
                    </a>
                </div>

                <div class="pull-left">
                    <div>
                        <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                        @if(!$user->activated)
                            <span class="label label-warning">未激活</span>
                        @endif
                    </div>
                    <div class="text-muted">{{ $user->email }}</div>
                    <div class="text-muted">
                        <small class="mr-10">#{{ $user->id }}</small>
                        <small class="mr-10">创建于{{ $user->created_at }}</small>
                        @if($user->updated_at)
                        <small>更新于{{ $user->updated_at }}</small>
                        @endif
                    </div>
                </div>

                @can('destroy', $user)
                <div class="pull-right">
                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-sm btn-default delete-btn">
                            <i class="glyphicon glyphicon-trash"></i> 删除</button>
                    </form>
                </div>
                @endcan

            </div>
            @endforeach

            {!! $users->render() !!}

        </div>
    </div>
@stop