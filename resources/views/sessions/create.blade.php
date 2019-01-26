@extends('layouts.app')
@section('title', '登录')

@section('content')
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5>登录</h5>
                </div>
                <div class="panel-body">
                    @include('shared._errors')

                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="email">邮箱：</label>
                            <input type="text" name="email" class="form-control" placeholder="邮箱" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label for="password">密码：</label>
                            <input type="password" name="password" class="form-control" placeholder="密码" value="{{ old('password') }}">
                        </div>

                        <div class="checkbox">
                            <label><input type="checkbox" name="remember"> 记住我</label>
                        </div>

                        <button type="submit" class="btn btn-primary">登录</button>
                    </form>

                    <hr>

                    <p>还没账号？<a href="mailto:developer.fulwin@outlook.com">联系管理员</a>获得账号！</p>
                </div>
            </div>
        </div>
    </div>
@stop