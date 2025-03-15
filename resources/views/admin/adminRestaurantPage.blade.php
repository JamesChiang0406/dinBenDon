@extends("admin.adminApp")
@section("content")
@section("title", "餐廳清單")
@if(Session::has('message'))
<script>
    Swal.fire({
        title: "{{ Session::get('message') }}!",
        text: "您的資料{{ Session::get('message') }}完成!",
        icon: "success"
    });
</script>
@endif

<div class="container row flex-wrap w-75 py-4">
    @foreach($restaurants as $restaurant)
    <div class="card m-3 p-0" style="max-height: 410px; width: 18rem;">
        <img src="/images/{{ $restaurant->restaurantPic }}" class="card-img-top" alt="餐廳照片" style="max-height: 160px;">
        <div class="card-body">
            <div class="card-title" style="height: 40px;">
                <h5><b>{{ $restaurant->restaurantName }}</b></h5>
            </div>
            <div class="mb-3 cardContent" style="height: 72px; overflow-y: scroll">
                <p class="card-text">{{ $restaurant->description }}</p>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ $restaurant->website }}" class="btn btn-outline-primary col-5"
                    style="width: 85px; padding: 6px 4px" target="_blink">餐廳網站</a>
                <!-- Button trigger modal -->
                <div class="col-7 d-flex justify-content-end">
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" href="#edit{{ $restaurant->id }}"
                        style="margin-right: 5px;">修改</button>
                    <form id="deleteRestaurant{{ $restaurant->id }}" action="/admin/restaurant/delete" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $restaurant->id }}">
                        <a href="javascript:deleteCheck('deleteRestaurant{{ $restaurant->id }}')" class="btn btn-outline-danger">刪除</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- editModal -->
    <div class="modal fade" id="edit{{ $restaurant->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title">餐廳資料修改</span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="editRestaurant{{ $restaurant->id }}" class="m-3" method="POST" action="/admin/restaurant/edit/{{ $restaurant->id }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="mb-3 ">
                        <label for="restaurantName" class="form-label">餐廳名稱</label>
                        <input type="text" class="form-control" id="restaurantName" name="restaurantName" value="{{ $restaurant->restaurantName }}">
                    </div>

                    <div class="my-3 ">
                        <label for="restaurantWebsite" class="form-label">實際網站</label>
                        <input type="text" class="form-control" id="restaurantWebsite" name="website" value="{{ $restaurant->website }}">
                    </div>

                    <div class="my-3 ">
                        <label for="description" class="form-label">詳細描述</label>
                        <textarea type="text" class="form-control" id="description" rows="5" cols="15" name="description" placeholder="請輸入詳細描述">{{ $restaurant->description }}</textarea>
                    </div>

                    <div class="my-3 ">
                        <label for="restaurantPhone" class="form-label">店家電話</label>
                        <input type="text" class="form-control" id="restaurantPhone" name="phone" value="{{ $restaurant->phone }}">
                    </div>

                    <div class="my-3 ">
                        <label for="restaurantPic" class="form-label">外觀照片</label>
                        @php
                        echo "<input type='file' class='form-control' id='restaurantPic' name='restaurantPic' onchange='showRestPic(this.files, ".$restaurant->id.")'>"
                        @endphp
                        <div class="d-flex justify-content-center mt-3">
                            <img src="" alt="預覽圖片" id="showPic{{ $restaurant->id }}" style="max-width: 450px; max-height: 320px; display: none;">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="javascript:editCheck('editRestaurant{{ $restaurant->id }}')" class="btn btn-outline-primary" style="width: 120px;">修改</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>


<script>
    function showRestPic(files, id) {
        if (!files.length) {
            return false;
        }

        let file = files[0]
        let reader = new FileReader()
        reader.onload = function() {
            document.getElementById("showPic" + id).src = this.result
        }
        reader.readAsDataURL(file)

        document.getElementById("showPic" + id).style.display = ""
    }

    function editCheck(form) {
        console.log(document.forms[form])
        Swal.fire({
            title: "確定修改?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "確定",
            cancelButtonText: "取消"
        }).then((result) => {
            if (result.isConfirmed) {
                document.forms[form].submit();
            }
        });


    }

    function deleteCheck(form) {
        Swal.fire({
            title: "確定刪除?",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            confirmButtonText: "刪除",
            cancelButtonText: "取消"
        }).then((result) => {
            if (result.isConfirmed) {
                document.forms[form].submit()
            }
        });

    }
</script>
@endsection