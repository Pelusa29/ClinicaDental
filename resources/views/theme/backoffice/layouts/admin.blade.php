{{--
    title
    yield(head)
    content
    foot
--}}
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    @include('theme.backoffice.layouts.includes.head')
  </head>
  <body>
    @include('theme.backoffice.layouts.includes.loader')
    @include('theme.backoffice.layouts.includes.header')
    <!-- END HEADER -->


    <!-- START MAIN -->
    <div id="main">

      <div class="wrapper">
        @include('theme.backoffice.layouts.includes.left-sidebar')

        <section id="content">
            @include('theme.backoffice.layouts.includes.breadcums')
          <div class="container">
                @yield('content')
          </div>
        </section>
      </div>
    </div>

    @include('theme.backoffice.layouts.includes.footer')
    @include('theme.backoffice.layouts.includes.foot')
  </body>
</html>
