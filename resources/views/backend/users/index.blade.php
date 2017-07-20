@extends('backend.layouts.main')

@push('title')
All Users
@endpush


@push('content')
<div class="row">
    <div class="small-8 small-offset-3 medium-5 medium-offset-6 large-4 large-offset-8 columns" style="text-align:right">
        <a class="button responsive_button fabu fa-plus-square cover" href="{{ url('manage/users/create') }}">
            Create New User
        </a>
    </div>
    <!-- END OF .small-8 small-offset-2  medium-4 medium-offset-7 columns -->
</div>
<!-- END OF .row -->
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
                        {{$user->id }}
                    </td>
                    <td>
                        {{$user->name }}
                    </td>
                    <td>
                        {{$user->email }}
                    </td>
                    <td>
                        {{$user->created_at }}
                    </td>
                    <td>
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
                                        <h5 class="subheader"><br />
                                            You are deleting  User#{{ $user->id }}
                                            <span class="show-for-medium-only">
                                                <br />
                                            </span>( {{$user->name}} )
                                        </h5>
                                        <h3><br />
                                            Are you sure?<br /><br />
                                        </h3>
                                    </div>
                                    <!-- END OF .small-12 column -->
                                </div>
                                <!-- END OF .row -->
                                <div class="row">
                                    <div class="column">
                                        <a class="button fabu before fa-trash userRemover responsive_button">
                                            Yes, delete.
                                        </a>
                                        <form action="{{ url('manage/users/' . $user->id) }}" id='method="POST"' style="display: none;">
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
        <!-- END OF .stack hover -->
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
