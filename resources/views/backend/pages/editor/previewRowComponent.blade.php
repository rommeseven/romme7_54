Vue.component('previewrow',
{
    props: ["align", "cols"],
    // components:{reviewcol},
    template: `
<div :class="MyClassObject">
    <previewcol :key="column.id" :html="column.html" :me="column.id" :small="column.small" :medium="column.medium" :large="column.large" :offset="column.offset" :size="column.size" :valign="column.valign" v-for="(column,index) in cols"  >
    </previewcol>
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
    }
});