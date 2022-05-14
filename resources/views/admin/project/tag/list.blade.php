@extends('admin.index')

@section('pageTitle', '')

@section('breadcrumbContent')
    <li class="breadcrumb-item"><a href="#">Tag</a></li>
    <li class="breadcrumb-item active">Danh sách Tag</li>
@endsection

@section('content')
    <div class="col-3">
        <button style="margin-bottom: 10px" type="button" class="btn btn-success">
            <a style="color: #FFFFFF;" href="{{route('admin.project.tag.add')}}">
                Thêm mới
            </a>
        </button>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title" style="font-size: 19px; font-weight: 700">DANH SÁCH TAG</h2>

                <div class="form-search float-right">
                    <form style="margin-bottom: 0" class="form-group" action="{{route('admin.project.tag.list')}}">
                       <input  class="form-control" type="text" name="s" value="" placeholder="Tìm kiếm tag....">
                    </form>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-bordered table-striped table-bordered bulk_action">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Thông tin</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($tag as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->name}}</td>
                                <td>
                                    <strong>Thêm lúc:</strong>{{$value->created_at}} <br>
                                    <strong>Cập nhật:</strong>{{$value->updated_at}}
                                </td>
                                <td>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="status{{$value->id}}" {{ $value->status == 1 ? 'checked' : '' }} name="status" onclick="changeStatusProjectTag({{$value->id}})">
                                        <label name="status{{$value->id}}" class="custom-control-label status{{$value->id}}" for="status{{$value->id}}">{{ $value->status ? 'Bật' : 'Tắt' }}</label>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-info">
                                        <a style="color: #FFFFFF" href="{{ route('admin.project.tag.edit', ['id' => $value->id]) }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    </button>
                                    <button class="btn btn-danger">
                                        <a style="color: #FFFFFF" href="{{ route('admin.project.tag.del', ['id' => $value->id]) }}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @include('admin.partials.pagination', ['itemPaginate' => $tag])
        </div>
    </div>
@endsection
