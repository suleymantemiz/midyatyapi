<!DOCTYPE html>
<html lang="tr">
@include('layouts.web.head')
<body>
@include('layouts.web.nav')
@yield('hero')
@yield('fto')
@yield('goto-here')
@yield('full-width')
@yield('image')
@yield('section')
@yield('testimonials')
@yield('agent')
@yield('pt')


@yield('content')



@include('layouts.web.footer')
@include('layouts.web.loader')
@include('layouts.web.script')

@yield('scripts')
</body>
</html>
