<div class="row notifrow">
    <div class="column expand">
       <div class="row align-justify" style="margin-top:7px"><div class="column shrink">
            <h5>{{settings('app_title')}} Notifications:</h5>
        </div><!-- END OF .column -->   <div class="column shrink">
            <a href="#"  class="button secondary fabu fa-archive" data-toggle="read">Mark all as read</a>
            <a href="" class="button secondary fabu fa-times">Close</a>
        </div><!-- END OF .column --></div>    
<div class="NoUnread row  align-center align-middle">
    <div class="column shrink">
        <h6>There are no unread notifications.</h6>
        
    </div><!-- END OF .column -->
</div><!-- END OF .NoUnread -->
       <div class="unreadNotifs">
            <div class="callout alert-callout-subtle success unread radius flex-container align-justify">
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
                   <small>- 2 hours ago</small>
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
           <div class="callout alert-callout-subtle alert unread flex-container align-justify" title="Mark as Read">
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
                   <a href="" title="Delete Notification">
                       <i class="fa fa-trash">
                       </i>
                   </a>
               </div>
               <!-- END OF .notif-icons -->
           </div>
           <div class="callout alert-callout-subtle primary unread radius flex-container align-justify">
               <div class="notif-text">
                   <strong>
                       <a href="#" title="See Details">
                           takl95
                       </a>
                   </strong>
                   created a
                   <strong>
                       <a href="#" title="See Details">
                           new Page
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
       </div><!-- END OF .unreadNotifs -->
        <div class="row align-center" style="margin-top:7px"><div class="column shrink">
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
        </div><!-- END OF #read -->
    </div>
    <!-- END OF .column expand -->
</div>
<!-- END OF .row -->
{{-- TODO: [notifs] add timestamp (ago) --}}
{{-- TODO: [notifs] make dynamic --}}
