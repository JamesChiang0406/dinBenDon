@extends("front.app")
@section("subtitle")
<font color="#b98a16">已選清單</font>
@endsection

@section("content")
@section("title", "DinBenDon 已選清單")
<div class="row p-4">
    @foreach($choosedList as $key => $data)
    <div class="card m-3 p-0" style="width: 18rem;">
        <img src="/images/{{ $data[0]->restaurant->restaurantPic }}" class="card-img-top" alt="..." style="width: 286px; height: 214.5px">
        <div class="card-body" style="height: 230px;">
            <div class=" card-title row h-25">
                <h5 class="col-8"><b>{{ $data[0]->restaurant->restaurantName }}</b></h5>
                <small class="col-4 p-0" style="font-size: 13px;">{{ $data[0]->restaurant->phone }}</small>
            </div>
            <div class="mb-3 cardContent" style="height: 80px; overflow-y: scroll;">
                <p class="card-text">{{ $data[0]->restaurant->description }}</p>
            </div>

            <!-- Button trigger modal -->
            <div class="h-25">
                <a class="btn btn-outline-primary" data-bs-toggle="modal" href="#displayWho{{$key}}">人數： {{ count($data) }} 人</a>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="displayWho{{$key}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">選擇此家的人為以下：</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <ul class="list-group list-group-flush">
                            @foreach($data as $item)
                            <li class="list-group-item">
                                <span style="margin-right: 15px;">座號{{ $item->student->id }}號</span>
                                <span>{{ $item->student->name }}</span>
                            </li>
                            @endforeach
                        </ul>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection