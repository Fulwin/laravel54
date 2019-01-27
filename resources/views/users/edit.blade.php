@extends('layouts.app')
@section('title', '修改用户资料')

@section('nav')
    <ol class="breadcrumb">
        <li><a href="/">首页</a></li>
        <li><a href="{{ route('users.index') }}">用户管理</a></li>
        <li class="active">编辑用户</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">修改用户资料</div>
                <div class="panel-body">

                    @include('shared._errors')

                    <div class="gravatar_edit">
                        <a href="http://gravatar.com/emails" target="_blank">
                            <img src="{{ $user->gravatar('200') }}" alt="{{ $user->name }}" class="gravatar"/>
                        </a>
                    </div>

                    <form method="POST" action="{{ route('users.update', $user->id )}}">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="account">账号：</label>
                            <input type="text" name="account" class="form-control" value="{{ $user->account }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="name">名称：</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        </div>

                        <div class="form-group">
                            <label for="email">邮箱：</label>
                            <input type="text" name="email" class="form-control" value="{{ $user->email }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="gender">性别：</label>
                            <div class="radio">
                                <label style="margin-right: 20px;">
                                    <input type="radio" name="gender"
                                           value="1" {{ $user->gender == 1 ? 'checked' : '' }}>男
                                </label>
                                <label>
                                    <input type="radio" name="gender"
                                           value="0"  {{ $user->gender == 0 ? 'checked' : '' }}>女
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">更新</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop