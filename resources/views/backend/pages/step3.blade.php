@extends('backend.layouts.main')


@push('title')
Create New Page
@endpush

@push('bread')
<li>
    <a href="{{ url('/manage') }}">
        Management
    </a>
</li>
@endpush


@push('bread')
<li>
    <a href="{{ url('/manage/pages') }}">
        Pages
    </a>
</li>
@endpush

@push('bread')
<li class="disabled">
    Page Editor
</li>
@endpush

@push('bread')
<li>
    Layout
</li>
@endpush
@push('bread')
<li>
    {{$page->title}}
</li>
@endpush

@push('content')
<div id="app">
    <div class="row">
        <div class="column">
            <p>
                <h3>
                    Creating A New Page -
                    <strong>
                        Step 3:
                    </strong>
                </h3>
            </p>
        </div>
        <!-- END OF .column -->
    </div>
    <div class="row align-center">
        <div class="column shrink">
            <ol class="progress-indicator">
                <li class="is-complete" data-step="">
                    <span>
                        Title & Url
                    </span>
                </li>
                <li class="is-complete" data-step="">
                    <span>
                        Navigation
                    </span>
                </li>
                <li class="is-current" data-step="">
                    <span>
                        Layout
                    </span>
                </li>
                <li class="" data-step="">
                    <span>
                        Content
                    </span>
                </li>
                <li class="" data-step="">
                    <span>
                        Settings
                    </span>
                </li>
                <li class="" data-step="">
                    <span>
                        <strong>
                            Publish
                        </strong>
                    </span>
                </li>
            </ol>
        </div>
        <!-- END OF .column shrink -->
    </div>
    <br/>
    <br/>
    {{-- TODO: callout info sort to proceed --}}
    <!-- END OF .row align-center -->
    <!-- END OF .row -->
    <form action="{{ url('manage/layout') }}" id="navi" method="POST">
        {{csrf_field()}}
        <div class="row">
            <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
                <div class="radio primary">
                    <input id="c1" name="layout_choice" type="radio" v-model="layout_choice" value="template">
                        <label for="c1">
                            Choose from Templates
                        </label>
                        <br/>
                    </input>
                </div>
                <!-- END OF .radio primary -->
                <div class="radio primary">
                    <input id="c2" name="layout_choice" type="radio" v-model="layout_choice" value="create">
                        <label for="c2">
                            Build on from scratch
                        </label>
                        <br/>
                        <br/>
                    </input>
                </div>
            </div>
            <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
        </div>
    </form>
    <div class="row collapse" v-if="layout_choice=='template'">
        <div class="column">
            <div aria-label="Favorite Space Pictures" class="orbit" data-orbit="" role="region">
                <ul class="orbit-container">
                    <button class="orbit-previous">
                        <span class="show-for-sr">
                            Previous Slide
                        </span>
                        ◀︎
                    </button>
                    <button class="orbit-next">
                        <span class="show-for-sr">
                            Next Slide
                        </span>
                        ▶︎
                    </button>
                    <li class="orbit-slide is-active">
                        Reprehenderit ullam quaerat labore porro, sint tempora culpa laudantium iste, suscipit dolorum iusto facere, veritatis laborum quisquam consectetur recusandae quas!
                    </li>
                    <li class="orbit-slide is-active">
                        Provident rerum atque inventore quas ex, necessitatibus nisi consectetur ea, repellendus voluptate aspernatur numquam fugit cumque ratione. Ex, itaque, error.
                    </li>
                    <li class="orbit-slide is-active">
                        Officia error eos hic quam delectus ex dicta, ipsa laboriosam. Consectetur ratione, rem id modi commodi ea cupiditate quod sapiente.
                    </li>
                    <!-- More slides... -->
                </ul>
            </div>
            <div v-if="layout_choice=='create'">
                <!-- END OF .row -->
            </div>
            {{-- todo: fix orbit --}}

            <div id="editor">
                <div class="row align-spaced">
                    <div class="column small-4">
                        CONTENT
                    </div>
                    <!-- END OF .column -->
                    <div class="column small-4">
                        CONTENT
                    </div>
                    <!-- END OF .column -->
                </div>
                <!-- END OF .row align-spaced -->
                <div class="editor-ignore row collapse align-center align-middle" id="newRow" style="height:110px" title="Add Row">
                    <div class="editor-ignore column shrink">
                        <a class="add-column editor-ignore" href="#">
                            <i class="fa fa-3x fa-plus">
                            </i>
                        </a>
                    </div>
                    <!-- END OF .column shrink -->
                    <!-- END OF #editor -->
                </div>
                <!-- END OF .column -->
            </div>
        </div>
        <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
    </div>
</div>
<!-- END OF #app -->
{{--
<div class="column shrink align-self-bottom ">
    <button class="button large expanded fabu fa-arrow-right" type="submit" v-bind:class="classObject">
        Save & Next Step
    </button>
</div>
<ul class="menu" id="items">
    <li>
        item 1
    </li>
    <li>
        item 2
    </li>
    <li>
        item 3
    </li>
</ul>
--}}
@endpush

@push('extracss')
<style>
    .topcontent
{
padding-top:24px;
}
</style>
@push('extrajs')
<script>
    let app = new Vue(
{
    el: '#app',
    data:
    {
        done: false,
        layout_choice: 'template'
    },
    computed:
    {
        classObject: function()
        {
            return {
                'success': this.done,
                'secondary': !this.done,
            }
        },
        classObject2: function()
        {
            return {
                'menucard-light': !this.done
            }
        }
    }
});
</script>
@endpush
