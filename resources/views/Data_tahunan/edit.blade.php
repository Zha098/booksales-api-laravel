<x-app-layout>
    <!-- START FORM -->
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-sm w-50">
            <div class="card-header bg-secondary text-white justify-content-center">
                <h5 class="mb-0 ">Edit Data</h5>
            </div>
            <div class="card-body">
                <form action="{{ url('dashboard/' . $data->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <a href="{{ url('dashboard') }}" class="btn btn-secondary mb-4"><< Kembali</a>
                    <div class="row mb-3">
                        <label for="id_daftar_data" class="col-sm-3 col-form-label">Daftar Data</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="id_daftar_data" id="id_daftar_data" required>
                                <option value="">Pilih Daftar Data</option>
                                @foreach ($daftarData as $item)
                                    <option value="{{ $item->id_daftar_data }}" 
                                        {{ $data->id_daftar_data == $item->id_daftar_data ? 'selected' : '' }}>
                                        {{ $item->nama_daftar_data }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="id_skpd" class="col-sm-3 col-form-label">ID SKPD</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="id_skpd" value="{{ $data->id_skpd }}" id="id_skpd" placeholder="Masukkan ID SKPD " readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tahun" class="col-sm-3 col-form-label">Tahun</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="tahun" value="{{ $data->tahun }}" id="tahun" placeholder="Masukkan Tahun">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="keterangan" value="{{ $data->keterangan }}" id="keterangan" placeholder="Masukkan Keterangan">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="satuan" class="col-sm-3 col-form-label">Satuan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="satuan" value="{{ $data->satuan }}" id="satuan" placeholder="Masukkan Satuan">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nilai" class="col-sm-3 col-form-label">Nilai</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nilai" value="{{ $data->nilai }}" id="nilai" placeholder="Masukkan Nilai">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- AKHIR FORM -->
</x-app-layout>