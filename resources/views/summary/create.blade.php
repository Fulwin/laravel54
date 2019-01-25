@extends('layouts.default')

@section('content')
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
                    <textarea name="content" rows="10" class="form-control" placeholder="本周总结内容"></textarea>
                </div>
                <div class="form-group">
                    <label>下周任务</label>
                    <textarea name="next_week_mission" rows="10" class="form-control" placeholder="下周工作任务"></textarea>
                </div>
                <div class="form-group">
                    <label>协调事项</label>
                    <textarea name="coordination" rows="10" class="form-control" placeholder="需要其他部门辅助或协调的事项"></textarea>
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
@endsection