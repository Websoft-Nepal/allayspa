<script src="{{ asset('js/notyf.min.js') }}"></script>
<script>
    // Create an instance of Notyf
    var notyf = new Notyf();
</script>


@if (session('status'))
    <script>
        // Display a success notification
        notyf.success('{{ session('status') }}');
    </script>
@elseif (session('error'))
    <script>
        // Display an error notification
        notyf.error('{{ session('error') }}');
    </script>
@endif