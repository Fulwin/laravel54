@component('mail::message')

### {{ $summary->user->name }}发布了新总结《{{ $summary->title }}》

@component('mail::panel')
    {{ $summary->content }}
@endcomponent

@component('mail::panel')
    {{ $summary->next_week_mission }}
@endcomponent

@component('mail::panel')
    {{ $summary->coordination }}
@endcomponent

@component('mail::button', ['url' => url('/summaries/' . $summary->id), 'color' => 'blue'])
    查看总结
@endcomponent

@endcomponent