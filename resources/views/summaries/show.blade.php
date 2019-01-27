@extends('layouts.app')
@section('title', $summary->title)
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/simditor.css') }}">
@stop

@section('nav')
    <ol class="breadcrumb">
        <li><a href="/">首页</a></li>
        <li><a href="{{ route('summaries.index') }}">工作总结</a></li>
        <li class="active">{{ $summary->title }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body p-30">

                    <h3 class="mb-20 mt-0">{{ $summary->title }}</h3>

                    <div class="clearfix">
                        <div class="pull-left">
                            <div class="text-muted">
                                <b>{{ $summary->typeText }}</b>
                                <small class="mx-5">&middot;</small>
                                <small>创建于 {{ $summary->created_at }}</small>
                                <small class="mx-5">/</small>
                                <small>评论数 0</small>
                                @if($summary->updated_at)
                                    <small class="mx-5">/</small>
                                    <small>更新于 {{ $summary->updated_at }}</small>
                                @endif
                            </div>
                        </div>

                        @can('destroy', $summary)
                        <div class="pull-right">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <a href="{{ route('summaries.edit', $summary->id) }}" class="btn btn-default btn-xs mr-10">
                                        <i class="glyphicon glyphicon-edit"></i> 编辑
                                    </a>
                                </div>

                                <div class="pull-left">
                                    <form action="{{ route('summaries.destroy', $summary->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-default btn-xs">
                                            <i class="glyphicon glyphicon-trash"></i> 删除
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endcan

                    </div>

                    <hr>

                    <div class="section-box">
                        <blockquote>总结内容</blockquote>
                        <p>{{ $summary->content }}</p>
                    </div>

                    <div class="section-box">
                        <blockquote>下周任务</blockquote>
                        <p>{{ $summary->next_week_mission }}</p>
                    </div>

                    <div class="section-box">
                        <blockquote>协调事项</blockquote>
                        <p>{{ $summary->coordination }}</p>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading pl-30 pr-30">评论</div>
                <div class="panel-body p-30">
                    <div class="media">
                        <div class="media-left">
                            <img src="{{ $summary->user->gravatar(40) }}" class="img-circle" alt="">
                        </div>
                        <div class="media-body">
                            <div>
                                <span class="text-muted mr-10">{{ $summary->user->name }} 回复于 {{ $summary->created_at->diffForHumans() }}</span>
                                @can('destroy', $summary)
                                <a href="javascript:;" class="btn btn-default btn-xs">
                                    <i class="glyphicon glyphicon-trash"></i> 删除
                                </a>
                                @endcan
                            </div>
                            <div class="mt-5 reply-content">
                                {{ $summary->content }}
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        {{--<div class="media-left">
                            <img src="{{ $summary->user->gravatar(40) }}" class="img-circle" alt="">
                        </div>--}}
                        <div class="media-body">
                            <form action="" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <textarea id="simditor" name="content" rows="5" class="form-control w-100" placeholder="回复内容"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">发表</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="box box-primary">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="row text-muted">
                            <div class="col-md-6">
                                <div class="text-center">
                                    <div class="mb-10">
                                        <img src="{{ $summary->user->gravatar() }}" class="img-circle" width="58" alt="">
                                    </div>
                                    <div>{{ $summary->user->name }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-center">
                                    <h4 class="mb-10">总结数量</h4>
                                    <h2>{{ $summariesCount }}</h2>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">创建总结</div>
                <div class="panel-body">
                    <div class="mx-auto text-center">
                        <a href="{{ route('summaries.create', ['type' => 'common']) }}" class="btn btn-default btn-block create-summary-btn">
                            <i class="glyphicon glyphicon-plus"></i> 创建通用模板总结
                        </a>
                        @if(Auth::user()->department_id === 11)
                            <a href="{{ route('summaries.create', ['type' => 'resource']) }}" class="btn btn-default btn-block create-summary-btn">
                                <i class="glyphicon glyphicon-plus"></i> 创建资源模板总结
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">近期总结</div>
                <div class="list-group">
                    @foreach($latestSummaries as $ls)
                        <a href="{{ route('summaries.show', $ls->id) }}" class="list-group-item">
                            <span>{{ $ls->typeText }}</span>
                            <span class="mx-5">&middot;</span>
                            <span>{{ $ls->title }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript"  src="{{ asset('js/module.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/hotkeys.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/uploader.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/simditor.js') }}"></script>
    <script>
        $(document).ready(function() {
            var simditor = new Simditor({
                textarea: $('#simditor'),
                toolbar: [
                    'bold', 'italic', 'underline', 'strikethrough', 'color', 'ol', 'ul',
                    'blockquote', 'code', 'link', 'image', 'hr', 'indent', 'outdent', 'alignment'
                ],
                placeholder: '在此输入评论内容...',
                upload: {
                    url: '',
                    params: { _token: '{{ csrf_token() }}' },
                    fileKey: 'upload_file',
                    connectionCount: 3,
                    leaveConfirm: '文件上传中，关闭此页面将取消上传'
                },
                pasteImage: true
            });
        });
    </script>
@stop