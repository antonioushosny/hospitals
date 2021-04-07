<script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "100%";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }

        // toastr settings
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;

        @if($dir=='rtl')
            toastr.options.rtl = true;
        @endif
        @if(session()->has('success'))
            success  = "{{ session('success') }}" ;
            Alert  = "{{__('lang.Success Alert')}}" ;
            toastr.success(success, Alert, {timeOut: 5000})
        @endif

        @if(session()->has('warning'))
            warning  = "{{ session('warning') }}" ;
            Alert  = "{{__('lang.warningAlert')}}" ;
            toastr.warning(warning, Alert, {timeOut: 5000})
        @endif

        @if(session()->has('error'))
            error  = "{{ session('error') }}" ;
            Alert  = "{{__('lang.errorAlert')}}" ;
            toastr.error(error, Alert, {timeOut: 5000})
        @endif

        $('.select2').select2();
    </script>


