<!DOCTYPE html>
<html lang="en">
  <head>
  @yield('title')

  @include('backend.includes.head')
  @yield('head.script')
  </head>
<body>

@include('backend.includes.header')

@include('backend.includes.sidebar')



<!--main-container-part-->
<div id="content">
  @yield('breadcrumb')

  <div class="container-fluid">
    @yield('content')

  </div>
</div>

<!--end-main-container-part-->

@include('backend.includes.footer')

<script src="{{ asset('backend/js/excanvas.min.js') }}"></script>
<script src="{{ asset('backend/js/jquery.min.js') }}"></script>
<script src="{{ asset('backend/js/jquery.ui.custom.js') }}"></script>
<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/js/jquery.flot.min.js') }}"></script>
<script src="{{ asset('backend/js/jquery.flot.resize.min.js') }}"></script>
<script src="{{ asset('backend/js/jquery.peity.min.js') }}"></script>
<script src="{{ asset('backend/js/fullcalendar.min.js') }}"></script>
<script src="{{ asset('backend/js/matrix.js') }}"></script>
<script src="{{ asset('backend/js/matrix.dashboard.js') }}"></script>
<script src="{{ asset('backend/js/jquery.gritter.min.js') }}"></script>
<script src="{{ asset('backend/js/matrix.interface.js') }}"></script>
<script src="{{ asset('backend/js/matrix.chat.js') }}"></script>
<script src="{{ asset('backend/js/jquery.validate.js') }}"></script>
<script src="{{ asset('backend/js/matrix.form_validation.js') }}"></script>
<script src="{{ asset('backend/js/jquery.wizard.js') }}"></script>
<script src="{{ asset('backend/js/jquery.uniform.js') }}"></script>
<script src="{{ asset('backend/js/select2.min.js') }}"></script>
<script src="{{ asset('backend/js/matrix.popover.js') }}"></script>
<script src="{{ asset('backend/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/js/matrix.tables.js') }}"></script>

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {

          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();
          }
          // else, send page to designated URL
          else {
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
