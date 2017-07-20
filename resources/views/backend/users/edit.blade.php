@extends('backend.layouts.main')

@push('title')
All Users
@endpush


@push('content')
<div class="row">
    <div class="column">
        <p>
            <h3>Creating A New User</h3>
        </p>
    </div><!-- END OF .column -->
</div><!-- END OF .row -->
<form action="{{ url('manage/users') }}" method="POST">
    {{csrf_field()}}
    <div class="row">
        <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
            <label for="name">
                Username:
                <input name="name" value="{{ old('name') }}" placeholder="example17" type="text"/>
            </label>
        </div>
        <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
    </div>
    <div class="row">
        <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
            <label for="email">
                Email:
                <input name="email" value="{{ old('email') }}" placeholder="example@mail.com" type="email"/>
            </label>
        </div>
        <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
    </div>
    <div class="row" id = "app">
        <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
            <label for="password">
                Password:
                <br />
                 <input id="genpw"  type="checkbox" v-model="genpw"><label for="genpw">Generate Password</label>
                <input name="password" v-if="!genpw" type="password"/>
                <input name="password2" v-if="!genpw" type="password"/>
            </label>
        </div>
        <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
    </div>    
    <div class="row">
        <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
            <input type="submit" value="Add User" class="button" />
        </div>
        <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
    </div>     
    <!-- END OF .row -->
</form>
@endpush
{{-- TODO: better checkbox --}}
@push('extracss')
<style>
    .topcontent
{
padding-top:24px;
}
</style>
@endpush

@push('extrajs')
<script>
    let app = new Vue({
        el:'#app',
        data:{
            genpw:true
        }
    });

</script>
@endpush
