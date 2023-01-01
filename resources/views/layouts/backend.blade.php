<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Model CRUD</title>
    <style>
        .header-area nav ul{
            padding: 0;
            margin: 0;
            list-style: none;
        }
        .header-area nav ul li{
            margin-right: 10px;
            display: inline-block;
        }
        .header-area nav ul li:last-child{
            margin-right: 0;
        }
    </style>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                {{-- header --}}
                @include('backend.include.header')
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">

                    {{--main content--}}
                    @yield('content')


                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function alert_message(delete_id){
            Swal.fire({
                title: 'Are you sure delete?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-'+delete_id).submit();
            }
            })
        }
    </script>

  </body>
</html>
