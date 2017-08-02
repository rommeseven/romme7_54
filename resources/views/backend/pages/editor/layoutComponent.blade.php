let editorlayout = Vue.component('editorlayout',
{
    props: ["name", "rows","created_at"],
    template: `
<div class="card card-success" @click="$emit('choose')">
    <div class="card-divider" v-text="name">
    </div>
    <!-- END OF .card-divider -->
    <div class="card-section" v-text="when">
    </div>
    <!-- END OF .card-section -->
</div>
<!-- END OF .card -->
`,
    data()
    {

     return {};
    }
     ,
    computed:
    {
        when()
        {
        {{-- TODO: created at for humans @internet--}}
            return "Created at: " + this.created_at;
        }
    }
});
