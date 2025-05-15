<x-app-layout>
    <!-- START FORM -->
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-sm w-50">
            <!-- Card Header -->
            <div class="card-header bg-secondary text-white text-center">
                <h5 class="mb-0">Tambah Data</h5>
            </div>

            <!-- Form Start -->
            <form action="{{ url('dashboard') }}" method="post">
                <div class="card-body">
                    @csrf
                    <!-- Back Button -->
                    <a href="{{ url('dashboard') }}" class="btn btn-secondary mb-4">
                        << Kembali
                    </a>

                    <!-- Dropdown: Daftar Data -->
                    <div class="row mb-3">
                        <label for="id_daftar_data" class="col-sm-3 col-form-label">Daftar Data</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="id_daftar_data" id="id_daftar_data">
                                <option value="">Pilih Daftar Data</option>
                                @foreach ($daftarData ?? [] as $data)
                                    <option value="{{ $data->id_daftar_data }}">
                                        {{ $data->nama_daftar_data }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Input: ID SKPD -->
                    <div class="row mb-3">
                        <label for="id_skpd" class="col-sm-3 col-form-label">ID SKPD</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="id_skpd" 
                                value="{{ Auth::user()->id_skpd }}" id="id_skpd" 
                                placeholder="Masukkan ID SKPD" readonly>
                        </div>
                    </div>

                    <!-- Input: Tahun -->
                    <div class="row mb-3">
                        <label for="tahun" class="col-sm-3 col-form-label">Tahun</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="tahun" 
                                value="{{ Session::get('tahun') }}" id="tahun" 
                                placeholder="Masukkan Tahun">
                        </div>
                    </div>

                    <!-- Input: Keterangan -->
                    <div class="row mb-3">
                        <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="keterangan" 
                                value="{{ Session::get('keterangan') }}" id="keterangan" 
                                placeholder="Masukkan Keterangan">
                        </div>
                    </div>

                    <!-- Input: Satuan -->
                    <div class="row mb-3">
                        <label for="satuan" class="col-sm-3 col-form-label">Satuan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="satuan" 
                                value="{{ Session::get('satuan') }}" id="satuan" 
                                placeholder="Masukkan Satuan">
                        </div>
                    </div>

                    <!-- Input: Nilai -->
                    <div class="row mb-3">
                        <label for="nilai" class="col-sm-3 col-form-label">Nilai</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nilai" 
                                value="{{ Session::get('nilai') }}" id="nilai" 
                                placeholder="Masukkan Nilai">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Form End -->
        </div>
    </div>
    <!-- END FORM -->
</x-app-layout>
