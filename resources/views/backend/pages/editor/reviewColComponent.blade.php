let editorcol = Vue.component('reviewcol',
{
    props: ["size", "valign", "offset", "preview", "medium", "small", "html","large","me", "current"],
    template: `
<div :class="MyClassObject" :data-id="id" @click="$emit('choseMe')">
    
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
                'column': true,
                'active': this.me == this.current,
                'completed': (!(!this.html))
            }, this.MyoffsetClass, this.smallsizeClass, this.mediumsizeClass, this.largesizeClass, this.MysizeClass];
        },
        columnid()
        {
            return "column_" + this.id;
        }
    },
    watch:
    {
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
    
    }
});