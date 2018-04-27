@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small>{{$sanpham->name}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif

                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif

                <form action="admin/sanpham/sua/{{$sanpham->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input class="form-control" name="name" placeholder="Nhập tên sản phẩm" value="{{$sanpham->name}}" />
                    </div>
                    
                    <!-- Chọn loại sản phẩm (mũi tên chỉ xuống chọn) -->
                    <div class="form-group">
                        <label>ID loại sản phẩm</label>
                        <select class="form-control" name="id_type"> 
                            @foreach($loaisanpham as $lsp)
                                <!-- <option value="{{$lsp->id}}">{{$lsp->name}}</option> -->
                                <option 
                                    @if($sanpham->id_type == $lsp->id)
                                        {{"selected"}}
                                    @endif
                                    value="{{$lsp->id}}">{{$lsp->id}}</option>
                            @endforeach
                        </select>  
                    </div>

                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" rows="3" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Giá tiền</label>
                        <textarea class="form-control" rows="1" name="unit_price"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Khuyến mại</label>
                        <textarea class="form-control" rows="1" name="promotion_price"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="fImages">
                    </div>
                    <div class="form-group">
                        <label>Đơn vị</label>
                        <textarea class="form-control" rows="1" name="unit"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Mới</label>
                        <textarea class="form-control" rows="1" name="new"></textarea>
                    </div>
                  
                    <button type="submit" class="btn btn-default">SỬA</button>
                    <button type="reset" class="btn btn-default">RESET</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection