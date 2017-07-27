@extends('backend.layouts.main')

@push('title')
Edit Permission#{{ $permission->id }}
@endpush


@push('bread')
<li><a href="{{ url('/manage') }}">Management</a></li>
@endpush


@push('bread')
<li><a href="{{ url('/manage/permissions') }}">Permissions</a></li>
@endpush

@push('bread')
<li>Editing</li>
@endpush

@push('content')
<div class="row">
    <div class="column">
        <p>
            <h3>
                Editing Permission#{{ $permission->id }} ({{ $permission->name }})...
            </h3>
        </p>
    </div>
    <!-- END OF .column -->
</div>
<div class="row align-spaced">
    <div class="column small-12 medium-8 large-7">
        <div class="callout">
            <div class="row align-left align-middle">
                <div class="column small-12 medium-2 large-1" style="text-align:center">
                    <i class="fa icon fa-info-circle fa-3x">
                    </i>
                </div>
                <!-- END OF .column small-12 medium-4 large-3 -->
                <div class="column small-12 medium-10" style="text-align:center; padding-top: 15px;">
                    <p>
                        Leave the fields you don't want to change blank.
                    </p>
                </div>
                <!-- END OF .column small-12 medium-8 large-9 -->
            </div>
            <!-- END OF .row -->
        </div>
        <!-- END OF .callout -->
    </div>
    <!-- END OF .column shrink -->
</div>
<!-- END OF .row -->
<!-- END OF .row -->
<form action="{{ url('manage/permissions/' . $permission->id) }}" method="POST">
    {{csrf_field()}}
    {{method_field("PATCH")}}
    <div class="row">
        <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
            <label for="name">
                            Name of Permission:
                            <input @keyup="autoslug($event.target.value)" name="name" id="name" placeholder="{{$permission->display_name}}" type="text" v-model="name"/>
                            @if ($errors->has('name'))
                            <small class="errortext">
                                {{ $errors->first('name') }}
                            </small>
                            @endif
                        </label>

                </div>
        <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
    </div>
    <div class="row">
        <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
          <label for="slug">
                        Permission slug:
                        <input @keydown.once="slugme()" id="slug" name="slug" placeholder="{{$permission->name}}" type="text" v-model="slug"/>
                        @if ($errors->has('slug'))
                        <small class="errortext">
                            {{ $errors->first('slug') }}
                        </small>
                        @endif
                    </label>
        </div>
        <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
    </div>
    <div class="row" id="app">
        <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
           <label for="description">
                        Description:
                        <input id="description" name="description" placeholder="{{$permission->description}}" type="text"/>
                        @if ($errors->has('description'))
                        <small class="errortext">
                            {{ $errors->first('description') }}
                        </small>
                        @endif
                    </label>
        </div>
    </div>
<div class="row">
    <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">

        <div class="row align-center">
            <div class="column small-9 medium-7 large-5 small-offset-3 medium-offset-0 large-offset-7">
                <button class="button expanded fabu before fa-save" type="submit">
                    Save Changes
                </button>
            </div>
            <!-- END OF .column small-10 medium-5 -->
        </div>
        <!-- END OF .row align-center -->
    </div>
    <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
</div>
</form>
<!-- END OF .row -->
<!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
<!-- END OF .row -->
@endpush
