@extends('backend.layouts.main')

@push('title')
User Profile of {{ $user->name }}
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
    <div class="colum">
        <div class="row align-top align-spaced">
            <div class="column">
                ID:
                <br/>
                Name:
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
    <div class="colum">
    </div>
    <!-- END OF .colum -->
</div>
<!-- END OF .row -->
@endpush

@push('extracss')
<style>
    .topcontent
{
padding-top:24px;
}
</style>
@endpush
