<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Registerasi Akun Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="text-center mt-5">
        <h2>Registrasi Akun Admin</h2>
        <p>Silahkan Melakukan Registrasi Akun Apabila Tidak Memiliki Akun</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card text-white bg-secondary">
                <div class="card-body">
                    <h4 class="text-center p-3">FORM REGISTRASI</h4>
                    <form action="{{ route('tambah.admin') }}" method="post">
                        @csrf
                        <label for="">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control mb-4">

                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control mb-4">

                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control mb-4">

                        <button class="btn btn-primary">Registerasi</button>

                    </form>
                </div>
            </div>
        </div>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
</body>

</html>