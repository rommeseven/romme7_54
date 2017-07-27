@extends('backend.layouts.main')

@push('title')
User Profile of {{ $user->name }}
@endpush

@push('bread')
<li><a href="{{ url('/manage') }}">Management</a></li>
@endpush


@push('bread')
<li><a href="{{ url('/manage/users') }}">Users</a></li>
@endpush

@push('bread')
<li>Details</li>
@endpush

@push('content')
<div class="row align-justify">
    <div class="small-12 medium-expand columns">
        <h3>
            User Profile of
            <strong>
                {{ $user->name }}
            </strong>
        </h3>
    </div>
    <!-- END OF .small-12 large-stack columns -->
    <div class="small-12 medium-expand columns" style="text-align:right">
        <a class="button responsive_button fabu fa-pencil before" href="{{ url('manage/users/'. $user->id .'/edit' ) }}">
            Edit This User
        </a>
    </div>
    <!-- END OF .small-8 small-offset-2  medium-4 medium-offset-7 columns -->
</div>
<div class="callout row align-justify">
    <div class="column shrink">
        <div class="row align-top align-spaced">
            <div class="column">
                ID:
                <br/>
                Name:
                <br/>
                Username:
                <br/>
                Email:
                <br/>
                Account Created:
                <br/>
            </div>
            <!-- END OF .column -->
            <div class="column">
                User#{{$user->id}}
                <br/>
                {{$user->name}}
                <br/>
                {{$user->username}}
                <br/>
                {{$user->email}}
                <br/>
                {{$user->created_at}}
                <br/>
            </div>
            <!-- END OF .column -->
        </div>
        <!-- END OF .row -->
    </div>
    <!-- END OF .colum -->
    <div class="column small-offset-1">
    <h4>Roles</h4>
        @foreach($user->roles as $role)
            <div class="checkbox success">
                <input id="pcheckbox_{{$role->id}}" type="checkbox" checked disabled class="styled">
                    <label for="pcheckbox_{{$role->id}}">
                        {{ $role->display_name }} ({{ $role->description }})
                    </label>
            </div><!-- END OF .checkbox -->          
        @endforeach    
    </div>
    <!-- END OF .colum -->
</div>
<!-- END OF .row -->
@endpush
