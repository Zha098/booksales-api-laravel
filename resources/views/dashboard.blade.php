<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <main class="container py-5">
        <div class="my-3 p-4 bg-white rounded shadow-lg">
            <!-- Header -->
            {{-- <h3 class="text-primary mb-4 text-center">Data Tahunan</h3> --}}
            
            <!-- Form Pencarian dan Tambah Data -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <a href="{{ url('dashboard/create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Tambah Data
                </a>
                <form class="d-flex " action="{{ url('dashboard') }}" method="get">
                    <input class="form-control me-3" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" 
                        placeholder="Cari data..." aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="bi bi-search"></i> Cari
                    </button>
                </form>
            </div>
            
            <!-- Tabel Data -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>ID Data</th>
                            <th>ID Daftar Data</th>
                            <th>ID SKPD</th>
                            <th>Tahun</th>
                            <th class="col-">Keterangan</th>
                            <th>Satuan</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-center">{{ $item->id }}</td>
                                <td class="text-center">{{ $item->id_daftar_data }}</td>
                                <td class="text-center">{{ $item->id_skpd }}</td>
                                <td class="text-center">{{ $item->tahun }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>{{ $item->satuan }}</td>
                                <td class="text-center">{{ $item->nilai }}</td>
                                <td class="text-center">
                                    <a href="{{ url('dashboard/' . $item->id . '/edit') }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form class="d-inline" action="{{ url('dashboard/' . $item->id) }}" method="post" id="form-delete-{{ $item->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $item->id }}">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $data->links() }}
            </div>
        </div>
    
        <!-- SweetAlert for Delete Confirmation -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.btn-delete').forEach(button => {
                    button.addEventListener('click', function () {
                        const id = this.dataset.id;
                        Swal.fire({
                            title: 'Yakin ingin menghapus data?',
                            text: "Data yang dihapus tidak dapat dikembalikan!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, Hapus!',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('form-delete-' + id).submit();
                            }
                        });
                    });
                });
            });
        </script>
    
        <!-- SweetAlert for Not Found -->
        @if (session('not_found'))
            <script>
                Swal.fire({
                    icon: 'info',
                    title: 'Pencarian Tidak Ditemukan',
                    text: "{{ session('not_found') }}",
                    confirmButtonText: 'OK',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-info'
                    }
                });
            </script>
        @endif
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</x-app-layout>
