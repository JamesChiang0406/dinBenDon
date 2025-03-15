@extends("admin.adminApp")
@section("content")
@section("title", "學生清單")
@if(Session::has('message'))
<script>
    Swal.fire({
        title: "{{ Session::get('message') }}",
        text: "您的資料已修改完成",
        icon: "success"
    });
</script>
@endif

<div class="list-group studentList w-75" style="padding: 24px 12px; margin-left: -12px; margin-right: -12px; overflow: scroll; height: 75vh;">
    @foreach($students as $student)
    <div
        class="d-flex row list-group-item list-group-item-action list-group-item-light w-75 align-items-center justify-content-between px-5 py-3"
        aria-current="true">
        <div class="col-6">
            <h5 class="mb-1">{{ $student->name }}</h5>
            <p class="mb-1">學號： {{ $student->studentNo }}</p>
            <small>班級座號： {{ $student->id }}</small>
        </div>

        <div class="col-6 d-flex justify-content-end align-items-end">
            <a class="btn btn-outline-success" data-bs-toggle="modal" href="#editStudent{{ $student->id }}" role="button">修改</a>
        </div>
    </div>

    <div class="modal fade" id="editStudent{{ $student->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title">學生資料修改</span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="editStudent{{ $student->id }}" class="m-3" method="POST" action="/admin/student/edit/{{ $student->id }}">
                    {{ csrf_field() }}
                    <div class="my-3 ">
                        <label for="name" class="form-label">學生姓名</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}">
                    </div>

                    <div class="my-3 ">
                        <label for="account" class="form-label">帳號</label>
                        <input type="text" class="form-control" id="account" name="account" value="{{ $student->account }}">
                    </div>

                    <div class="my-3 ">
                        <label for="password" class="form-label">密碼</label>
                        <input type="text" class="form-control" id="password" rows="5" cols="15" name="password" value="{{ $student->password }}">
                    </div>

                    <div class="my-4 ">
                        <label for="studentNo" class="form-label">學號</label>
                        <input type="text" class="form-control" id="studentNo" name="studentNo" value="{{ $student->studentNo }}">
                    </div>

                    <div class="modal-footer">
                        <a href="javascript:editCheck('editStudent{{ $student->id }}')" class="btn btn-outline-primary" style="width: 120px;">修改</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

<script>
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