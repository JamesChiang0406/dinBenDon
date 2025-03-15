@extends("front.app")
@section("subtitle")
<font color="#513122">修改餐廳</font>
@endsection

@section("content")
@section("title", "DinBenDon 修改餐廳")
<div class="container w-75 p-3">
    <form class="m-4" style="justify-items: center;">
        <div class="my-3 text-center w-50">
            <label for="restaurantName" class="form-label">餐廳名稱</label>
            <input type="text" class="form-control" id="restaurantName" name="restaurantName" value="Card">
        </div>

        <div class="my-3 text-center w-50">
            <label for="restaurantWebsite" class="form-label">實際網站</label>
            <input type="text" class="form-control" id="restaurantWebsite" value="https://zh-cht.ichiran.com/shop/oversea/taiwan/taichung/">
        </div>

        <div class="my-3 text-center w-50">
            <label for="description" class="form-label">詳細描述</label>
            <textarea type="text" class="form-control" id="description" rows="5" cols="15" placeholder="請輸入詳細描述">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</textarea>
        </div>

        <div class="my-3 text-center w-50">
            <label for="restaurantPic" class="form-label">外觀照片</label>
            <input type="file" class="form-control" id="restaurantPic" onchange="showRestPic(this.files)">
            <div class="d-flex justify-content-center mt-3">
                <img src="/images/taichung1.jpg" alt="預覽圖片" id="showPic" style="max-width: 450px; max-height: 320px;">
            </div>
        </div>

        <div class="d-flex justify-content-center mt-5 text-center w-50">
            <button type="submit" class="btn btn-success" style="width: 171px;">修改</button>
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