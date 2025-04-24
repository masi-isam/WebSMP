@extends('layout')

@section('title', 'Halaman Siswa')

@section('konten')



<div class="container-fluid px-4">
    <h1 class="mt-4">Halaman Siswa</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Siswa</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header d-flex">
            <div class="fw-bold"><i class="fas fa-table me-1"></i>Data Siswa </div>
            <button class="fw-bold btn btn-sm btn-outline-dark ms-auto" data-bs-toggle="modal" data-bs-target="#siswaTambah">
                <i class="fa-solid fa-user-plus"></i> Tambah
            </button>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Kelas</th>
                        <th>Nama Orang Tua</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Kelas</th>
                        <th>Nama Orang Tua</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>

                <tbody>
                    @foreach ($siswa as $no=>$data)
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $data->nis }}</td>
                        <td>{{ $data->nama_siswa }}</td>
                        <td>{{ $data->jenis_kelamin }}</td>
                        <td>{{ $data->tempat_lahir . ', ' .$data->tanggal_lahir }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->kelas }}</td>
                        <td>{{ $data->nama_ortu }}</td>
                        <td>{{ $data->status }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-sm btn-warning me-2" data-bs-toggle="modal" data-bs-target="#siswaEdit{{ $data->id }}">Edit</button>
                                <form action="{{ route('siswa.hapus', $data->id) }}" method="post">
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


<!-- Modal Tambah Siswa -->
<div class="modal fade" id="siswaTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Siswa </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Tambah Siswa -->
                <form action="{{ route('siswa.tambah') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nomor Induk Siswa</label>
                        <input type="number" name="nis" class="form-control" placeholder="Masukkan NIS Siswa">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_siswa" class="form-control" placeholder="Masukkan Nama Siswa">
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
                        <label class="form-label">Kelas</label>
                        <select class="form-select" name="kelas">
                            <option selected disabled>Pilih Kelas</option>
                            <option value="1">VII / 1</option>
                            <option value="2">VIII / 2</option>
                            <option value="3">IX / 3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" rows="3" name="alamat" placeholder="Masukkan Alamat Siswa"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Orang Tua</label>
                        <input type="text" name="nama_ortu" class="form-control" placeholder="Masukkan Nama Orang Tua Siswa">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status">
                            <option selected disabled>Pilih Status</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Pindah">Pindah</option>
                            <option value="Dropout">Dropout</option>
                            <option value="Lulus">Lulus</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>

            </form>
            <!-- End Form Tambah Siswa -->
        </div>
    </div>
</div>

<!-- Modal Edit Siswa -->
@foreach ($siswa as $data)
<div class="modal fade" id="siswaEdit{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Edit Siswa </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Tambah Siswa -->
                <form action="{{ route('siswa.edit', $data->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nomor Induk Siswa</label>
                        <input type="number" value="{{ $data->nis }}" name="nis" class="form-control" placeholder="Masukkan NIS Siswa">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" value="{{ $data->nama_siswa }}" name="nama_siswa" class="form-control" placeholder="Masukkan Nama Siswa">
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
                        <label class="form-label">Kelas</label>
                        <select class="form-select" name="kelas">
                            <option value="{{ $data->kelas }}">{{ $data->kelas }}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" rows="3" name="alamat" placeholder="Masukkan Alamat Siswa">{{ $data->alamat }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Orang Tua</label>
                        <input type="text" value="{{ $data->nama_ortu }}" name="nama_ortu" class="form-control" placeholder="Masukkan Nama Orang Tua Siswa">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status">
                            <option value="{{ $data->status }}">{{ $data->status }}</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Pindah">Pindah</option>
                            <option value="Dropout">Dropout</option>
                            <option value="Lulus">Lulus</option>
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
<!-- End Form Tambah Siswa -->
@endsection