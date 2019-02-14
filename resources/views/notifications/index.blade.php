@extends('layouts.app')

@section('nav')
    <ol class="breadcrumb">
        <li><a href="/">首页</a></li>
        <li class="active">消息通知</li>
    </ol>
@stop

@section('content')
    @if ($notifications->count())
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="list-unstyled notification-list">
                    @foreach ($notifications as $notification)
                        @include('notifications.types._' . snake_case(class_basename($notification->type)))
                    @endforeach

                    {!! $notifications->render() !!}
                </div>
            </div>
        </div>
    @else
        <div class="empty-block">没有消息通知！</div>
    @endif
@endsection