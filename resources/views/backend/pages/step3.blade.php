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
<div class="row align-center" style="height:84px;overflow:hidden;max-width:100%;">
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
            <div :class="{radio:true,success:!nothing,alert:nothing}">
                <input id="c1" name="layout_choice" type="radio" v-model="layout_choice" value="template">
                    <label for="c1">
                        Choose from Templates
                    </label>
                    <br/>
                </input>
            </div>
            <!-- END OF .radio primary -->
            <div :class="{radio:true, success:templated, primary:!templated}">
                <input id="c2" name="layout_choice" type="radio" v-model="layout_choice" value="create">
                    <label for="c2">
                        Create new from
                        <span v-show="!templated">
                            Scratch
                        </span>
                        <span v-show="templated">
                            a Template
                        </span>
                    </label>
                    <br/>
                    <br/>
                </input>
            </div>
        </div>
        <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
    </div>
</form>
<!-- END OF .row -->
<div class="row" v-show="nothing && layout_choice=='template'">
    <div class="column small-12 medium-expand shrink">
        <div class="callout alert">
            <p>
                <h4>
                    No Templates
                </h4>
                <p>
                    Currently there are no saved templates
                </p>
                <a @click.prevent="layout_choice='create'">
                    Create Your Own
                </a>
            </p>
        </div>
        <!-- EN D OF .callout alert -->
    </div>
</div>
<div class="row small-up-2 medium-up-3 large-up-4" v-if="layout_choice=='template'">
    <!-- END OF .column small-12 medium-expand shrink -->
    <div class="column" v-for="(layout,index) in layouts">
        <editorlayout :created_at="layout.created_at" :name="layout.name" :rows="layout.rows" @choose="chosen(index)">
        </editorlayout>
    </div>
    <!-- END OF .column -->
    <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
</div>
    @endpush
@push('bottomcontent')
    <transition name="fade">
        <div id="editor" v-show="layout_choice=='create'">
            <editorrow :align="row.align" :cols="row.cols" :key="row.id" :preview="preview" @calign="calign(index,$event)" @ccols="ccols(index,$event)" @nocol="delrow(index)" v-for="(row,index) in rows">
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
    </transition>
    <br/>
    <div class="row">
        <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
            {{--
            <input class="button" type="submit" value="Add User"/>
            --}}
            <div class="row align-left align-middle">
                <div class="column shrink" v-show="layout_choice=='create'">
                    <button class="button cover success small fabu fa-save" data-toggle="layoutnamer" type="button">
                        Save Layout as Template
                    </button>
                    <div class="dropdown-pane" data-auto-focus="true" data-dropdown="" id="layoutnamer">
                        <p>
                            <h5>
                                Layout Name:
                            </h5>
                        </p>
                        <div class="input-group small">
                            <input class="input-group-field" @keyup.enter="saveLayout()" placeholder="Example Layout" type="text" v-model="layoutname">
                                <div class="input-group-button">
                                    <input :disabled="layoutname==''" @click.prevent="saveLayout()" class="button success" tabstop="0" type="submit" value="Save">
                                    </input>
                                </div>
                            </input>
                        </div>
                        <button aria-label="Dismiss alert" class="close-button" data-close="" tabstop="1" type="button">
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                    </div>
                </div>
                <!-- END OF .column small-10 medium-5 -->
                <div class="column small-12 medium-7 large-expand">
                    <button @click="savePage()" class="button primary fabu fa-arrow-right">
                        Save & Next Step
                    </button>
                </div>
                <!-- END OF .column small-10 medium-5 -->
            </div>
            <!-- END OF .row align-center -->
        </div>
        <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
    </div>
    <form action="{{ url('manage/pages/create/step/3/page/' . $page->id) }}" id="editorForm" method="POST">
        {{csrf_field()}}
        <input name="serial" type="hidden" v-model="serial"/>
        <input name="saving" type="hidden" v-model="saving"/>
        <input name="layoutname" type="hidden" v-model="layoutname2"/>
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
@include("backend.pages.editor.addRow")

@push('extrajs')
    <script>
        @include("backend.pages.editor.colComponent")
@include("backend.pages.editor.rowComponent")
@include("backend.pages.editor.layoutComponent")

let app = new Vue(
{
    el: '#app2',
    data:
    {
        preview:false,
        done: false,
        layout_choice: 'template',
        templated: false,
        layouts: {!! $layouts or '[]' !!},
        rows: {!! $layout or '[]' !!},
        serial: 'serialstr',
        layoutname:'',
        layoutname2:'',
        saving: ''
    },
    watch:
    {
        rows()
        {
            if(this.rows.length<1) this.templated = false;
        }
    },
    computed:
    {
        nothing()
        {
            return ( !this.layouts.length);

        }
    },
    methods:
    {
        save()
        {
/*            let el = $( "#editor" ).clone();
            el.hide();
            el.find(".editor-ignore").remove();
            if(el.children().length < 1)
            {
                alert("empty");
                return false;
            }
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
           });*/
        this.serial =JSON.stringify(this.rows);
        return true;
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
        },
        saveLayout()
        {
                this.saving = 'layout';
            if(this.save())
            {
                if(this.layoutname == '') 
                {
                    alert("noname");

                    return false;
                }
                this.layoutname2 = this.layoutname;
                setTimeout(function()
                {
                    $("#editorForm").submit();
                }, 10);
            }
        },
        savePage()
        {
            this.saving = "page";
            if(this.save())
            {
                setTimeout(function()
                {
                    $("#editorForm").submit();
                }, 10);
            }
        },
        chosen(row)
        {
            let temporary = this.layouts[row].rows.slice(0);
            this.rows = temporary;
            this.templated=true;

            this.layout_choice = 'create';

        },
        calign(row,e)
        {
            this.rows[row].align = e;
        },
        ccols(row,e)
        {
            this.rows[row].cols = e;
        }
    }
});
    </script>
    @endpush
</div>