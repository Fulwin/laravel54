@extends('layouts.default')
@section('title', '创建用户')

@section('content')
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5>创建用户</h5>
                </div>
                <div class="panel-body">

                    @include('shared._errors')

                    <form method="POST" action="{{ route('users.store') }}">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="account">账号：</label>
                            <input type="text" name="account" class="form-control" value="{{ old('account') }}">
                        </div>

                        <div class="form-group">
                            <label for="name">姓名：</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label for="email">邮箱：</label>
                            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label for="gender">性别：</label>
                            <div class="radio">
                                <label style="margin-right: 20px;">
                                    <input type="radio" name="gender"
                                           value="1" {{ old('gender') ? (old('gender') == 1 ? 'checked' : '') : 'checked' }}>男
                                </label>
                                <label>
                                    <input type="radio" name="gender"
                                           value="0"  {{ old('gender') ? (old('gender') == 0 ? 'checked' : '') : '' }}>女
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">注册</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop