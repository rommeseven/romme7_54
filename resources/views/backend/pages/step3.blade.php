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
<div class="row align-center" style="overflow:hidden;max-width:100%;">
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
                        Build from scratch
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
        {{-- todo: fix orbit --}}
    </div>
    <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
</div>
@endpush
@push('bottomcontent')
<div id="editor" v-show="layout_choice=='create'">
    <editorrow :align="row.align" :cols="row.cols" :key="row.id" :preview="preview" @nocol="delrow(index)" v-for="(row,index) in rows">
    </editorrow>
    <!-- END OF .row align-spaced -->
    <div class="editor-ignore row collapse align-center align-middle" data-toggle="addRow" id="newRow" style="height:110px" title="Add Row">
        <div class="editor-ignore column shrink">
            <a class="add-column editor-ignore" href="#">
                <i class="fa fa-3x fa-plus editor-ignore">
                </i>
            </a>
        </div>
        <!-- END OF .column shrink -->
        <!-- END OF #editor -->
    </div>
    <!-- END OF .column -->
</div>
<a @click.preven="save()" class="button" href="#">
    GOGO
</a>
<form action="{{ url('manage/pages/create/step3') }}" id="editorForm" method="POST">
    {{csrf_field()}}
    <input name="serial" type="hidden" v-model="serial"/>
</form>
@endpush

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
@include("backend.pages.editor.colComponent")
@include("backend.pages.editor.rowComponent")

let app = new Vue(
{
    el: '#app2',
    data:
    {
        preview:false,
        done: false,
        layout_choice: 'template',
        rows: [],
        serial: 'serialstr'
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
    },
    methods:
    {
        save()
        {
            let el = $( "#editor" ).clone();
            el.hide();

            el.find(".editor-ignore").remove();
            if(el.children().length < 1) return alert("empty");

            el = el.children();
            el.removeAttr("title");
            el.find(".column").removeAttr("title");
            el.find(".column").removeAttr("data-id");
            let rows = [];

            el.each(function() {
                if($(this).is(".row"))
                {

                let row = {
                    class:$(this).attr("class"),
                    columns:[]
                };
                $(this).children().each(function() {
                    let column = {
                        class:$(this).attr("class")
                    }
                    row.columns.push(column);

                });
                rows.push(row);
                }

           });
            console.log(JSON.stringify(rows));
        },
        delrow(row)
        {
            this.rows.splice(this.rows.indexOf(row));
        },
        editColumn()
        {
            $('#editColumn').foundation('open');
        },
        addRow()
        {
            $('#addRow').foundation('open');
        }
    }
});
</script>
@endpush
@include("backend.pages.editor.addRow")

