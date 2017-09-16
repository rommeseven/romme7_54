let editorlayout = Vue.component('editorlayout',
{
    props: ["owner","name", "rows","created_at"],
    template: `
<div class="card card-success" @click="$emit('choose')">
    <div class="card-divider" v-text="name">
    </div>
    <!-- END OF .card-divider -->
    <div class="card-section">
    <strong>@{{owner.name}}(@{{owner.username}})</strong> <br /> <small> @{{created_at}}
        </small>    
    </div>
    <!-- END OF .card-section -->
</div>
<!-- END OF .card -->
`,
    data()
    {

     return {};
    }
});
