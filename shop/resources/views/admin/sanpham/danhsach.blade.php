@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>ID loại sản phẩm</th>
                        <th>Mô tả</th>
                        <th>Giá tiền</th>
                        <th>Khuyến mại</th>
                        <th>Hình ảnh</th>
                        <th>Đơn vị</th>
                        <th>Mới</th>
                        <th>Thời gian khởi tạo</th>
                        <th>Thời gian cập nhật cuối</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sanpham as $sp)
                        <tr class="odd gradeX" align="center">
                            <td>{{$sp->id}}</td>
                            <td>{{$sp->name}}</td>
                            <td>{{$sp->id_type}}</td>
                            <td>{{$sp->description}}</td>
                            <td>{{$sp->unit_price}}</td>
                            <td>{{$sp->promotion_price}}</td>
                            <td>{{$sp->image}}</td>
                            <td>{{$sp->unit}}</td>
                            <td>{{$sp->new}}</td>
                            <td>{{$sp->created_at}}</td>
                            <td>{{$sp->updated_at}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/sanpham/xoa/{{$sp->id}}"> Xóa</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/sanpham/sua/{{$sp->id}}">Sửa</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection
