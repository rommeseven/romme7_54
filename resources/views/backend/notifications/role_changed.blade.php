<div class="callout alert-callout-subtle warning unread flex-container align-justify">
    <div class="notif-text"  >
        <strong>
            <a href="{{ url('cmseven/users/'. $notification->data['user']['id']) }}" title="See Details">
               {{ $notification->data['user']['username'] }}
            </a>
        </strong>
        updated your <strong>
            <a href="{{route("settings")}}" title="See Details">{{$notification->data['role']['display_name']}}</a>
        </strong> Role
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