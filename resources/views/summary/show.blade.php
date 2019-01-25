@extends('layouts.default')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <h2>{{ $summary->title }}</h2>

            <blockquote>总结内容</blockquote>
            <p>{{ $summary->content }}</p>

            <blockquote>下周任务</blockquote>
            <p>{{ $summary->next_week_mission }}</p>

            <blockquote>协调事项</blockquote>
            <p>{{ $summary->coordination }}</p>
        </div>
    </div>
@endsection