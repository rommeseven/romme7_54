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

@endpush

@push('extracss')
<style>
    .topcontent
{
padding-top:24px;
}
</style>
@endpush
