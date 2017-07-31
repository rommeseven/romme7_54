Vue.component('reviewrow',
{
    props: ["align", "cols","me","current"],
    // components:{reviewcol},
    template: `
<div :class="MyClassObject">
    <reviewcol :key="column.id" :html="column.html" :me="column.id" :small="column.small" :medium="column.medium" :large="column.large" :offset="column.offset" :current="current" @choseMe="choseCol(column.id)" :size="column.size" :valign="column.valign" v-for="(column,index) in cols"  >
    </reviewcol>
</div>
    `,
    data()
    {
        return {

        };
    },
    computed:
    {
        MyClassObject: function()
        {
            return {
                'align-left': this.align == 'left',
                'align-right': this.align == 'right',
                'align-center': this.align == 'center',
                'align-justify': this.align == 'justify',
                'align-spaced': this.align == 'spaced',
                'row': true
            }
        }
    },
    mounted()
    {
      
    },
    methods:
    {
        choseCol(col)
        {
            alert('choseme row');

            this.$emit("chose",col);
        }
    }
});