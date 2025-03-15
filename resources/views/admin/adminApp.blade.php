<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="/js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="/public/favicon.ico" type="image/x-icon" />
    <style>
        textarea {
            resize: none;
        }

        #itemList:hover {
            background-color: antiquewhite;
            color: sienna;
        }

        .cardContent::-webkit-scrollbar,
        .studentList::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body>
    <nav class="navbar row bg-body-tertiary px-5">
        <div class="col-6">
            <a class="navbar-brand" href="/admin" style="font-size: 1.5em;">管理員專頁</a>
        </div>

        <div class="col-6 d-flex justify-content-end">
            <a href="/admin/logout" class="btn btn-outline-danger" type="button">登出</a>
        </div>
    </nav>

    <div class="d-flex row flex-nowrap justify-content-center h-100 w-100 p-5">
        <div class="container pt-4" style="width: 15%;">
            <ul class="list-group list-group-flush">
                <a class="list-group-item" href="/admin" id="itemList">餐廳清單</a>
                <a class="list-group-item" href="/admin/students" id="itemList">學生清單</a>
            </ul>
        </div>

        @yield("content")
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>