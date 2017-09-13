<div class="row notifrow">
    <div class="column expand">
       <div class="row align-justify" style="margin-top:7px"><div class="column shrink">
            <h5>{{settings('app_title')}} Notifications:</h5>
        </div><!-- END OF .column -->   <div class="column shrink">
        @if(count(auth()->user()->unreadNotifications) > 1)
            <a href="{{route("notif.readAll")}}"  class="button secondary fabu fa-archive" data-toggle="read">Mark all as read</a>
          @endif
            @if(!count(auth()->user()->unreadNotifications))
            <a href="#" data-close class="button secondary fabu fa-times">Close</a>
            @endif
        </div><!-- END OF .column --></div>    
 @if(!count(auth()->user()->unreadNotifications))
<div class="NoUnread row  align-center align-middle">
    <div class="column shrink">
        <h6>There are no unread notifications.</h6>
        
    </div><!-- END OF .column -->
</div><!-- END OF .NoUnread -->
@endif
       <div class="unreadNotifs">
           @foreach (auth()->user()->unreadNotifications as $notification)
             @include('backend.notifications.' . snake_Case(class_basename($notification->type)))
           @endforeach
       </div><!-- END OF .unreadNotifs -->
       {{--  <div class="row align-center" style="margin-top:7px"><div class="column shrink">
            <a href="#"  data-toggle="read">Toggle all</a>
        </div><!-- END OF .column --></div>
        <div id="read" data-toggler="is-hidden" style="display: none;" data-animate="hinge-in-from-top hinge-out-from-top">
            <div class="callout alert-callout-subtle warning read small flex-container align-justify">
                <div class="notif-text">
                    There are less then
                    <strong>
                        <a href="#" title="See Details">
                            3 pages
                        </a>
                    </strong>
                    at the moment on the site.
                </div>
                <!-- END OF .notif-text -->
                <div class="notif-icons">
                    <a href="">
                        <i class="fa fa-trash">
                        </i>
                    </a>
                </div>
                <!-- END OF .notif-icons -->
            </div>
            <div class="callout alert-callout-subtle alert read small flex-container align-justify">
                <div class="notif-text">
                    There is a new
                    <strong>
                        <a href="#" title="See Details">
                            Error Report
                        </a>
                    </strong>
                    !
                </div>
                <!-- END OF .notif-text -->
                <div class="notif-icons">
                    <a href="">
                        <i class="fa fa-trash">
                        </i>
                    </a>
                </div>
                <!-- END OF .notif-icons -->
            </div>
            <div class="callout alert-callout-subtle primary read small flex-container align-justify">
                <div class="notif-text">
                    <strong>
                        <a href="#" title="See Details">
                            takl95
                        </a>
                    </strong>
                    updated the Application to
                    <strong>
                        <a href="#" title="See Details">
                            v12
                        </a>
                    </strong>
                    !
                </div>
                <!-- END OF .notif-text -->
                <div class="notif-icons">
                    <a href="">
                        <i class="fa fa-trash">
                        </i>
                    </a>
                </div>
                <!-- END OF .notif-icons -->
            </div>
        </div><!-- END OF #read --> --}}
    </div>
    <!-- END OF .column expand -->
</div>
<!-- END OF .row -->
{{-- TODO: [notifs] make dynamic --}}
