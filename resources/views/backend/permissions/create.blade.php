@extends('backend.layouts.main')

@push('title')
Create New Permission
@endpush


@push('content')
<div id="app">
    <form action="{{ url('manage/permissions') }}" method="POST">
        <div class="row">
            <div class="column">
                <p>
                    <h3>
                        Creating A New Permission
                    </h3>
                </p>
            </div>
            <!-- END OF .column -->
        </div>
        <!-- END OF .row -->
        <div>
            {{csrf_field()}}
            <div class="row">
                <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
                    <label for="normal">
                        Type of Permission:
                    </label>
                    <div class="row align-left">
                        <div class="column shrink">
                            <div class="radio primary">
                                <input id="normal" name="type" required="" type="radio" v-model="type" value="normal">
                                    <label for="normal">
                                        Individual
                                    </label>
                                </input>
                            </div>
                            <!-- END OF .radio primary -->
                        </div>
                        <!-- END OF .column -->
                        <div class="column shrink">
                            <div class="radio success">
                                <input id="res" name="type" type="radio" v-model="type" value="resource">
                                    <label for="res">
                                        CRUD Generator
                                    </label>
                                </input>
                            </div>
                        </div>
                        <!-- END OF .column -->
                    </div>
                    <!-- END OF .row -->
                    <br/>
                    <!-- END OF .radio primary -->
                </div>
                <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
            </div>
            <transition name="fade">
                <div class="row" v-if="type=='normal'">
                    <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
                        <label for="name">
                            Name of Permission:
                            <input @keyup="autoslug($event.target.value)" name="name" id="name" placeholder="Visit Page XYZ" type="text" v-model="name"/>
                            @if ($errors->has('name'))
                            <small class="errortext">
                                {{ $errors->first('name') }}
                            </small>
                            @endif
                        </label>
                    </div>
                </div>
            </transition>
            <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
        </div>
        <transition name="fade">
            <div class="row" v-if="type=='normal'">
                <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
                    <label for="slug">
                        Permission slug:
                        <input @keydown.once="slugme()" id="slug" name="slug" placeholder="name-of-permission" type="text" v-model="slug"/>
                        @if ($errors->has('slug'))
                        <small class="errortext">
                            {{ $errors->first('slug') }}
                        </small>
                        @endif
                    </label>
                </div>
                <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
            </div>
        </transition>
        <!-- END OF .row -->
        <transition name="fade">
            <div class="row" v-if="type=='normal'">
                <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
                    <label for="description">
                        Description:
                        <input id="description" name="description" placeholder="Permission to ..." type="text"/>
                        @if ($errors->has('description'))
                        <small class="errortext">
                            {{ $errors->first('description') }}
                        </small>
                        @endif
                    </label>
                </div>
                <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
            </div>
        </transition>
        <!-- END OF .row -->
        <transition name="fade">
            <div class="row" v-if="type=='resource'">
                <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
                    <label for="resource">
                        Resource Name:
                        <input id="resource" name="resource" placeholder="e.g. Photos" type="text" v-model="resource"/>
                        @if ($errors->has('resource'))
                        <small class="errortext">
                            {{ $errors->first('resource') }}
                        </small>
                        @endif
                    </label>
                </div>
                <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
            </div>
        </transition>
        <transition name="fade">
            <div class="row align-left" v-if="type=='resource'">
                <div class="column shrink medium-offset-2 large-offset-1">
                    <div class="checkbox secondary">
                        <input class="styled" id="c" name="create" type="checkbox" v-model="c"/>
                        <label for="c">
                            Create
                        </label>
                        <br/>
                    </div>
                    <!-- END OF .checkbox secondary -->
                    <div class="checkbox secondary">
                        <input class="styled" id="r" name="read" type="checkbox" v-model="r"/>
                        <label for="r">
                            Read
                        </label>
                        <br/>
                    </div>
                    <!-- END OF .checkbox secondary -->
                    <div class="checkbox secondary">
                        <input class="styled" id="u" name="update" type="checkbox" v-model="u"/>
                        <label for="u">
                            Update
                        </label>
                        <br/>
                    </div>
                    <!-- END OF .checkbox secondary -->
                    <div class="checkbox secondary">
                        <input class="styled" id="d" name="delete" type="checkbox" v-model="d"/>
                        <label for="d">
                            Delete
                        </label>
                        <br/>
                        <br/>
                    </div>
                    <!-- END OF .checkbox secondary -->
                </div>
                <!-- END OF .column shrink -->
                <div class="column small-12 medium-10 medium-offset-1 large-6">
                    <table class="hover">
                        <thead>
                            <tr>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Slug
                                </th>
                                <th>
                                    Description
                                </th>
                            </tr>
                        </thead>
                        <tbody v-if="resource.length>=3">
                            <tr>
                                <td v-if="c" v-text="gen_n('create')">
                                </td>
                                <td v-if="c" v-text="gen_s('create')">
                                </td>
                                <td v-if="c" v-text="gen_d('create')">
                                </td>
                            </tr>
                            <tr>
                                <td v-if="r" v-text="gen_n('read')">
                                </td>
                                <td v-if="r" v-text="gen_s('read')">
                                </td>
                                <td v-if="r" v-text="gen_d('read')">
                                </td>
                            </tr>
                            <tr>
                                <td v-if="u" v-text="gen_n('update')">
                                </td>
                                <td v-if="u" v-text="gen_s('update')">
                                </td>
                                <td v-if="u" v-text="gen_d('update')">
                                </td>
                            </tr>
                            <tr>
                                <td v-if="d" v-text="gen_n('delete')">
                                </td>
                                <td v-if="d" v-text="gen_s('delete')">
                                </td>
                                <td v-if="d" v-text="gen_d('delete')">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- END OF .column -->
            </div>
            <!-- END OF .row align-spaced -->
            <!-- END OF .row -->
        </transition>
        <transition name="fade">
            <div class="row">
                <div class="column small-12 medium-7 medium-offset-2 large-6 large-offset-1">
                    <div class="row align-center">
                        <div class="column small-10 medium-8 large-5 small-offset-2 medium-offset-0 large-offset-7" v-if="type=='normal'">
                            <button class="button expanded fabu before fa-plus" type="submit">
                                Add New Permission
                            </button>
                        </div>
                        <div class="column small-10 medium-8 large-5 small-offset-2 medium-offset-0 large-offset-7" v-if="type=='resource'">
                            <button :disabled="(!c&&!r&&!u&&!d)" class="button expanded fabu cover fa-check" type="submit">
                                Generate Permissions
                            </button>
                        </div>
                        <!-- END OF .column small-10 medium-5 -->
                    </div>
                    <!-- END OF .row align-center -->
                </div>
                <!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
            </div>
        </transition>
    </form>
