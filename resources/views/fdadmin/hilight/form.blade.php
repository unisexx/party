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
              <h3 class="box-title">ไฮไลท์ (เพิ่ม/แก้ไข)</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{Form::open(array('url'=>'fdadmin/hilight/save/'.@$rs->id, 'method'=>'post', 'class'=>'', 'id'=>'pageFrm', 'files' => true))}}
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

              <!-- text input -->
              <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label>หัวข้อ</label>
                <input name="title" type="text" class="form-control" value="{{ @$rs->title ? @$rs->title : old('title') }}">
              </div>

              <!-- <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label>รายละเอียด</label>
                <textarea name="description" class="form-control tinymce" rows="15">{{ @$rs->description ? @$rs->description : old('description') }}</textarea>
              </div> -->

              <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
                <label>ลิ้งค์</label>
                <input name="url" type="text" class="form-control" value="{{ @$rs->url ? @$rs->url : old('url') }}">
              </div>

              <div class="form-group">
                <label>ภาพไฮไลท์</label>
                @if(!empty($rs->image)) 
                  <div><img src="uploads/hilight/{{ $rs->image }}" width="600" style="margin-bottom:10px;"><div>
                @endif
                <input type="file" name="imgUpload">
              </div>


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
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

  <script src = "{{ URL::to('js/tinymce_file_manager/tinymce/tinymce.min.js') }}"></script>
<script>
tinymce.init({

   selector: "textarea.tinymce",theme: "modern",
	 height: 400,
   plugins: [
       "advlist autolink link image lists charmap print preview hr anchor pagebreak",
       "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
       "table contextmenu directionality emoticons paste textcolor responsivefilemanager code" ],
   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
   image_advtab: true ,
   external_filemanager_path:"js/tinymce_file_manager/filemanager/",
   filemanager_title:"Responsive Filemanager" ,
   external_plugins: { "filemanager" : "../filemanager/plugin.min.js"}
   ,relative_urls:false,
   remove_script_host:false
 });
</script>
@endsection
