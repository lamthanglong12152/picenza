@extends('admin.index')

@section('pageTitle', '')

@section('breadcrumbContent')
    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
    <li class="breadcrumb-item active">Danh sách sản phẩm</li>
@endsection

@section('content')
    <div class="col-3">
        <button style="margin-bottom: 10px" type="button" class="btn btn-success">
            <a style="color: #FFFFFF;" href="{{route('admin.company.add')}}">
                Thêm mới
            </a>
        </button>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title" style="font-size: 26px; font-weight: 700">DANH SÁCH HÃNG SẢN XUẤT</h2>

                <div class="form-search float-right">
                    <form style="margin-bottom: 0" class="form-group" action="{{route('admin.product.add')}}">
                        <input  class="form-control" type="text" name="s" value="" placeholder="Tìm kiếm sản phẩm....">
                    </form>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>TÊN HÃNG SẢN XUẤT</th>
                        <th>DÒNG SẢN PHẨM</th>
                        <th>LOẠI SẢN PHẨM</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($productType as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->company->name}}</td>
                                <td>{{$value->productLine->name}}</td>
                                <td>{{$value->name}}</td>
                                <td>
                                    <button class="btn btn-info">
                                        <a style="color: #FFFFFF" href="{{ route('admin.company.edit', ['id' => $value->id]) }}">
                                            Chi tiết
                                        </a>
                                    </button>
                                    <button class="btn btn-danger">
                                        <a style="color: #FFFFFF" href="{{ route('admin.company.del', ['id' => $value->id]) }}">
                                            Xoá
                                        </a>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>
@endsection
