@extends('layouts.default')
@section('title', '创建用户')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="col-md-12">
                        <div class="col-md-offset-2 col-md-8">
                            <section class="user_info">
                                @include('shared._user_info', ['user' => $user])
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop