@extends('backend.layouts.main')

@push('title')
Available Roles
@endpush


@push('content')
<div class="row align-justify">
    <div class="small-12 medium-expand columns">
        <h3>
            {{ $searched or 'Available Roles:' }}
        </h3>
    </div>
    <!-- END OF .small-12 large-stack columns -->
    <div class="small-12 medium-expand columns" style="text-align:right">

        <a class="button responsive_button fabu fa-search secondary before" data-toggle="search_panel" href="#find">
            Find
            @if(isset($searched))
 Another 
@endif
Role
        </a>

        @if(isset($searched))
        <a class="button responsive_button fabu fa-list-alt primary before" data-toggle="search_panel" href="{{ url('/manage/roles') }}">
            All Available Roles
        </a>
        @else
        <a class="button responsive_button fabu fa-plus cover" href="{{ url('/manage/roles/create') }}">
            Create New Role
        </a>
        @endif        
    </div>
    <!-- END OF .small-8 small-offset-2  medium-4 medium-offset-7 columns -->
</div>
<!-- END OF .row -->
<div class="row align-center hiddenPanel" data-animate="hinge-in-from-top hinge-out-from-top" data-toggler="" id="search_panel">
    <div class="column small-12 medium-9 large-7 columns">
        <form action="{{ url('/manage/roles/find') }}" method="POST">
            {{csrf_field()}}
            <label for="search">
                Find Role:
                <div class="input-group">
                    <input id="search" name="search" placeholder="Find by Role or Permission" type="text"/>
                    <div class="input-group-button">
                        <button class="button button-icon">
                            <i class="fa fa-search">
                            </i>
                        </button>
                    </div>
                </div>
@if ($errors->has('search'))
<small class="errortext">
    {{ $errors->first('search') }}
</small>
@endif
            </label>
        </form>
    </div>
</div>
<!-- END OF .column small-12 medium-9 large-7 columns -->
<!-- END OF .row align-center -->
<div class="row align-center hide-for-large">
    <div class="column shrink">
        {!! $roles->render() !!}
    </div>
    <!-- END OF .column shrink -->
</div>
<!-- END OF .row align-center -->

