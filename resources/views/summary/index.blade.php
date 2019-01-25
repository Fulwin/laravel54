@extends('layouts.default')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-hover mb-0">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">标题</th>
                    <th scope="col">内容</th>
                    <th scope="col">创建时间</th>
                </tr>
                </thead>
                <tbody>
                @foreach($summaries as $summary)
                    <tr>
                        <th>{{ $summary->id }}</th>
                        <td>
                            <a href="/summaries/{{ $summary->id }}">{{ $summary->title }}</a>
                        </td>
                        <td>{{ str_limit($summary->content, 70, '...') }}</td>
                        <td>{{ $summary->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $summaries->links() }}
        </div>
    </div>
@endsection