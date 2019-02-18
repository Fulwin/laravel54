<li class="media @if ( ! $loop->last) border-bottom @endif">
    <div class="media-left">
        <a href="{{ route('users.show', $notification->data['user_id']) }}">
            <img class="img-circle" alt="{{ $notification->data['user_name'] }}"
                 src="{{ $notification->data['user_avatar'] }}" width="45" height="45"/>
        </a>
    </div>

    <div class="media-body">
        <div class="media-heading text-secondary">
            <a href="{{ route('users.show', $notification->data['user_id']) }}">{{ $notification->data['user_name'] }}</a>
            发布了新总结 <a href="{{ $notification->data['summary_link'] }}">《{{ $notification->data['summary_title'] }}》</a>
            {{ $notification->created_at->diffForHumans() }}
        </div>
    </div>
</li>