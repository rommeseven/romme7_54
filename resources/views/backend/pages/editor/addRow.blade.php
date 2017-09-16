@push('outside_app')
<div class="reveal" data-reveal="" id="addRow">
    <div id="addRow_app">
        <button aria-label="Dismiss alert" class="close-button" data-close="" type="button">
            <span aria-hidden="true">
                ×
            </span>
        </button>
        <label for="spaced">
            @lang("Align")
        </label>
        <div class="radio secondary">
            <input id="spaced" name="newRowAlign" type="radio" v-model="newRowAlign" value="spaced">
                <label for="spaced"><i class="fa fa-exchange">
                    </i>@lang("Auto")
                </label>
                <br/>
            </input>
        </div>
        <!-- END OF .radio primary -->
        <div class="radio secondary">
            <input id="left" name="newRowAlign" type="radio" v-model="newRowAlign" value="left">
                <label for="left"><i class="fa fa-align-left">
                    </i>@lang("Left")
                </label>
                <br/>
            </input>
        </div>
        <!-- END OF .radio primary -->
        <div class="radio secondary">
            <input id="right" name="newRowAlign" type="radio" v-model="newRowAlign" value="right">
                <label for="right"><i class="fa fa-align-right">
                    </i>@lang("Right")
                </label>
            </input>
            <br/>
        </div>
        <!-- END OF .radio primary -->
        <div class="radio secondary">
            <input id="center" name="newRowAlign" type="radio" v-model="newRowAlign" value="center">
                <label for="center"><i class="fa fa-align-center">
                    </i>@lang("Center")
                </label>
                <br/>
            </input>
        </div>
        <!-- END OF .radio primary -->
        <div class="radio secondary">
            <input id="justify" name="newRowAlign" type="radio" v-model="newRowAlign" value="justify">
                <label for="justify">
                    <i class="fa fa-align-justify">
                    </i>@lang("Justify")
                </label>
                <br/>
            </input>
        </div>
        <br/>
        <label for="col1">
            @lang("Number of Columns")
        </label>
        <div class="row collapse align-left">
            <div class="column shrink">
                <div class="radio secondary">
                    <input id="col1" name="colCount" type="radio" v-model="colCount" value="1"><label for="col1">@lang("One")</label>
                    </input>
                </div>
            </div>
            <!-- END OF .column -->
            <div class="column shrink">
                <div class="radio secondary">
                    <input id="col2" name="colCount" type="radio" v-model="colCount" value="2"><label for="col2">@lang("Two")
                        </label>
                    </input>
                </div>
            </div>
            <!-- END OF .column -->
            <div class="column shrink">
                <div class="radio secondary">
                    <input id="col3" name="colCount" type="radio" v-model="colCount" value="3"><label for="col3">@lang("Three")
                        </label>
                    </input>
                </div>
            </div>
            <!-- END OF .column -->
            <div class="column shrink">
                <div class="radio secondary">
                    <input id="col4" name="colCount" type="radio" v-model="colCount" value="4"><label for="col4">@lang("Four")
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
                    @lang("Add Row")
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
            let newrow = {
                align:this.newRowAlign,
                cols:[]
            };
            for (var i = this.colCount; i > 0; i--) {
                let col = {
                    size:'auto',
                    valign:'top',
                    offset:'',
                    small: '',
                    medium: '',
                    large: ''                    
                };
                newrow.cols.push(col);

            };
            app.rows.push(newrow);
            $('html, body').animate({
                    scrollTop: $("#layoutsavebtn").offset().top
                }, 1000);   
        }
    }
});
</script>
@endpush
