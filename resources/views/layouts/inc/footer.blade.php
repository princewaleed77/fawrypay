@yield('footer')

 <!-- BEGIN VENDOR JS-->
 <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('app-assets/vendors/js/ui/headroom.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}" type="text/javascript">
 </script>
 <script src="{{ asset('app-assets/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>

 <script src="{{ asset('app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
 <script src="{{ asset('app-assets/js/core/app.js') }}" type="text/javascript"></script>
 <script src="{{ asset('app-assets/js/scripts/forms/form-login-register.js') }}" type="text/javascript"></script>

 @yield('scripts')
 
 </body>
 </html>
