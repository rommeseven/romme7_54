<div class="callout alert-callout-subtle success unread radius flex-container align-justify">
    <div class="notif-text"  >
        <strong>
            <a href="{{ url('cmseven/users/'. $notification->data['user']['id']) }}" title="See Details">
               {{ $notification->data['user']['username'] }}
            </a>
        </strong>
        published a new page:  <strong>
            <a href="{{url($notification->data['page_slug'])}}" title="See Details">{{$notification->data['page_title']}}</a>
        </strong>
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