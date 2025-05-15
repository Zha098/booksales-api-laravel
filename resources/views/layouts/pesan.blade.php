@if (Session::has('succes'))
    <script>
        Swal.fire({
            position: 'top-center', // Ubah posisi sesuai kebutuhan: 'top', 'top-end', 'center', dll.
            icon: 'success',
            title: '{{ Session::get('succes') }}',
            showConfirmButton: false,
            timer: 1000, // Durasi dialog otomatis hilang
        });
    </script>
@endif

<!-- Popup HTML -->
@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Login Gagal',
            text: '{{ session('error') }}',
            confirmButtonText: 'OK'
        });
    </script>
@endif




@if ($errors->any())
    <script>
        Swal.fire({
            title: 'Terjadi Kesalahan!',
            html: `
                <ul style="text-align: left;">
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            `,
            icon: 'error',
        });
    </script>
@endif