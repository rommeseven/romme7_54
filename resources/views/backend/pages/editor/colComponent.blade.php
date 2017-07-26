    let editorcol = Vue.component('editorcol',
    {
        props: ["size", "valign", "offset","preview"],
        template: `
    <div :class="MyClassObject" :data-id = "id" @click="open()">
        <div :id="id" title="Edit Column" class="editor-ignore reveal large" data-reveal="">
        <p>
            <h3>Column Settings</h3>
        </p>
    <div class="row collapse align-bottom">
        <div class="column small-12 medium-expand"><button aria-label="Dismiss alert" class="close-button" data-close="" type="button">
                <span aria-hidden="true">
                    ×
                </span>
            </button>
            <label for="spaced">
                Size
            </label>
            <div class="radio secondary">
                <input :id="panelid('auto')" name="newSize" type="radio" v-model="newSize" value="auto"><label :for="panelid('auto')">
                        <i class="fa fa-exchange">
                        </i>
                        Auto
                    </label>
                    <br/>
                </input>
            </div>
            <!-- END OF .radio primary -->
            <div class="radio secondary">
                <input :id="panelid('expand')" name="newSize" type="radio" v-model="newSize" value="expand"><label :for="panelid('expand')">
                        <i class="fa fa-arrows-h">
                        </i>
                        Expand
                    </label>
                    <br/>
                </input>
            </div>
            <!-- END OF .radio primary -->
            <div class="radio secondary">
                <input :id="panelid('shrink')" name="newSize" type="radio" v-model="newSize" value="shrink"><label :for="panelid('shrink')">
                        <i class="fa fa-caret-square-o-left">
                        </i>
                        Shrink
                    </label>
                </input>
                <br/>
            </div>
            <!-- END OF .radio primary -->
            <div class="radio secondary">
                <input   :id="panelid('exact')" name="newSize" type="radio" v-model="newSize" value="exact"><label   :for="panelid('exact')">
                        <i class="fa fa-bullseye">
                        </i>
                        Exact<span v-show="newSize=='exact'">:</span>
                    </label>
                    <br/><br/>
                </input>
            </div>
            <div v-show="newSize=='exact'">
            
            <ul class="tabs" :id="columnid" data-responsive-accordion-tabs="tabs small-accordion medium-accordion large-tabs" >
              <li class="tabs-title is-active"><a :href="panelhref(1)" aria-selected="true">Mobile</a></li>
              <li class="tabs-title"><a :href="panelhref(2)">Tablet (optional)</a></li>
              <li class="tabs-title"><a :href="panelhref(3)">Desktop (optional)</a></li>
            
            </ul>
            
            <div class="tabs-content" :data-tabs-content="columnid" >
              <div class="tabs-panel is-active" :id="panelid(1)">
                <p>
              <div class="slider" data-slider data-initial-start="12"  data-end="12" @click="updatesizes()" @moved.zf.slider="tellme()">
                <span class="slider-handle"  data-slider-handle role="slider" tabindex="1" :aria-controls="panelid('mobileslider')"></span>
                <span class="slider-fill" data-slider-fill></span>
              </div>
            
              <input type="hidden" @update="updatesizes()" :id="panelid('mobileslider')">
            
            
                </p>
              </div>
              <div class="tabs-panel" :id="panelid(2)">
             <p>
              <div class="slider" data-slider data-initial-start="0"  data-end="12" @click="updatesizes()" @moved.zf.slider="tellme()">
                <span class="slider-handle"  data-slider-handle role="slider" tabindex="1" :aria-controls="panelid('tabletslider')"></span>
                <span class="slider-fill" data-slider-fill></span>
              </div>
            
              <input type="hidden" @update="updatesizes()" :id="panelid('tabletslider')">
            
            
                </p>
            
              </div>
              <div class="tabs-panel" :id="panelid(3)">
             <p>
              <div class="slider" data-slider data-initial-start="0"  data-end="12" @click="updatesizes()" @moved.zf.slider="tellme()">
                <span class="slider-handle"  data-slider-handle role="slider" tabindex="1" :aria-controls="panelid('desktopslider')"></span>
                <span class="slider-fill" data-slider-fill></span>
              </div>
            
              <input type="hidden" @update="updatesizes()" :id="panelid('desktopslider')">
            
            
                </p>
              </div>
            </div>
            </div>
<label for="spaced">
                Offset
            </label>
                      <div class="slider" data-slider data-initial-start="0"  data-end="10" @click="updateoffset()">
                <span class="slider-handle"  data-slider-handle role="slider" tabindex="1" :aria-controls="panelid('offsetslider')"></span>
                <span class="slider-fill" data-slider-fill></span>
              </div>          
               <input type="hidden" @update="updateoffset()" :id="panelid('offsetslider')">
            <div class="row align-left">
                <div class="column shrink">
                    <a @click="update()" data-close class="button fabu fa-plus before">
                        Save Changes
                    </a>
                </div>
                <!-- END OF .column -->
            </div>
            <!-- END OF .row --></div>
            <div class="column small-12 medium-expand" style="text-align:right">
            <a href="#" class="button alert fabu fa-times cover" @click.prevent="del()" data-close>Delete Column</a>

            </div>
    </div>

</div></div>


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
                        $('body').foundation();
                        // alert("reflow now");
                    }, 10);
                }
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
            }
        }
    });