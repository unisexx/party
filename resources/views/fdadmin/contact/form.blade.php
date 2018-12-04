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
              <h3 class="box-title">ติดต่อพรรค ผู้สมัครพรรค และ สส.ของพรรค (เพิ่ม/แก้ไข)</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{Form::open(array('url'=>'fdadmin/contact/save/'.@$rs->id, 'method'=>'post', 'class'=>'', 'id'=>'pageFrm', 'files' => true))}}
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

              <!-- text input -->
              <!-- <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label>ชื่อ</label>
                <input name="name" type="text" class="form-control" value="{{ @$rs->name ? @$rs->name : old('name') }}">
              </div> -->

              <div class="form-group {{ $errors->has('name_th') ? 'has-error' : '' }}">
                <label>ชื่อ (ภาษาไทย)</label>
                <input name="name_th" type="text" class="form-control" value="{{ @$rs->name_th ? @$rs->name_th : old('name_th') }}">
              </div>

              <div class="form-group {{ $errors->has('name_en') ? 'has-error' : '' }}">
                <label>ชื่อ (ภาษาอังกฤษ)</label>
                <input name="name_en" type="text" class="form-control" value="{{ @$rs->name_en ? @$rs->name_en : old('name_en') }}">
              </div>

              <!-- <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label>ที่อยู่</label>
                <input name="address" type="text" class="form-control" value="{{ @$rs->address ? @$rs->address : old('address') }}">
              </div> -->

              <div class="form-group {{ $errors->has('address_th') ? 'has-error' : '' }}">
                <label>ที่อยู่ (ภาษาไทย)</label>
                <input name="address_th" type="text" class="form-control" value="{{ @$rs->address_th ? @$rs->address_th : old('address_th') }}">
              </div>

              <div class="form-group {{ $errors->has('address_en') ? 'has-error' : '' }}">
                <label>ที่อยู่ (ภาษาอังกฤษ)</label>
                <input name="address_en" type="text" class="form-control" value="{{ @$rs->address_en ? @$rs->address_en : old('address_en') }}">
              </div>

              <div class="form-group {{ $errors->has('tel') ? 'has-error' : '' }}">
                <label>เบอร์โทรศัพท์</label>
                <input name="tel" type="text" class="form-control" value="{{ @$rs->tel ? @$rs->tel : old('tel') }}">
              </div>

              <div class="form-group {{ $errors->has('fax') ? 'has-error' : '' }}">
                <label>แฟกซ์</label>
                <input name="fax" type="text" class="form-control" value="{{ @$rs->fax ? @$rs->fax : old('fax') }}">
              </div>

              <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label>อีเมล์</label>
                <input name="email" type="text" class="form-control" value="{{ @$rs->email ? @$rs->email : old('email') }}">
              </div>

              <div class="form-group {{ $errors->has('skype') ? 'has-error' : '' }}">
                <label>Skype</label>
                <input name="skype" type="text" class="form-control" value="{{ @$rs->skype ? @$rs->skype : old('skype') }}">
              </div>

              <div class="form-group {{ $errors->has('line') ? 'has-error' : '' }}">
                <label>Line</label>
                <input name="line" type="text" class="form-control" value="{{ @$rs->line ? @$rs->line : old('line') }}">
              </div>

              <div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
                <label>Facebook</label>
                <input name="facebook" type="text" class="form-control" value="{{ @$rs->facebook ? @$rs->facebook : old('facebook') }}">
              </div>

              <div class="form-group {{ $errors->has('twitter') ? 'has-error' : '' }}">
                <label>Twitter</label>
                <input name="twitter" type="text" class="form-control" value="{{ @$rs->twitter ? @$rs->twitter : old('twitter') }}">
              </div>

              <div class="form-group {{ $errors->has('google_plus') ? 'has-error' : '' }}">
                <label>Google Plus</label>
                <input name="google_plus" type="text" class="form-control" value="{{ @$rs->google_plus ? @$rs->google_plus : old('google_plus') }}">
              </div>
              
              <div class="form-group {{ $errors->has('instagram') ? 'has-error' : '' }}">
                <label>Instagram</label>
                <input name="instagram" type="text" class="form-control" value="{{ @$rs->instagram ? @$rs->instagram : old('instagram') }}">
              </div>

              <div class="form-group {{ $errors->has('pinterest') ? 'has-error' : '' }}">
                <label>Pinterest</label>
                <input name="pinterest" type="text" class="form-control" value="{{ @$rs->pinterest ? @$rs->pinterest : old('pinterest') }}">
              </div>

              <div class="form-group {{ $errors->has('map') ? 'has-error' : '' }}">
                <label>ฝังแผนที่</label>
                <textarea class="form-control" name="map" id="" cols="30" rows="5">{{ @$rs->map ? @$rs->map : old('map') }}</textarea>
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
