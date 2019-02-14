<?php

namespace App\Observers;

use App\Models\Summary;
use App\Notifications\SummaryPublish;
use Carbon\Carbon;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class SummaryObserver
{
    public function creating(Summary $summary)
    {
        $summary->is_publish = 1;
        $summary->published_at = Carbon::now();
    }

    public function created(Summary $summary)
    {
        // 创建总结之后通知直属上级
        $summary->user->report->notify(new SummaryPublish($summary));
    }

    public function updating(Summary $summary)
    {
        //
    }
}