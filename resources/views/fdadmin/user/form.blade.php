@extends('layouts.adminlte')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section> -->

    <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">ผู้ใช้งาน (เพิ่ม/แก้ไข)</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{Form::open(array('url'=>'fdadmin/user/save/'.@$rs->id, 'method'=>'post', 'class'=>'', 'id'=>'pageFrm', 'files' => true))}}
              <div class="box-body">

              @if(count($errors))
              <div class="alert alert-danger">
                  <strong>หมายเหตุ!</strong> ไม่สามารถบันทึกข้อมูลได้เนื่องจาก...
                  <br/>
                  <ul>
                      @foreach($errors->all() as $error)
                      <li>{!! $error !!}</li>
                      @endforeach
                  </ul>
              </div>
              @endif

              <div class="form-group {{ $errors->has('info_type_id') ? 'has-error' : '' }}">
                <label>สถานะ</label>
                {{ Form::select('status', array('public'=>'เปิด','draft'=>'ปิด'), @$rs->status, ['class' => 'form-control']) }}
              </div>

              <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                <label>สิทธิ์การใช้งาน</label>
                {{ Form::select('role', dropdownOption('roles','name','name'), @$rs ? @$rs->roles()->first()->name : '', ['placeholder' => '-- เลือกสิทธิ์การใช้งาน --','class' => 'form-control']) }}
              </div>

              <!-- text input -->
              <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label>ชื่อ</label>
                <input name="name" type="text" class="form-control" value="{{ @$rs->name ? @$rs->name : old('name') }}">
              </div>

          
              <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label>อีเมล์</label>
                <input name="email" type="text" class="form-control" value="{{ @$rs->email ? @$rs->email : old('email') }}">
              </div>

              <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label>รหัสผ่าน</label>
                <input name="password" type="password" class="form-control" value="">
              </div>

              <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                <label>ยืนยันรหัสผ่าน</label>
                <input name="password_confirmation" type="password" class="form-control" value="">
              </div>


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="hidden" name="edit" value="{{ @$rs->id? '1' : '0'}}">
                <!-- <button type="submit" class="btn btn-default">Cancel</button> -->
                <button type="submit" class="btn btn-info pull-right">บันทึกข้อมูล</button>
              </div>
              <!-- /.box-footer -->
            {{Form::close()}}
          </div>
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
