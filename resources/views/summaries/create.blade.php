@extends('layouts.app')
@section('title', request('type') === 'common' ? '创建通用模板总结' : '创建资源模板总结')

@section('nav')
    <ol class="breadcrumb">
        <li><a href="/">首页</a></li>
        <li><a href="{{ route('summaries.index') }}">工作总结</a></li>
        <li class="active">
            {{ request('type') === 'common' ? '创建通用模板总结' : '创建资源模板总结' }}
        </li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8 main">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <form action="/summaries" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>标题</label>
                            <input type="text" name="title" class="form-control" autocomplete="off" placeholder="标题">
                        </div>

                        <div class="form-group">
                            <label>本周总结</label>
                            @if(request('type') == 'common')
                                    <textarea name="content" rows="10" class="form-control w-100"
                                              placeholder="本周总结内容"></textarea>
                            @else
                                <div class="panel panel-default panel-tabs">
                                    <div class="panel-heading">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active">
                                                <a href="#detail1" aria-controls="detail1" role="tab" data-toggle="tab">
                                                    总结内容(1) &times;
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="panel-body">
                                        <div>
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="detail1">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div>
                                                                    <label>工作类型</label>
                                                                </div>
                                                                <select name="summary_resources[1][type]" class="selectpicker" style="width: 100%;">
                                                                    <option value="1">新项目开发</option>
                                                                    <option value="2">生产支持</option>
                                                                    <option value="3">样品准备</option>
                                                                    <option value="4">售前售后支持</option>
                                                                    <option value="5">新物料评估及试产支持</option>
                                                                    <option value="6">客户/销售需求支持</option>
                                                                    <option value="7">其它</option>
                                                                    <option value="8">休假</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div>
                                                                    <label>工作耗时</label>
                                                                </div>
                                                                <input type="text" name="consuming_time" class="form-control" placeholder="工作耗时">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <div>
                                                                    <label>项目名称</label>
                                                                </div>
                                                                <select name="summary_resources[1][project_id]" class="selectpicker" style="width: 100%;">
                                                                    <option value="1">新项目开发</option>
                                                                    <option value="2">生产支持</option>
                                                                    <option value="3">样品准备</option>
                                                                    <option value="4">售前售后支持</option>
                                                                    <option value="5">新物料评估及试产支持</option>
                                                                    <option value="6">客户/销售需求支持</option>
                                                                    <option value="7">其它</option>
                                                                    <option value="8">休假</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group mb-0">
                                                                <div>
                                                                    <label>工作内容</label>
                                                                </div>
                                                                <textarea name="summary_resources[1][content]" class="form-control mb-0" rows="10" placeholder="工作内容"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>下周任务</label>
                            <textarea name="next_week_mission" rows="10" class="form-control w-100"
                                      placeholder="下周工作任务"></textarea>
                        </div>

                        <div class="form-group">
                            <label>协调事项</label>
                            <textarea name="coordination" rows="10" class="form-control w-100"
                                      placeholder="需要其他部门辅助或协调的事项"></textarea>
                        </div>

                        <div class="form-group">
                            <label>收件人</label>
                            <div class="users-container">
                                <div class="user-box">
                                    <input type="hidden" name="addressee" value="{{ Auth::user()->report->id }}">
                                    <div class="user-avatar">
                                        <img src="{{ Auth::user()->report->gravatar(50) }}" class="img-circle" alt="">
                                    </div>
                                    <div class="user-infos">
                                        <div class="user-heading">
                                            <span class="user-name">{{ Auth::user()->report->name }}</span>
                                        </div>
                                        <div class="user-body">
                                            <small>{{ implode('/', Auth::user()->posts->pluck('name')->toArray()) }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>抄送人</label>
                            @include('shared._user_selector')
                        </div>

                        <button type="submit" class="btn btn-primary">提交</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="box box-primary">
                <div class="panel panel-default">
                    <div class="panel-body">
                        ...
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let content = `
            <div class="panel panel-default panel-tabs no-bordered">
                <div class="panel-heading">
                    <ul role="tablist" class="nav nav-tabs">
                        @foreach($departments as $department)
                            <li role="presentation" class="{{ Auth::user()->department_id == $department->id ? 'active' : '' }}">
                                <a href="#{{ $department->name }}" aria-controls="{{ $department->name }}" role="tab" data-toggle="tab">{{ $department->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        @foreach($departments as $department)
                            <div role="tabpanel" id="{{ $department->name }}" class="tab-pane {{ Auth::user()->department_id == $department->id ? 'active' : '' }}">
                                <div class="users-container">
                                    @foreach($department->users as $user)
                                        <div class="user-box" optional>
                                            <input type="hidden" name="cc[]" value="{{ $user->id }}">
                                            <div class="user-avatar">
                                                <img src="{{ $user->gravatar(50) }}" class="img-circle" alt="">
                                            </div>
                                            <div class="user-infos">
                                                <div class="user-heading">
                                                    <span class="user-name">{{ $user->name }}</span>
                                                </div>
                                                <div class="user-body">
                                                    <small>{{ implode('/', $user->posts->pluck('name')->toArray()) }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        `;

        $('.users-container .insert-user').click(function () {
            layer.open({
                type: 1,
                title: '选择用户',
                area: ['100%', '100%'],
                scrollbar: false,
                content: content
            })
        })

        // 追加用户
        $(document).on('click', '.users-container .user-box[optional]', function () {
            let id = $(this).find('input[type="hidden"]').val();
            let child = $(this).html();
            let dom = [
                '<div class="user-box" deletable>',
                child,
                '</div>'
            ].join('')


            if ($('.form-group .users-container .user-box input[name="cc[]"][value="' + id + '"]').length) {
                layer.msg('用户已存在');
                return;
            }

            $(dom).insertBefore($('.users-container .insert-user'))
            layer.closeAll();
        })

        // 移除用户
        $(document).on('click', '.users-container .user-box[deletable]', function () {
            $(this).remove();
        })
    </script>
@endsection