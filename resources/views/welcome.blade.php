<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Absen App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css"> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
        <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

        <!-- Styles -->
        <style>
           
        </style>

        <style>
            body {
                font-family: 'Nunito';
                height: 100%;
            }
            .wrapper-body {
                min-height: 100vh;
                background: #ae9090;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-wrap: wrap;
                padding: 1rem;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="wrapper-body">
            {{-- <div class="card">
                <div class="card-header" style="text-align: center;">
                    <h1><b>Daftar Hadir</b></h1>
                </div>
                <div class="card-body">
                    <form class="form-inline">
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="inputPassword2" class="sr-only">Password</label>
                            <input type="text" class="form-control" id="cari_id" placeholder="Cari nama...">
                        </div>

                        <button type="button" class="btn btn-primary mb-2">Cari</button>
                    </form> 
                </div>
            </div> --}}

            <div class="card mt-5">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered nowrap" id="table_id">
                            <thead>
                                <tr>
                                  <th scope="col">Nama</th>
                                  <th scope="col">Status Tamu</th>
                                  <th scope="col">Tamu Keluarga</th>
                                  <th scope="col">Kenal Dari</th>
                                  <th scope="col">Instansi</th>
                                  <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                      </div>
                </div>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        {{-- <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script> --}}
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script type="text/javascript">

            function table() {
                $('#table_id').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ordering": false,
                    "paging": true,
                    // "responsive" : true,
                    "ajax": "{{ route('absen') }}",
                    "pageLength": 10,
                    "columns": [
                        { "data": "nama", name: "nama", searchable: true },
                        { "data": "status_tamu", name: 'status_tamu',searchable: false },
                        { "data": "tamu_keluarga", name: 'tamu_keluarga',searchable: false },
                        { "data": "kenal_dari", name: 'kenal_dari',searchable: false },
                        { "data": "instansi", name: 'instansi',searchable: false },
                        { "data": "action", name: 'action',orderable: false,searchable: false }
                    ]
                });
            }
            $(document).ready(function() {
                table();
            });

            $(document).on('click', '.btn-hadir', function() {
                var data = $(this).data('id');

                Swal.fire({
                    title: "Do you want to save the changes?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Save",
                    denyButtonText: `Don't save`
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/absen/hadir/' + data,
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                data: data,
                            },
                            success: function(response) {
                                // Handle response
                                // console.log(response);
                                Swal.fire("Data Berhasil terupdate!", "", "success");
                                location.reload();
                            },
                            error: function(err){
                                Swal.fire("Error, data tidak bisa diupdate", "", "error");
                            }
                        });
                    } else if (result.isDenied) {
                        Swal.fire("Data tidak terupdate", "", "info");
                    }
                });
            
            });
        </script>
    </body>
</html>
