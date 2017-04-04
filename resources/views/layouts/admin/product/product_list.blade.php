@extends('layouts.admin.admin')
@section('content')
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
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Ngày</th>
                        <th>Hình ảnh</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product_list as $r)
                    <tr class="odd gradeX" align="center">
                        <td>{{$r->Product_ID}}</td>
                        <td>{{$r->Product_Name}}</td>
                        <td>{{$r->Product_Price}} VNĐ</td>
                        <td>{{$r->Product_Datetime}}</td>
                        <td><img  width="100px" src="{{asset('assets/data/'.$r->Product_Thumbnail)}}"</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/product/product_delete/{{$r->Product_ID}}"> Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/product_edit/{{$r->Product_ID}}">Sửa</a></td>
                    </tr>
                    @endforeach  
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection