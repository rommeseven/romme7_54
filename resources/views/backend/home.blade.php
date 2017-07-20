@extends('backend.layouts.main')

@push("title","Dashboard")
@push('content')

    <div class="row">
        <h2>
            Choose an action:
        </h2>
    </div>
    <!-- END OF .row -->
    <div class="row align-center">
        <div class="small-12 column">
            <div class="row small-up-1 medium-up-2 large-up-4">
                <div class="column">
                    <div class="card">
                        <div class="card-divider">
                            <h3>
                                Action 1
                            </h3>
                        </div>
                        <!-- END OF .card-divider -->
                        <div class="card-section foundation-flex align-middle align-spaced">
                            <i class="fa fa-camera-retro fa-5x">
                            </i>
                            <i class="fa fa-camera-retro fa-5x">
                            </i>
                        </div>
                        <!-- END OF .card-section -->
                        <div class="card-section">
                            Fuga veniam nobis culpa, accusamus eligendi consequuntur expedita consequatur sit voluptatum quisquam est esse iusto veritatis, cupiditate harum, rerum minus beatae alias illo numquam! Quod explicabo facere facilis veritatis architecto!
                        </div>
                        <!-- END OF .card-section -->
                    </div>
                    <!-- END OF .card -->
                </div>
                <!-- END OF .column -->
                <div class="column">
                    <div class="card">
                        <div class="card-divider">
                            <h3>
                                Action 2
                            </h3>
                        </div>
                        <!-- END OF .card-divider -->
                        <img alt="" src=""/>
                        <card-section>
                            Cupiditate dolorum ipsum maiores quos, error ipsa inventore quae nulla ducimus, ipsam provident fugiat.
                        </card-section>
                    </div>
                    <!-- END OF .card -->
                </div>
                <!-- END OF .column -->
                <div class="column">
                    <div class="card">
                        <div class="card-divider">
                            <h3>
                                Action 3
                            </h3>
                        </div>
                        <!-- END OF .card-divider -->
                        <img alt="" src=""/>
                        <card-section>
                            Iste illo odit rerum quasi nulla, autem cumque. Similique architecto aspernatur magnam blanditiis quas!
                        </card-section>
                    </div>
                    <!-- END OF .card -->
                </div>
                <!-- END OF .column -->
                <div class="column">
                    <div class="card">
                        <div class="card-divider">
                            <h3>
                                Action 4
                            </h3>
                        </div>
                        <!-- END OF .card-divider -->
                        <img alt="" src=""/>
                        <card-section>
                            Libero tempora, natus hic enim aspernatur possimus ipsam aliquid maiores, magni accusantium, ab, unde.
                        </card-section>
                    </div>
                    <!-- END OF .card -->
                </div>
                <!-- END OF .column -->
            </div>
            <!-- END OF .row small-up-1 medium-up-2 large-up-4 -->
        </div>
        <!-- END OF .small-12 column -->
    </div>
    <!-- END OF .row align-center -->
@endpush

@push('bottomcontent')


    <h2>
        Visit Statistics:
    </h2>
    <div class="row">
        <div class="column small-12 medium-9">
            <img alt="" src=""/>
        </div>
        <!-- END OF .column small-12 medium-9 -->
        <div class="column small-12 small-centered medium-uncentered medium-3">
            <br/>
            <button class="button">
                Totam.
            </button>
            <button class="button">
                Maxime.
            </button>
        </div>
        <!-- END OF .column small-12 small-centered medium-uncentered medium-3 -->
    </div>
    <!-- END OF .row -->
@endpush

@push('footer')


    <div class="column">
        <h3>
            Bla Bla
        </h3>
        <ul class="menu vertical">
            <li>
                <a href="">
                    Omnis.
                </a>
            </li>
            <li>
                <a href="">
                    Debitis!
                </a>
            </li>
            <li>
                <a href="">
                    Quaerat.
                </a>
            </li>
            <li>
                <a href="">
                    Facilis.
                </a>
            </li>
            <li>
                <a href="">
                    Corporis.
                </a>
            </li>
        </ul>
        <!-- END OF .menu vertical -->
    </div>
    <!-- END OF .column -->
    <div class="column">
        <h3>
            Bla Bla
        </h3>
        <ul class="menu vertical">
            <li>
                <a href="">
                    Repellendus.
                </a>
            </li>
            <li>
                <a href="">
                    Totam.
                </a>
            </li>
            <li>
                <a href="">
                    Vitae.
                </a>
            </li>
            <li>
                <a href="">
                    Quia.
                </a>
            </li>
            <li>
                <a href="">
                    Fuga.
                </a>
            </li>
        </ul>
        <!-- END OF .menu vertical -->
    </div>
    <!-- END OF .column -->
    <div class="column">
        <h3>
            Bla Bla
        </h3>
        <ul class="menu vertical">
            <li>
                <a href="">
                    Veritatis!
                </a>
            </li>
            <li>
                <a href="">
                    Eveniet.
                </a>
            </li>
            <li>
                <a href="">
                    Tempora.
                </a>
            </li>
            <li>
                <a href="">
                    Minima!
                </a>
            </li>
            <li>
                <a href="">
                    Pariatur!
                </a>
            </li>
        </ul>
        <!-- END OF .menu vertical -->
    </div>
    <!-- END OF .column -->
@endpush

@push('content')
<!-- END OF .container -->
<form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
@endpush