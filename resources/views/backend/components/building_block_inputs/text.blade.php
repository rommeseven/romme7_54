<div class="row">
    <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
        <label for="{{$bb['key']}}">
            {{$bb['name']}}:
            <input name="{{$bb['key']}}" id="{{$bb['key']}}" placeholder="{{$slot}}" type="text" v-model="{{$bb['key']}}"/>
            @if ($errors->has($bb['key']))
            <small class="errortext">
                {{ $errors->first($bb['key']) }}
            </small>
            @endif
            <small class="help-text">
                {{$bb['description']}}
            </small>
        </label>
    </div>
    <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
</div>