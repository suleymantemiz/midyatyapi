<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.head')

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    @include('layouts.admin.topstrip')
    @include('layouts.admin.sidebar')
    <!--  Main wrapper -->
    <div class="body-wrapper">
     @include('layouts.admin.header')
      @yield('content')
    </div>

  </div>
  @include('layouts.admin.script')
</body>

</html>