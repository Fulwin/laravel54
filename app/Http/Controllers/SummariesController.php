<?php

namespace App\Http\Controllers;

use App\Models\Summary;

class SummariesController extends Controller
{
    // 列表页
    public function index()
    {
        $summaries = Summary::orderBy('created_at', 'desc')->paginate(6);
        return view('summary/index', compact('summaries'));
    }

    // 详情页
    public function show(Summary $summary)
    {
        return view('summary/show', compact('summary'));
    }

    // 创建页
    public function create()
    {
        return view('summary/create');
    }

    // 创建逻辑
    public function store()
    {
        $this->validate(request(), [
            'title' => 'required|string|max:100|min:5',
            'next_week_mission' => 'required|string',
        ]);

        $summary = new Summary();
        $summary->user_id = 1;
        $summary->type = 'summary';
        $summary->title = request('title');
        $summary->content = request('content');
        $summary->next_week_mission = request('content');
        $summary->coordination = request('content');
        $summary->year = 2019;
        $summary->week = 4;

        $summary->save();

        return redirect('summaries');
    }

    // 编辑页
    public function edit()
    {

    }

    // 更新逻辑
    public function update()
    {

    }

    // 删除
    public function delete()
    {

    }
}
