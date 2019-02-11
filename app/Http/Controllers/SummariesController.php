<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Summary;
use App\Models\User;
use Auth;

class SummariesController extends Controller
{
    // 列表页
    public function index()
    {
        $summaries = Summary::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('summaries/index', compact('summaries'));
    }

    // 详情页
    public function show(Summary $summary)
    {
        $summariesCount = Summary::where('user_id', $summary->user_id)->count();
        $latestSummaries = Summary::where('user_id', $summary->user_id)->where('id', '<>', $summary->id)->orderBy('created_at', 'desc')->limit(5)->get();

        return view('summaries/show', compact('summary','summariesCount', 'latestSummaries'));
    }

    // 创建页
    public function create()
    {
        $departments = Department::with(['users' => function($query) {
            $query->ignoreSelf()->filterAbnormalUsers()->ignoreAdmin();
        }])->get();

        return view('summaries/create', compact('departments'));
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
        $summary->type = 'summaries';
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
    public function destroy(Summary $summary)
    {

    }
}
