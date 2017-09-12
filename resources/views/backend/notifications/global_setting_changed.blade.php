<div class="callout alert-callout-subtle warning unread radius flex-container align-justify">
    <div class="notif-text"  >
        <strong>
            <a href="{{ url('cmseven/users/'. $notification->data['user']['id']) }}" title="See Details">
               {{ $notification->data['user']['username'] }}
            </a>
        </strong>
        changed the <strong>
            <a href="{{route("settings")}}" title="See Details">Global setting</a>
        </strong> '{{ $notification->data['setting'] }}' to '{{ $notification->data['value'] }}'
        <small>
            ~ {{$notification->created_at->diffForHumans()}}
        </small>
    </div>
    <!-- END OF .notif-text -->
    <div class="notif-icons">
        <a href="{{route("notif.delete",$notification->id)}}">
            <i class="fa fa-trash">
            </i>
        </a>
    </div>
    <!-- END OF .notif-icons -->
</div>