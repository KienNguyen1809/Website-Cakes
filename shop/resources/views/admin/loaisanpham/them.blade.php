@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại Sản Phẩm
                    <small>Thêm</small>
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

                <form action="admin/loaisanpham/them" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Tên loại sản phẩm</label>
                        <input class="form-control" name="name" placeholder="Nhập tên loại sản phẩm" />
                    </div>
                    <!-- <div class="form-group">
                        <label>description</label>
                        <textarea class="form-control" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label>image</label>
                        <input type="file" name="image">
                    </div>
                    <div class="form-group">
                        <label>created_at</label>
                        <textarea class="form-control" rows="1" name="created_at"></textarea>
                    </div>
                    <div class="form-group">
                        <label>updated_at</label>
                        <textarea class="form-control" rows="1" name="updated_at"></textarea>
                    </div> -->

                    <button type="submit" class="btn btn-default">THÊM</button>
                    <button type="reset" class="btn btn-default">RESET</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection