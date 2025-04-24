@extends('layout')

@section('title', 'Halaman Guru')

@section('konten')

<div class="container-fluid px-4">
    <h1 class="mt-4">Halaman Guru</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Siswa</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header d-flex">
            <div class="fw-bold"><i class="fas fa-table me-1"></i>Data Guru </div>
            <button class="fw-bold btn btn-sm btn-outline-dark ms-auto" data-bs-toggle="modal" data-bs-target="#guruTambah">
                <i class="fa-solid fa-user-plus"></i> Tambah
            </button>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Mata Pelajaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Mata Pelajaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>

                <tbody>
                    @foreach ($guru as $no=>$data)
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $data->nip }}</td>
                        <td>{{ $data->nama_guru }}</td>
                        <td>{{ $data->jenis_kelamin }}</td>
                        <td>{{ $data->tempat_lahir . ', ' . $data->tanggal_lahir }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->mata_pelajaran }}</td>
                        <td>{{ $data->status }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-sm btn-warning me-2" data-bs-toggle="modal" data-bs-target="#guruEdit{{ $data->id }}">Edit</button>
                                <form action="{{ route('guru.hapus', $data->id) }}" method="post">
                                    @csrf
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

</div>


<!-- Modal Tambah Guru -->
<div class="modal fade" id="guruTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Guru </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Tambah Guru -->
                <form action="{{ route('guru.tambah') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nomor Induk Pegawai</label>
                        <input type="number" name="nip" class="form-control" placeholder="Masukkan NIP Guru">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_guru" class="form-control" placeholder="Masukkan Nama Guru">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select class="form-select" name="jenis_kelamin">
                            <option selected disabled>Pilih Jenis Kelamin</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" rows="3" name="alamat" placeholder="Masukkan Alamat Siswa"></textarea>
                    </div>
                   
                    <div class="mb-3">
                        <label class="form-label">Mata Pelajaran</label>
                        <select class="form-select" name="mata_pelajaran">
                            <option selected disabled>Pilih Mata Pelajaran</option>
                            <option value="Seni Budaya">Seni Budaya</option>
                            <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                            <option value="Bahasa Inggris">Bahasa Inggris</option>
                            <option value="Matematika">Matematika</option>
                            <option value="IPA">IPA</option>
                            <option value="IPS">IPS</option>
                            <option value="PJOK">PJOK</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status">
                            <option selected disabled>Pilih Status</option>
                            <option value="PNS">PNS</option>
                            <option value="Honorer">Honorer</option>
                            <option value="Magang">Magang</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>

            </form>
            <!-- End Form Tambah Guru -->
        </div>
    </div>
</div>

<!-- Modal Edit Guru -->
 @foreach ($guru as $data)
<div class="modal fade" id="guruEdit{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Guru </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Edit Guru -->
                <form action="{{ route('guru.edit', $data->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nomor Induk Pegawai</label>
                        <input type="number" value="{{ $data->nip }}" name="nip" class="form-control" placeholder="Masukkan NIP Guru">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" value="{{ $data->nama_guru }}" name="nama_guru" class="form-control" placeholder="Masukkan Nama Guru">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select class="form-select" name="jenis_kelamin">
                            <option value="{{ $data->jenis_kelamin }}">{{ $data->jenis_kelamin }}</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" value="{{ $data->tempat_lahir }}" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" value="{{ $data->tanggal_lahir }}" name="tanggal_lahir" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" rows="3" name="alamat" placeholder="Masukkan Alamat Siswa">{{ $data->alamat }}</textarea>
                    </div>
                   
                    <div class="mb-3">
                        <label class="form-label">Mata Pelajaran</label>
                        <select class="form-select" name="mata_pelajaran">
                            <option value="{{ $data->mata_pelajaran }}">{{ $data->mata_pelajaran }}</option>
                            <option value="Seni Budaya">Seni Budaya</option>
                            <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                            <option value="Bahasa Inggris">Bahasa Inggris</option>
                            <option value="Matematika">Matematika</option>
                            <option value="IPA">IPA</option>
                            <option value="IPS">IPS</option>
                            <option value="PJOK">PJOK</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status">
                            <option value="{{ $data->status }}">{{ $data->status }}</option>
                            <option value="PNS">PNS</option>
                            <option value="Honorer">Honorer</option>
                            <option value="Magang">Magang</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-warning">Edit</button>
            </div>

            </form>
        </div>
    </div>
</div>
@endforeach
<!-- End Form Tambah Guru -->
@endsection