<div class="callout alert-callout-subtle alert unread flex-container align-justify">
    <div class="notif-text"  >
        <strong>
              @if( auth()->user()->username && $notification->data['username'] )
              You
              @else
              {{ $notification->data['username'] }}
              @endif
        </strong>
        tried to access this  <strong> wrong url:
            {{url($notification->data['slug'])}}
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