<div class="row small-up-1 medium-up-3 large-up-5" data-equalizer="" data-equalize-by-row="true">
    <div class="column">
        <div class="callout primary" data-equalizer-watch="">
            <div class="row collapse">
                <h5>Superadministrator</h5>
                <br />
                <small>superadmin</small>
                <p>Officiis in consectetur praesentium dolorem tenetur omnis similique non numquam.</p>
            </div><!-- END OF .row collapse -->
            <div class="row collapse align-spaced align-bottom">
                <div class="colum"><a href="" class="button">Action #</a></div><!-- END OF .colum -->
                <div class="colum"><a href="" class="button">Action #</a></div><!-- END OF .colum -->
            </div><!-- END OF .row collapse align-spaced align-bottom -->
        </div><!-- END OF .callout primary -->
    </div><!-- END OF .column -->
    <div class="column">
        <div class="callout primary" data-equalizer-watch="">
            <div class="row collapse">
                <h5>Superadministrator</h5>
                <br />
                <small>superadmin</small>
                <p>Minima perspiciatis, dolore necessitatibus impedit repudiandae. Non, voluptatum distinctio numquam?</p>
            </div><!-- END OF .row collapse -->
            <div class="row collapse align-spaced align-bottom">
                <div class="colum"><a href="" class="button">Action #</a></div><!-- END OF .colum -->
                <div class="colum"><a href="" class="button">Action #</a></div><!-- END OF .colum -->
            </div><!-- END OF .row collapse align-spaced align-bottom -->
        </div><!-- END OF .callout primary -->
    </div><!-- END OF .column -->
    <div class="column">
        <div class="callout primary" data-equalizer-watch="">
            <div class="row collapse">
                <h5>Superadministrator</h5>
                <br />
                <small>superadmin</small>
                <p>Pariatur praesentium facilis officia, ut omnis, cumque molestiae minus enim.</p>
            </div><!-- END OF .row collapse -->
            <div class="row collapse align-spaced align-bottom">
                <div class="colum"><a href="" class="button">Action #</a></div><!-- END OF .colum -->
                <div class="colum"><a href="" class="button">Action #</a></div><!-- END OF .colum -->
            </div><!-- END OF .row collapse align-spaced align-bottom -->
        </div><!-- END OF .callout primary -->
    </div><!-- END OF .column -->
    <div class="column">
        <div class="callout primary" data-equalizer-watch="">
            <div class="row collapse">
                <h5>Superadministrator</h5>
                <br />
                <small>superadmin</small>
                <p>Sed ducimus quae autem quibusdam esse illum in at maiores.</p>
            </div><!-- END OF .row collapse -->
            <div class="row collapse align-spaced align-bottom">
                <div class="colum"><a href="" class="button">Action #</a></div><!-- END OF .colum -->
                <div class="colum"><a href="" class="button">Action #</a></div><!-- END OF .colum -->
            </div><!-- END OF .row collapse align-spaced align-bottom -->
        </div><!-- END OF .callout primary -->
    </div><!-- END OF .column -->
    <div class="column">
        <div class="callout primary" data-equalizer-watch="">
            <div class="row collapse">
                <h5>Superadministrator</h5>
                <br />
                <small>superadmin</small>
                <p>Consequatur nemo maxime sed obcaecati earum velit eos repellendus laborum.</p>
            </div><!-- END OF .row collapse -->
            <div class="row collapse align-spaced align-bottom">
                <div class="colum"><a href="" class="button">Action #</a></div><!-- END OF .colum -->
                <div class="colum"><a href="" class="button">Action #</a></div><!-- END OF .colum -->
            </div><!-- END OF .row collapse align-spaced align-bottom -->
        </div><!-- END OF .callout primary -->
    </div><!-- END OF .column -->
    <div class="column">
        <div class="callout primary" data-equalizer-watch="">
            <div class="row collapse">
                <h5>Superadministrator</h5>
                <br />
                <small>superadmin</small>
                <p>Vel commodi dicta velit veritatis eveniet explicabo voluptatem reprehenderit amet!</p>
            </div><!-- END OF .row collapse -->
            <div class="row collapse align-spaced align-bottom">
                <div class="colum"><a href="" class="button">Action #</a></div><!-- END OF .colum -->
                <div class="colum"><a href="" class="button">Action #</a></div><!-- END OF .colum -->
            </div><!-- END OF .row collapse align-spaced align-bottom -->
        </div><!-- END OF .callout primary -->
    </div><!-- END OF .column -->
    <div class="column">
        <div class="callout primary" data-equalizer-watch="">
            <div class="row collapse">
                <h5>Superadministrator</h5>
                <br />
                <small>superadmin</small>
                <p>Ea possimus voluptatibus ipsam saepe facere blanditiis culpa consequuntur recusandae.</p>
            </div><!-- END OF .row collapse -->
            <div class="row collapse align-spaced align-bottom">
                <div class="colum"><a href="" class="button">Action #</a></div><!-- END OF .colum -->
                <div class="colum"><a href="" class="button">Action #</a></div><!-- END OF .colum -->
            </div><!-- END OF .row collapse align-spaced align-bottom -->
        </div><!-- END OF .callout primary -->
    </div><!-- END OF .column -->
    <div class="column">
        <div class="callout primary" data-equalizer-watch="">
            <div class="row collapse">
                <h5>Superadministrator</h5>
                <br />
                <small>superadmin</small>
                <p>Officiis, eius, quas. Reprehenderit labore quaerat, tempora dolorem necessitatibus dolores.</p>
            </div><!-- END OF .row collapse -->
            <div class="row collapse align-spaced align-bottom">
                <div class="colum"><a href="" class="button">Action #</a></div><!-- END OF .colum -->
                <div class="colum"><a href="" class="button">Action #</a></div><!-- END OF .colum -->
            </div><!-- END OF .row collapse align-spaced align-bottom -->
        </div><!-- END OF .callout primary -->
    </div><!-- END OF .column -->
    <div class="column">
        <div class="callout primary" data-equalizer-watch="">
            <div class="row collapse">
                <h5>Superadministrator</h5>
                <br />
                <small>superadmin</small>
                <p>Doloribus sed asperiores hic maiores iure repudiandae facere fugiat perferendis.</p>
            </div><!-- END OF .row collapse -->
            <div class="row collapse align-spaced align-bottom">
                <div class="colum"><a href="" class="button">Action #</a></div><!-- END OF .colum -->
                <div class="colum"><a href="" class="button">Action #</a></div><!-- END OF .colum -->
            </div><!-- END OF .row collapse align-spaced align-bottom -->
        </div><!-- END OF .callout primary -->
    </div><!-- END OF .column -->
    <div class="column">
        <div class="callout primary" data-equalizer-watch="">
            <div class="row collapse">
                <h5>Superadministrator</h5>
                <br />
                <small>superadmin</small>
                <p>Voluptatem enim nisi, rerum, aut iusto consectetur ab maxime soluta.</p>
            </div><!-- END OF .row collapse -->
            <div class="row collapse align-spaced align-bottom">
                <div class="colum"><a href="" class="button">Action #</a></div><!-- END OF .colum -->
                <div class="colum"><a href="" class="button">Action #</a></div><!-- END OF .colum -->
            </div><!-- END OF .row collapse align-spaced align-bottom -->
        </div><!-- END OF .callout primary -->
    </div><!-- END OF .column -->
</div><!-- END OF .row small-up-1 medium-up-3 large-up-5 -->
@endpush



@push('extracss')
<style>
    .topcontent
{
padding-top:24px;
}
</style>
@endpush
{{-- 
@if(isset($searched))
@push('extrajs')
<script>
$( "table>tbody>tr>td:not(:has(*))" ).each(function( index ) {

var src_str = $(this).html();
var term = "{{$searchQuery}}";
term = term.replace(/(\s+)/,"(<[^>]+>)*$1(<[^>]+>)*");
var pattern = new RegExp("("+term+")", "gi");

src_str = src_str.replace(pattern, "<mark>$1</mark>");
src_str = src_str.replace(/(<mark>[^<>]*)((<[^>]+>)+)([^<>]*<\/mark>)/,"$1</mark>$2<mark>$4");

$(this).html(src_str);
});

</script>
@endpush
@endif
 --}}
