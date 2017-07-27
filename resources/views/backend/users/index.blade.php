@extends('backend.layouts.main')

@push('title')
All Users
@endpush

@push('bread')
<li><a href="{{ url('/manage') }}">Management</a></li>
@endpush


@push('bread')
<li>Users</li>
@endpush


@push('content')
<div class="row align-justify">
    <div class="small-12 medium-expand columns">
        <h3>
            {{ $searched or 'All Registered Users:' }}
        </h3>
    </div>
    <!-- END OF .small-12 large-stack columns -->
    <div class="small-12 medium-expand columns" style="text-align:right">

        <a class="button responsive_button fabu fa-search secondary before" data-toggle="search_panel" href="#find">
            Find
            @if(isset($searched))
 Another 
@endif
User
        </a>

        @if(isset($searched))
        <a class="button responsive_button fabu fa-list-alt primary before" data-toggle="search_panel" href="{{ url('/manage/users') }}">
            All Users
        </a>
        @else
        <a class="button responsive_button fabu fa-plus cover" href="{{ url('manage/users/create') }}">
            Add New User
        </a>
        @endif        
    </div>
    <!-- END OF .small-8 small-offset-2  medium-4 medium-offset-7 columns -->
</div>
<!-- END OF .row -->
<div class="row align-center hiddenPanel" data-animate="hinge-in-from-top hinge-out-from-top" data-toggler="" id="search_panel">
    <div class="column small-12 medium-9 large-7 columns">
        <form action="{{ url('/manage/users/find') }}" method="POST">
            {{csrf_field()}}
            <label for="search">
                Find User:
                <div class="input-group">
                    <input id="search" name="search" placeholder="Username..." type="text"/>
                    <div class="input-group-button">
                        <button class="button button-icon purple">
                            <i class="fa fa-search">
                            </i>
                        </button>
                    </div>
                </div>
@if ($errors->has('search'))
<small class="errortext">
    {{ $errors->first('search') }}
</small>
@endif
            </label>
        </form>
    </div>
</div>
<!-- END OF .column small-12 medium-9 large-7 columns -->
<!-- END OF .row align-center -->
<div class="row align-center hide-for-large">
    <div class="column shrink">
        {!! $users->render() !!}
    </div>
    <!-- END OF .column shrink -->
</div>
<!-- END OF .row align-center -->
<div class="row">
    <div class="columns">
        <table class="stack hover">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Username
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Created
                    </th>
                    <th>
                        Updated
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>
                        <span class="hide-for-large">
                            User#
                        </span>
                        {{$user->id }}
                    </td>
                    <td>
                        {{$user->name }}
                    </td>
                    <td>
                        {{$user->username }}
                    </td>
                    <td>
                        {{$user->email }}
                    </td>
                    <td>
                        <span class="hide-for-large">
                            Created:
                        </span>
                        {{$user->created_at }}
                    </td>
                    <td>
                        <span class="hide-for-large">
                            Updated:
                        </span>
                        {{$user->updated_at }}
                    </td>
                    <td>
                        <a class="button button-icon" href="{{ url('manage/users/' . $user->id) }}" title="Profile">
                            <i class="fa fa-id-card">
                            </i>
                        </a>
                        <a class="button button-icon" href="{{ url('manage/users/' . $user->id .  '/edit') }}" title="Edit User">
                            <i class="fa fa-pencil">
                            </i>
                        </a>
                        <a class="button button-icon" data-toggle="userdelmodal_{{$user->id}}" title="Remove User">
                            <i class="fa fa-remove">
                            </i>
                        </a>
                        <div class="small reveal" data-animation-in="scale-in-up fast" data-animation-out="scale-out-down fast" data-reveal="" id="userdelmodal_{{ $user->id }}">
                            <div style="text-align:center">
                                <div class="row align-center">
                                    <div class="small-12 column">
                                        <h5 class="subheader">
                                            <br/>
                                            You are deleting  User#{{ $user->id }}
                                            <span class="show-for-medium-only">
                                                <br/>
                                            </span>
                                            ( {{$user->name}} )
                                        </h5>
                                        <h3>
                                            <br/>
                                            Are you sure?
                                            <br/>
                                            <br/>
                                        </h3>
                                    </div>
                                    <!-- END OF .small-12 column -->
                                </div>
                                <!-- END OF .row -->
                                <div class="row">
                                    <div class="column">
                                        <a class="button fabu remove fa-trash userRemover responsive_button">
                                            Yes, delete.
                                        </a>
                                        <form action="{{ url('manage/users/' . $user->id) }}" method="POST" style="display: none;">
                                            {{ method_field('DELETE') }}
    {{ csrf_field() }}
                                        </form>
                                    </div>
                                    <!-- END OF .column -->
                                    <div class="column">
                                        <a class="error alert button fabu before fa-remove responsive_button" data-close="">
                                            Cancel
                                        </a>
                                    </div>
                                    <!-- END OF .column -->
                                </div>
                                <!-- END OF .row -->
                            </div>
                            <button aria-label="Close reveal" class="close-button" data-close="" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br/>
        <!-- END OF .stack hover -->
        <div class="row align-center">
            <div class="column shrink">
                {!! $users->render() !!}
            </div>
            <!-- END OF .column shrink -->
        </div>
        <!-- END OF .row align-center -->
    </div>
    <!-- END OF .columns -->
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

@if(isset($searched))
@push('extrajs')
<script>
$( "table>tbody>tr>td:not(:has(*))" ).each(function( index ) {

var src_str = $(this).html();
var term = "{{$searchQuery}}";
term = term.replace(/(\s+)/,"(<[^>]+>)*$1(<[^>]+>)*");
var pattern = new RegExp("("+term+")", "gi");

src_str = src_str.replace(pattern, "<mark>$1</mark>");
src_str = src_str.replace(/(<mark>[^<>]*)((<[^>]+>)+)([^<>]*<\/mark>)/,"$1</mark>$2<mark>$4");

$(this).html(src_str);
});

</script>
@endpush
@endif

