@extends('layouts.admin.admin')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
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
                               <th>Slide_ID</th>
                                <th>Slide_Title</th>
                                <th>Slide_Description</th>
                                <th>Slide_Image</th>
                               
                                 <th>Slide_Order</th>
                                 
                                   <th></th>
                                  <th></th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($slide as $r)
                            <tr class="odd gradeX" align="center">
       
                                <td>{{$r->Slide_ID}}</td>
                                <td>{{$r->Slide_Title}}</td>
                                <td>{{$r->Slide_Description}}</td>
                                <td><img width="100px" src="{{asset('assets/data/'.$r->Slide_Image)}}"></td>
                                
                                <td>{{$r->Slide_Order}}</td>
                                
                               
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/slide/slide_delete/{{$r->Slide_ID}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/slide/slide_edit/{{$r->Slide_ID}}">Edit</a></td>
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