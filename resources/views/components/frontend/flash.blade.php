@if ($errors->any())
    <script>
        window.onload = function() {
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        }
    </script>
@endif

@if (session()->has('add'))
    <script>
        window.onload = function() {
            toastr.success("{{ trans('messages.add') }}");
        }
    </script>
@endif

@if (session()->has('edit'))
    <script>
        window.onload = function() {
            toastr.success("{{ trans('messages.edit') }}");
        }
    </script>
@endif

@if (session()->has('delete'))
    <script>
        window.onload = function() {
            toastr.success("{{ trans('messages.delete') }}");
        }
    </script>
@endif

@if (session('error'))
    <script>
        window.onload = function() {
            toastr.error("{{ session('error') }}");
        }
    </script>
@endif

@if (session('status'))
    <script>
        window.onload = function() {
            toastr.success("{{ session('status') }}");
        }
    </script>
@endif
