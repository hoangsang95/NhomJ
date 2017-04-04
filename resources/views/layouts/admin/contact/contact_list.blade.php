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
                        <th>Tên người gửi</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Tin nhắn</th>
                         <th>Ngày gửi</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contact as $r)
                    <tr class="odd gradeX" align="center">
                        <td>{{$r->Contact_Name}}</td>
                        <td>{{$r->Contact_Email}}</td>
                        <td>{{$r->Contact_Mobile}}</td>
                        <td>{{$r->Contact_Message}}</td>
                         <td>{{$r->Contact_Datetime}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/contact/contact_delete/{{$r->Contact_ID}}"> Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/contact/contact_edit/{{$r->Contact_ID}}">Sửa</a></td>
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