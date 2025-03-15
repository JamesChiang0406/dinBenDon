<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DinBenDon 後台登入</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="/js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="/public/favicon.ico" type="image/x-icon" />
</head>

<body>
    @if(Session::has("message"))
    <script>
        Swal.fire({
            icon: "error",
            title: "糟糕...",
            text: "{{ Session::get('message') }}"
        });
    </script>
    @endif
    <div class="container border p-0 mt-4">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid pl-5">
                <label class="navbar-brand" style="font-size: 1.5em;">
                    <font color="#198754">後台登入頁面</font>
                </label>
            </div>
        </nav>

        <div class="container position-relative" style="justify-items: center; align-content:center; height: 75vh;">
            <form method="post" action="/admin/login" class="border text-center" style="width: 30%; height: 60%;">
                @csrf
                <input type="hidden" name="whereLogin" value="admin">
                <nav class="navbar navbar-light bg-light w-100">
                    <ol class="breadcrumb w-100 justify-content-center m-0" style="font-size: 1.5em;">
                        <li class="breadcrumb-item">
                            <a href="/admin/login" style="color: #198754;">後台登入</a>
                        </li>
                    </ol>
                </nav>

                <div class="container">
                    <div class="my-4" style="justify-items: center;">
                        <label for="account" class="form-label">帳號</label>
                        <input type="text" class="form-control" id="account" aria-describedby="emailHelp" name="account" maxlength="10" style="width: 50%;">
                    </div>
                    <div class="mb-3" style="justify-items: center;">
                        <label for="password" class="form-label">密碼</label>
                        <input type="password" class="form-control" id="password" name="password" style="width: 50%;">
                    </div>
                </div>

                <div class="container d-flex justify-content-center mt-5">
                    <button type="submit" class="btn btn-success" style="margin-right: 25px;">登入</button>
                    <button type="reset" class="btn btn-secondary">重設</button>
                </div>
            </form>

            <div class="position-absolute" style="top: 5%; left: 80%">
                <a href="/login" class="btn btn-outline-primary" role="button" aria-pressed="true">學生登入</a>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>