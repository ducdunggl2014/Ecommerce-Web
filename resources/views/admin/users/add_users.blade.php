@extends('admin_layout')
@section('admin_content')
<div class="form-grids row widget-shadow" data-example-id="basic-forms">
    <div class="form-title">
        <h4>Thêm user :</h4>
    </div>

    @php
    $message = Session::get('message');
    if($message){
    echo '<span class="text-alert">'.$message.'</span>';
    Session::put('message',null);
    }
    @endphp

    <div class="form-body">
        <form role="form" action="{{URL::to('store-users')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Tên users</label>
                <input type="text" name="admin_name" class="form-control" id="exampleInputEmail1"
                    placeholder="Tên danh mục">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" name="admin_email" class="form-control" id="exampleInputEmail1" placeholder="Slug">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Phone</label>
                <input type="text" name="admin_phone" class="form-control" id="exampleInputEmail1" placeholder="Slug">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="text" name="admin_password" class="form-control" id="exampleInputEmail1"
                    placeholder="Slug">
            </div>

            <button type="submit" name="add_category_product" class="btn btn-info">Thêm users</button>
        </form>
    </div>
</div>
@endsection