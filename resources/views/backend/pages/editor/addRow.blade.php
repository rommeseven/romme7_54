@push('content')
<div class="reveal" data-reveal="" id="addRow">
    <div id="addRow_app">
        <button aria-label="Dismiss alert" class="close-button" data-close="" type="button">
            <span aria-hidden="true">
                ×
            </span>
        </button>
        <label for="spaced">
            Align
        </label>
        <div class="radio secondary">
            <input id="spaced" name="newRowAlign" type="radio" v-model="newRowAlign" value="spaced">
                <label for="spaced"><i class="fa fa-exchange">
                    </i>Auto
                </label>
                <br/>
            </input>
        </div>
        <!-- END OF .radio primary -->
        <div class="radio secondary">
            <input id="left" name="newRowAlign" type="radio" v-model="newRowAlign" value="left">
                <label for="left"><i class="fa fa-align-left">
                    </i>Left
                </label>
                <br/>
            </input>
        </div>
        <!-- END OF .radio primary -->
        <div class="radio secondary">
            <input id="right" name="newRowAlign" type="radio" v-model="newRowAlign" value="right">
                <label for="right"><i class="fa fa-align-right">
                    </i>Right
                </label>
            </input>
            <br/>
        </div>
        <!-- END OF .radio primary -->
        <div class="radio secondary">
            <input id="center" name="newRowAlign" type="radio" v-model="newRowAlign" value="center">
                <label for="center"><i class="fa fa-align-center">
                    </i>Center
                </label>
                <br/>
            </input>
        </div>
        <!-- END OF .radio primary -->
        <div class="radio secondary">
            <input id="justify" name="newRowAlign" type="radio" v-model="newRowAlign" value="justify">
                <label for="justify">
                    <i class="fa fa-align-justify">
                    </i>Justify
                </label>
                <br/>
            </input>
        </div>
        <br/>
        <label for="col1">
            Number of Columns
        </label>
        <div class="row collapse align-left">
            <div class="column shrink">
                <div class="radio secondary">
                    <input id="col1" name="colCount" type="radio" v-model="colCount" value="1"><label for="col1">One</label>
                    </input>
                </div>
            </div>
            <!-- END OF .column -->
            <div class="column shrink">
                <div class="radio secondary">
                    <input id="col2" name="colCount" type="radio" v-model="colCount" value="2"><label for="col2">Two
                        </label>
                    </input>
                </div>
            </div>
            <!-- END OF .column -->
            <div class="column shrink">
                <div class="radio secondary">
                    <input id="col3" name="colCount" type="radio" v-model="colCount" value="3"><label for="col3">Three
                        </label>
                    </input>
                </div>
            </div>
            <!-- END OF .column -->
            <div class="column shrink">
                <div class="radio secondary">
                    <input id="col4" name="colCount" type="radio" v-model="colCount" value="4"><label for="col4">Four
                        </label>
                    </input>
                </div>
            </div>
            <!-- END OF .column -->
        </div>
        <br/>
        <!-- END OF .row -->
        <div class="row align-left">
            <div class="column shrink">
                <a @click.prevent="close()" class="button fabu fa-plus before">
                    Add Row
                </a>
            </div>
            <!-- END OF .column -->
        </div>
        <!-- END OF .row -->
    </div>
    <!-- END OF #addRow_app -->
</div>
@endpush
@push('extrajs')
<script>
    let addRow_app = new Vue(
{
    el: '#addRow_app',
    data:
    {
        newRowAlign: 'spaced',
        colCount: 1
    },
    methods:
    {
        close()
        {
            $('#addRow').foundation('close');
  
            //EventBus.$emit('generateRows', {align:this.newRowAlign,colCount:this.colCount});      
            let newrow = {
                align:this.newRowAlign,
                cols:[]
            };
            for (var i = this.colCount; i > 0; i--) {
                let col = {
                    size:'auto',
            valign:'top',
            offset:''
                };
                newrow.cols.push(col);

            };
            
            app.rows.push(newrow);

        }
    }
});
</script>
@endpush
