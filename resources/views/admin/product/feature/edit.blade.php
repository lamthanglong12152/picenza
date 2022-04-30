@extends('admin.index')

@section('pageTitle', 'Cập nhật tính năng')

@section('admin.css')
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('breadcrumbContent')
    <li class="breadcrumb-item"><a href="#">Tính năng</a></li>
    <li class="breadcrumb-item active">Cập nhật</li>
@endsection

@section('content')
    <div class="card col-6">
        <form enctype="multipart/form-data" method="POST" action="{{route('admin.product.feature.add.post')}}">
            @csrf
            <input type="hidden" name="id" value="{{$feature->id}}">
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="productName">Loại sản phẩm</label>
                            <select class="form-control"  name="product_type" required>
                                <option>-- Vui lòng chọn ---</option>
                                @foreach($productType as $value)
                                    <option value="{{$value->id}}" {{($feature->product_type === $value->id) ? 'selected' : ''}}>{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tính năng</label>
                            <input type="text" name="name" class="form-control" id="nameFeature" placeholder="Nhập tên tính năng..." value="{{$feature->name}}" required>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning">Cập nhật</button>
                        <button type="button" class="btn btn-default float-right">
                            <a style="color: #000000" href="{{route('admin.product.feature.list')}}">Hủy</a>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection


@section('admin.js')
    <script src="{{asset('js/admin.js')}}"></script>
@endsection