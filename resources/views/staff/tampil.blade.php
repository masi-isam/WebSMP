@extends('layout')

@section('title', 'Halaman Staff')

@section('konten')

<div class="container-fluid px-4">
    <h1 class="mt-4">Halaman Staff</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Staff</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header d-flex">
            <div class="fw-bold"><i class="fas fa-table me-1"></i>Data Staff </div>
            <button class="fw-bold btn btn-sm btn-outline-dark ms-auto" data-bs-toggle="modal" data-bs-target="#staffTambah">
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
                        <th>No Telepon</th>
                        <th>Jabatan</th>
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
                        <th>No Telepon</th>
                        <th>Jabatan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>

                <tbody>
                    @foreach ($staff as $no=>$data)
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $data->nip }}</td>
                        <td>{{ $data->nama_staff }}</td>
                        <td>{{ $data->jenis_kelamin }}</td>
                        <td>{{ $data->tempat_lahir . ', ' . $data->tanggal_lahir }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->no_telepon }}</td>
                        <td>{{ $data->jabatan }}</td>
                        <td>{{ $data->status }}</td>
                        <td>
                        <div class="d-flex justify-content-center">
                                <button class="btn btn-sm btn-warning me-2" data-bs-toggle="modal" data-bs-target="#staffEdit{{ $data->id }}">Edit</button>
                                <form action="{{ route('staff.hapus', $data->id) }}" method="post">
                                    @csrf
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</div>


<!-- Modal Tambah Guru -->
<div class="modal fade" id="staffTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Staff </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Tambah Guru -->
                <form action="{{ route('staff.tambah') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nomor Induk Pegawai</label>
                        <input type="number" name="nip" class="form-control" placeholder="Masukkan NIP Staff (Jika Ada)">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_staff" class="form-control" placeholder="Masukkan Nama Staff">
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
                        <textarea class="form-control" rows="3" name="alamat" placeholder="Masukkan Alamat Staff"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No Telepon</label>
                        <input type="text" name="no_telepon" class="form-control" placeholder="Masukkan No Telepon Staff">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" placeholder="Masukkan Jabatan Staff">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status">
                            <option selected disabled>Pilih Status</option>
                            <option value="Tetap">Tetap</option>
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
 @foreach ($staff as $data)
<div class="modal fade" id="staffEdit{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Staff </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Edit Guru -->
                <form action="{{ route('staff.edit', $data->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nomor Induk Pegawai</label>
                        <input type="number" value="{{ $data->nip }}" name="nip" class="form-control" placeholder="Masukkan NIP Staff (Jika Ada)">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" value="{{ $data->nama_staff }}" name="nama_staff" class="form-control" placeholder="Masukkan Nama Staff">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select class="form-select" name="jenis_kelamin">
                            <option>{{ $data->jenis_kelamin }}</option>
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
                        <textarea class="form-control" rows="3" name="alamat" placeholder="Masukkan Alamat Staff">{{ $data->alamat }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No Telepon</label>
                        <input type="text" value="{{ $data->no_telepon }}" name="no_telepon" class="form-control" placeholder="Masukkan No Telepon Staff">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jabatan</label>
                        <input type="text" value="{{ $data->jabatan }}" name="jabatan" class="form-control" placeholder="Masukkan Jabatan Staff">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status">
                            <option>{{ $data->status }}</option>
                            <option value="Tetap">Tetap</option>
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
<!-- End Form Edit Guru -->


@endsection