Vue.component('editorrow',
{
    props: ["align", "cols","preview"],
    // components:{editorcol},
    template: `
    <div :class="MyClassObject" title="Edit Row"  @click.self="open()">
    <editorcol :preview="preview" v-for="(column,index) in MyColumns"  :size="column.size" @deld="delcol(index)" :valign="column.valign" :offset="column.offset" :key="column.id"></editorcol>
<div :id="id" class="editor-ignore reveal large" data-reveal="">
    <div class="row collapse align-bottom">
        <div class="column small-12 medium-expand">
 <label :for="panelid('spaced')">
            Align
        </label>
        <div class="radio secondary">
            <input :id="panelid('spaced')" name="Myalign" type="radio" v-model="Myalign" value="spaced">
                <label :for="panelid('spaced')"><i class="fa fa-exchange">
                    </i>Auto
                </label>
                <br/>
            </input>
        </div>
        <!-- END OF .radio primary -->
        <div class="radio secondary">
            <input :id="panelid('left')" name="Myalign" type="radio" v-model="Myalign" value="left">
                <label :for="panelid('left')"><i class="fa fa-align-left">
                    </i>Left
                </label>
                <br/>
            </input>
        </div>
        <!-- END OF .radio primary -->
        <div class="radio secondary">
            <input :id="panelid('right')" name="Myalign" type="radio" v-model="Myalign" value="right">
                <label :for="panelid('right')"><i class="fa fa-align-right">
                    </i>Right
                </label>
            </input>
            <br/>
        </div>
        <!-- END OF .radio primary -->
        <div class="radio secondary">
            <input :id="panelid('center')" name="Myalign" type="radio" v-model="Myalign" value="center">
                <label :for="panelid('center')"><i class="fa fa-align-center">
                    </i>Center
                </label>
                <br/>
            </input>
        </div>
        <!-- END OF .radio primary -->
        <div class="radio secondary">
            <input :id="panelid('justify')" name="Myalign" type="radio" v-model="Myalign" value="justify">
                <label :for="panelid('justify')">
                    <i class="fa fa-align-justify">
                    </i>Justify
                </label>
                <br/>
            </input>
        </div>
        <br/>
        <button aria-label="Dismiss alert" class="close-button" data-close="" type="button">
                <span aria-hidden="true">
                    ×
                </span>
            </button>
            

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
            <a href="#" class="button alert fabu fa-times cover" @click.prevent="del()" data-close>Delete Row</a>

            </div>
    </div>

</div>    
    </div>
    `,
    data()
    {
        return {
            MyColumns: [],
            id: -1,
            Myalign:''
        };
    },
    computed:
    {
        MyClassObject: function()
        {
            return {
                'align-left': this.Myalign == 'left',
                'align-right': this.Myalign == 'right',
                'align-center': this.Myalign == 'center',
                'align-justify': this.Myalign == 'justify',
                'align-spaced': this.Myalign == 'spaced',
                'row': true
            }
        }
    },
    mounted()
    {
        this.MyColumns = this.cols;
        this.Myalign = this.align;
        function s4()
        {
            return Math.floor((1 + Math.random()) * 0x10000).toString(16).substring(1);
        }
        this.id = s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4() + "_modalrow";
        this.Mysize = this.size;
        this.Myvalign = this.valign;
        this.Myoffset = this.offset;
    },
    methods:
    {
        del()
        {
            this.$emit("nocol");
        },
        delcol(row)
        {
            this.MyColumns.splice(this.MyColumns.indexOf(row));
            if (!Object.keys(this.MyColumns).length) this.$emit("nocol");
        },
        open()
        {
            $('#' + this.id).foundation();
            $('#' + this.id).foundation('open');
        },
        panelid(i)
        {
            return "panel_" + i + "_" + this.id;
        }
    }
});