@extends("front.app")
@section("subtitle")
<font color="#093191">新增餐廳</font>
@endsection

@section("content")
@section("title", "DinBenDon 新增餐廳")
<div class="container w-75 p-3">
    <form class="m-4" style="justify-items: center;" method="POST" action="/add" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="my-4 w-50">
            <label for="restaurantName" class="form-label">餐廳名稱</label>
            <input type="text" class="form-control" id="restaurantName" name="restaurantName">
        </div>

        <div class="my-4 w-50">
            <label for="restaurantWebsite" class="form-label">實際網站</label>
            <input type="text" class="form-control" id="restaurantWebsite" name="website">
        </div>

        <div class="my-4 w-50">
            <label for="description" class="form-label">詳細描述</label>
            <textarea type="text" class="form-control" id="description" name="description" rows="5" cols="15" placeholder="請輸入詳細描述"></textarea>
        </div>

        <div class="my-4 w-50">
            <label for="restaurantPhone" class="form-label">店家電話</label>
            <input type="text" class="form-control" id="restaurantPhone" name="phone">
        </div>

        <div class="my-4 w-50">
            <label for="restaurantPic" class="form-label">外觀照片</label>
            <input type="file" class="form-control" id="restaurantPic" name="restaurantPic" onchange="showRestPic(this.files)">
            <div class="d-flex justify-content-center mt-3">
                <img src="" alt="預覽圖片" id="showPic" style="max-width: 450px; max-height: 320px; display: none;">
            </div>
        </div>

        <div class="d-flex justify-content-center mt-5 w-50">
            <button type="submit" class="btn btn-primary" style="width: 171px;">新增</button>
        </div>
    </form>
</div>

<script>
    function showRestPic(files) {
        if (!files.length) {
            return false;
        }

        let file = files[0]
        let reader = new FileReader()
        reader.onload = function() {
            document.getElementById("showPic").src = this.result
        }
        reader.readAsDataURL(file)

        document.getElementById("showPic").style.display = ""
    }
</script>
@endsection