</div>
<!-- END OF #app -->
<!-- END OF .column small-12 medium-7 medium-offset-2 large-6 large-offset-1 -->
<!-- END OF .row -->
<!-- END OF #app -->
@endpush

@push('extracss')
<style>
    .topcontent
{
padding-top:24px;
}
</style>
@push('extrajs')
<script>
    let app = new Vue(
{
    el: '#app',
    data:
    {
        type: 
        @if($errors->has('resource'))
'resource'
@else
'normal'
@endif
        ,
        slug: '',
        name: '',
        resource: '',
        slugged: false,
        c: true,
        r: true,
        u: true,
        d: true,
    },
    methods:
    {
        autoslug(slug)
        {
            if (!this.slugged)
            {
                this.slug = slug.toLowerCase().replace(/\s+/g, '-') // Replace spaces with -
                    .replace(/[^\w\-]+/g, '') // Remove all non-word chars
                    .replace(/\-\-+/g, '-') // Replace multiple - with single -
                    .replace(/^-+/, '') // Trim - from start of text
                    .replace(/-+$/, ''); // Trim - from end of text
            }
        },
        slugme()
        {
            this.slugged = true;
        },
        gen_n(item)
        {
            return item.substr(0, 1).toUpperCase() + item.substr(1) + " " + app.resource.substr(0, 1).toUpperCase() + app.resource.substr(1);
        },
        gen_s(item)
        {
            let full = item+" "+app.resource;
            return full.toLowerCase().replace(/\s+/g, '-') // Replace spaces with -
                .replace(/[^\w\-]+/g, '') // Remove all non-word chars
                .replace(/\-\-+/g, '-') // Replace multiple - with single -
                .replace(/^-+/, '') // Trim - from start of text
                .replace(/-+$/, ''); // Trim - from end of text
        },
        gen_d(item)
        {
            return "Permission to " + item.substr(0,1).toUpperCase()+item.substr(1) + " " + app.resource.substr(0, 1).toUpperCase() + app.resource.substr(1);
        }
    }
});
</script>
@endpush
