let editorcol = Vue.component('editorcol',
{
    props: ["size", "valign", "offset", "preview", "medium", "small", "large"],
    template: `
<div :class="MyClassObject" :data-id="id" @click="open()">
    <div :id="id" class="editor-ignore reveal large" data-reveal="" title="Edit Column">
        <button aria-label="Dismiss alert" class="close-button" data-close="" type="button">
            <span aria-hidden="true">
                ×
            </span>
        </button>
        <div class="row align-spaced align-middle">
            <div class="column shrink">
                <p>
                    <h3>
                        @lang("Column Settings")
                    </h3>
                </p>
            </div>
            <!-- END OF .column -->
            <div class="column shrink">
        <br />
                    <a @click.prevent="toRow()" class="button logoblue fabu fa-ellipsis-h" href="#">
                        @lang("Go to Row Settings")
                    </a>
               
            </div>
            <!-- END OF .column -->
        </div>
        <!-- END OF .row align-spaced -->
        <div class="row collapse align-bottom">
            <div class="column small-12 medium-expand">
                <label for="spaced">
                    @lang("Size")
                </label>
                <div class="radio secondary">
                    <input :id="panelid('auto')" name="newSize" type="radio" v-model="newSize" value="auto">
                        <label :for="panelid('auto')">
                            <i class="fa fa-exchange">
                            </i>
                            @lang("Auto")
                        </label>
                        <br/>
                    </input>
                </div>
                <!-- END OF .radio primary -->
                <div class="radio secondary">
                    <input :id="panelid('expand')" name="newSize" type="radio" v-model="newSize" value="expand">
                        <label :for="panelid('expand')">
                            <i class="fa fa-arrows-h">
                            </i>
                            @lang("Expand")
                        </label>
                        <br/>
                    </input>
                </div>
                <!-- END OF .radio primary -->
                <div class="radio secondary">
                    <input :id="panelid('shrink')" name="newSize" type="radio" v-model="newSize" value="shrink">
                        <label :for="panelid('shrink')">
                            <i class="fa fa-caret-square-o-left">
                            </i>
                            @lang("Shrink")
                        </label>
                    </input>
                    <br/>
                </div>
                <!-- END OF .radio primary -->
                <div class="radio secondary">
                    <input :id="panelid('exact')" name="newSize" type="radio" v-model="newSize" value="exact">
                        <label :for="panelid('exact')">
                            <i class="fa fa-bullseye">
                            </i>
                            @lang("Exact")
                            <span v-show="newSize=='exact'">
                                :
                            </span>
                        </label>
                        <br/>
                        <br/>
                    </input>
                </div>
                <div v-show="newSize=='exact'">
                    <ul :id="columnid" class="tabs" data-responsive-accordion-tabs="tabs small-accordion medium-accordion large-tabs">
                        <li class="tabs-title is-active">
                            <a :href="panelhref(1)" aria-selected="true">
                                @lang("Mobile")
                            </a>
                        </li>
                        <li class="tabs-title">
                            <a :href="panelhref(2)">
                                @lang("Tablet (optional)")
                            </a>
                        </li>
                        <li class="tabs-title">
                            <a :href="panelhref(3)">
                                @lang("Desktop (optional)")
                            </a>
                        </li>
                    </ul>
                    <div :data-tabs-content="columnid" class="tabs-content">
                        <div :id="panelid(1)" class="tabs-panel is-active">
                            <p>
                                <div @click="updatesizes()" @moved.zf.slider="tellme()" class="slider" data-end="12" data-initial-start="0" data-slider="">
                                    <span :aria-controls="panelid('mobileslider')" class="slider-handle" data-slider-handle="" role="slider" tabindex="1">
                                    </span>
                                    <span class="slider-fill" data-slider-fill="">
                                    </span>
                                </div>
                                <input :id="panelid('mobileslider')" @update="updatesizes()" type="hidden">
                                </input>
                            </p>
                        </div>
                        <div :id="panelid(2)" class="tabs-panel">
                            <p>
                                <div @click="updatesizes()" @moved.zf.slider="tellme()" class="slider" data-end="12" data-initial-start="0" data-slider="">
                                    <span :aria-controls="panelid('tabletslider')" class="slider-handle" data-slider-handle="" role="slider" tabindex="1">
                                    </span>
                                    <span class="slider-fill" data-slider-fill="">
                                    </span>
                                </div>
                                <input :id="panelid('tabletslider')" @update="updatesizes()" type="hidden">
                                </input>
                            </p>
                        </div>
                        <div :id="panelid(3)" class="tabs-panel">
                            <p>
                                <div @click="updatesizes()" @moved.zf.slider="tellme()" class="slider" data-end="12" data-initial-start="0" data-slider="">
                                    <span :aria-controls="panelid('desktopslider')" class="slider-handle" data-slider-handle="" role="slider" tabindex="1">
                                    </span>
                                    <span class="slider-fill" data-slider-fill="">
                                    </span>
                                </div>
                                <input :id="panelid('desktopslider')" @update="updatesizes()" type="hidden">
                                </input>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OF .row -->
        </div>
        <label for="spaced">
            @lang("Offset (optional)")
        </label>
        <div @click="updateoffset()" class="slider secondary" data-end="10" data-initial-start="0" data-slider="">
            <span :aria-controls="panelid('offsetslider')" class="slider-handle" data-slider-handle="" role="slider" tabindex="1">
            </span>
            <span class="slider-fill" data-slider-fill="">
            </span>
        </div>
        <label for="spaced">
            @lang("Vertical Alignment (optional)")
        </label>
        <div class="radio secondary">
            <input :id="panelid('top')" name="Myvalign" type="radio" v-model="Myvalign" value="top">
                <label :for="panelid('top')">
                    <i class="fa fa-exchange">
                    </i>
                    @lang("Top")
                </label>
                <br/>
            </input>
        </div>
        <!-- END OF .radio primary -->
        <div class="radio secondary">
            <input :id="panelid('middle')" name="Myvalign" type="radio" v-model="Myvalign" value="middle">
                <label :for="panelid('middle')">
                    <i class="fa fa-arrows-h">
                    </i>
                    @lang("Middle")
                </label>
                <br/>
            </input>
        </div>
        <!-- END OF .radio primary -->
        <div class="radio secondary">
            <input :id="panelid('bottom')" name="Myvalign" type="radio" v-model="Myvalign" value="bottom">
                <label :for="panelid('bottom')">
                    <i class="fa fa-caret-square-o-left">
                    </i>
                    @lang("Bottom")
                </label>
            </input>
            <br/>
        </div>
        <br/>
        <br/>
        <!-- END OF .radio primary -->
        <input :id="panelid('offsetslider')" @update="updateoffset()" type="hidden"/>
        <div class="row align-left">
            <div class="column shrink">
                <a @click="update()" class="button fabu fa-plus before" data-close="">
                    @lang("Save Changes")
                </a>
            </div>
            <!-- END OF .column -->
            <div class="column small-12 medium-expand" style="text-align:right">
                <a @click.prevent="del()" class="button alert fabu fa-times cover" data-close="" href="#">
                    @lang("Delete Column")
                </a>
            </div>
        </div>
    </div>
</div>
`,
    data()
    {
        return {
            Mysize: 'auto',
            Myvalign: 'top',
            Myoffset: '',
            id: -1,
            newSize: 'auto',
            smallsize: '',
            mediumsize: '',
            largesize: ''
        };
    },
    computed:
    {
        smallsizeClass()
        {
            if (this.Mysize != 'exact' || this.smallsize == 0) return '';
            return "small-" + this.smallsize;
        },
        mediumsizeClass()
        {
            if (this.Mysize != 'exact' || this.smediumize == 0) return '';
            return "medium-" + this.mediumsize;
        },
        largesizeClass()
        {
            if (this.Mysize != 'exact' || this.largesize == 0) return '';
            return "large-" + this.largesize;
        },
        MyoffsetClass()
        {
            return (this.Myoffset == '') ? '' : "small-offset-" + this.Myoffset;
        },
        MysizeClass()
        {
            if (this.Mysize == 'exact') return '';
            return this.Mysize;
        },
        MyClassObject()
        {
            return [
            {
                'align-top': this.Myvalign == 'top',
                'align-middle': this.Myvalign == 'middle',
                'align-bottom': this.Myvalign == 'bottom',
                'column': true
            }, this.MyoffsetClass, this.smallsizeClass, this.mediumsizeClass, this.largesizeClass, this.MysizeClass];
        },
        columnid()
        {
            return "column_" + this.id;
        }
    },
    watch:
    {
        // whenever question changes, this function will run
        newSize: function()
        {
            if (this.newSize == 'exact')
            {
                // alert("change");
                setTimeout(function()
                {
                    $(document).foundation();
                    // alert("reflow now");
                }, 10);
            }
        },
        Myvalign()
        {
            this.$emit("cvalign", this.Myvalign);
        },
        Myoffset()
        {
            this.$emit("coffset", this.Myoffset);
        },
        Mysize()
        {
            this.$emit("csize", this.Mysize);
        },
        smallsize()
        {
            this.$emit("csmall", this.smallsize);
        },
        mediumsize()
        {
            this.$emit("cmedium", this.mediumsize);
        },
        largesize()
        {
            this.$emit("clarge", this.largesize);
        }
    },
    mounted()
    {
        function s4()
        {
            return Math.floor((1 + Math.random()) * 0x10000).toString(16).substring(1);
        }
        this.id = s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4() + "_modal";
        this.Mysize = this.size;
        this.Myvalign = this.valign;
        this.Myoffset = this.offset;
        this.smallsize = this.small;
        this.mediumsize = this.medium;
        this.largesize = this.large;
    },
    methods:
    {
        del()
        {
            this.$emit("deld");
        },
        updatesizes()
        {
            this.smallsize = $("#" + this.panelid('mobileslider')).val();
            this.mediumsize = $("#" + this.panelid('tabletslider')).val();
            this.largesize = $("#" + this.panelid('desktopslider')).val();
        },
        updateoffset()
        {
            this.Myoffset = $("#" + this.panelid('offsetslider')).val();
        },
        open()
        {
            $('#' + this.id).foundation();
            $('#' + this.id).foundation('open');
            this.Mysize = 'auto';
        },
        panelhref(i)
        {
            return "#panel_" + i + "_" + this.id;
        },
        panelid(i)
        {
            return "panel_" + i + "_" + this.id;
        },
        update()
        {
            this.updatesizes();
            this.updateoffset();
            this.Mysize = this.newSize;
        },
        toRow()
        {
            $('#' + this.id).foundation('close');
            this.$emit('openRow');
        }
    }
});