@extends('layouts.app')
@section('title', '创建用户')

@section('nav')
    <ol class="breadcrumb">
        <li><a href="/">首页</a></li>
        <li><a href="{{ route('summaries.index') }}">用户管理</a></li>
        <li class="active">创建用户</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body p-30">

                    <blockquote class="mt-0">用户创建成功后将会以邮件的形式告知用户，用户需手动去激活账号。</blockquote>

                    @include('shared._errors')

                    <form method="POST" action="{{ route('users.store') }}">

                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="account">账号</label>
                                    <input type="text" name="account" class="form-control" value="{{ old('account') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">姓名</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">邮箱：</label>
                                    <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender">性别</label>
                                    <select name="gender" class="form-control selectpicker show-tick" >
                                        <option value="1" {{ old('gender') ? (old('gender') == 1 ? 'selected' : '') : 'selected' }}>男</option>
                                        <option value="0" {{ old('gender') ? (old('gender') == 0 ? 'selected' : '') : '' }}>女</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>状态</label>
                                    <select name="status" class="form-control selectpicker show-tick">
                                        <option value="1">正式</option>
                                        <option value="2">试用</option>
                                        <option value="-1">离职</option>
                                        <option value="-2">禁用</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>部门</label>
                                    <select name="department_id" class="form-control selectpicker show-tick">
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>级别</label>
                                    <select name="level_id" class="form-control selectpicker show-tick">
                                        @foreach($levels as $level)
                                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>职位</label>
                                    <select name="post_id[]" class="form-control selectpicker show-tick" multiple data-live-search="true" data-max-options="3" title="请选择">
                                        @foreach($posts as $post)
                                            <option value="{{ $post->id }}" {{ old('post_id') ? (in_array($post->id, old('post_id')) ? 'selected' : '') : '' }}>{{ $post->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>汇报关系</label>
                                    <select name="report_id" class="form-control selectpicker show-tick">
                                        <option value="0">无需汇报</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">创建</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="box box-primary">
                <div class="panel panel-default">
                    <div class="panel-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop