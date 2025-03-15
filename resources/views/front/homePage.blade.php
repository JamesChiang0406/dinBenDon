@extends("front.app")
@section("subtitle")
<font color="#dc3545">中餐選項</font>
@endsection

@section("content")
@section("title", "DinBenDon 首頁")
@if(Session::has('message'))
<script>
    Swal.fire({
        title: "{{ Session::get('message') }}",
        text: "您的資料已修改完成",
        icon: "success"
    });
</script>
@endif

<div class="mt-5">
    <div class="row justify-content-center">
        @foreach($restaurants as $restaurant)
        <div class="card p-0 m-3" style="width: 29%;">
            <div>
                <img src="/images/{{ $restaurant->restaurantPic }}" class="card-img-top" alt="餐廳照片" style="height: 260px;">
            </div>

            <div class="card-body">
                <div class="card-title row justify-content-between h-25">
                    <h5 class="col-8"><b>{{ $restaurant->restaurantName }}</b></h5>
                    <small class="col-4 text-end" style="font-size: 15px;">{{ $restaurant->phone }}</small>
                </div>
                <div class="mb-3 cardContent" style="height: 71px; overflow-y: scroll;">
                    <p class="card-text">{{ $restaurant->description }}</p>
                </div>

                <div class="row px-2">
                    <div class="col-4 p-0">
                        <a href="{{ $restaurant->website }}" class="btn btn-outline-secondary"
                            target="_blank">餐廳網站</a>
                    </div>

                    <div class="col-8 d-flex justify-content-end p-0 h-25" id="{{ $restaurant->id }}">
                        @if(!in_array($restaurant->id,$list))
                        <button type="button" class="btn btn-outline-primary" name="chooseBtn{{ $restaurant->id }}" id="{{ $restaurant->id }}"
                            onclick="changeMode(this)" style="margin-right: 5px;">選擇這家</button>
                        @else
                        <button type="button" class="btn btn-outline-danger" name="cancelBtn{{ $restaurant->id }}" id="{{ $restaurant->id }}"
                            style="margin-right: 5px;" onclick="changeMode(this)">取消選擇</button>
                        @endif
                        <!-- Button trigger modal -->
                        <button class="btn btn-outline-success" data-bs-toggle="modal" href="#editRestaurant{{ $restaurant->id }}">修改店家</ㄖ>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="editRestaurant{{ $restaurant->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <span class="modal-title">餐廳資料修改</span>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form id="editRestaurant{{ $restaurant->id }}" class="m-4" method="POST" action="edit/{{ $restaurant->id }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="my-3 ">
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
                                <a href="javascript:editCheck('editRestaurant{{ $restaurant->id }}')" class="btn btn-outline-primary" style="width: 100px;">修改</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    function changeMode(item) {
        if (item.name === "chooseBtn" + item.id) {
            $.ajax({
                url: `/list/choose/${item.id}`,
                type: "post",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function() {
                    location.reload()
                }
            })
        } else {
            $.ajax({
                url: `/list/cancel/${item.id}`,
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function() {
                    location.reload()
                }
            })
        }
    }

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
                document.forms[form].submit()
            }
        });

    }
</script>
@endsection