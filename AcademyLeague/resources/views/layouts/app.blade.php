@include('layouts.init')

<body class="themebgcolor">
    <div class="circlebg1" style="--radialgradient-color: {{auth()->user()->banner_color ?? '#3e5175'}};"></div>
    <!-- <div class="circlebg2"><img class="img-fluid" src="/img/circlebg20.svg" alt="img"></div>
    <div class="circlebg3"><img class="img-fluid" src="/img/circlebg21.svg" alt="img"></div> -->

    <!-- Navigation -->
    @include('blocks.nav')

    <!-- Error messages -->
    <!-- @include('inc.messages')  -->

    <!-- Content -->
    <div class="container-fluid" id="app">
        <div class="row d-flex flex-wrap-reverse">
            <!-- Sidebar left -->
            <div class="col-lg-1 col-md-12">
                @include('blocks.sidebarleft')
            </div>

            <!-- Content -->
            <div class="col-lg-10 col-md-12">
                @yield('content')
            </div>

            <!-- Sidebar right -->
            <div class="col-lg-1 col-md-12">
                @include('blocks.sidebarright')
            </div>
        </div>

    </div>
</body>

</html>