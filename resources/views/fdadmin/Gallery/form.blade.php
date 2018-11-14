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
              <h3 class="box-title">ภาพกิจกรรม (เพิ่ม/แก้ไข)</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{Form::open(array('url'=>'fdadmin/gallery/save/'.@$rs->id, 'method'=>'post', 'class'=>'', 'id'=>'pageFrm', 'files' => true))}}
              <div class="box-body">


              <!-- text input -->
              <div class="form-group">
                <label>หัวข้อกิจกรรม</label>
                <input name="title" type="text" class="form-control" value="{{ @$rs->title }}">
              </div>

              <input type="button" class="btn btn-primary btn-attachimgs-add" value="เพิ่มภาพ">

              <table id="attach_img" class="table table-striped table-bordered table-data sorted_table">
                <thead>
                    <tr>
                        <th width="50">ลำดับ</th>
                        <th width="200">ภาพกิจกรรม</th>
                        <th width="50">ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- blueprint --}}
                    <tr id="bp_img" style="display:none;" class="placeholder">
                        <td class="text-center"></td>
                        <td>
                            <input type="file" name="attach_imgs_file[]" class="form-control">
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-delete btn-attachimgs-del"> X </button>
                            <input type="hidden" name="attach_imgs_id[]">
                        </td>
                    </tr>
                    @foreach($attach_imgs as $i)
                      <tr>
                          <td class="text-center"></td>
                          <td>
                              <div class="thumbnail-box thumbnail-box-inverse" style="margin-bottom:10px;">
                                  <a class="thumb-link" href="#" title=""></a>
                                  <div class="thumb-overlay bg-black"></div>
                                  <img src="{{url($i->getPath())}}" alt="{{$i->file_name}}" style="max-width:178px;"><!--
                              --></div>
                              <input type="file" name="attach_imgs_file[]" class="form-control">
                          </td>
                          <td>
                              <button type="button" class="btn btn-danger btn-delete btn-attachimgs-del"> X  </button>
                              <input type="hidden" name="attach_imgs_id[]" value="{{@$i->id}}">
                          </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>

              <!-- <div class="form-group">
                <label>รายละเอียด</label>
                <textarea name="description" class="form-control tinymce" rows="15">{{ @$rs->description }}</textarea>
              </div>

              <div class="form-group">
                <label>ภาพประกอบข่าว</label>
                @if(!empty($rs->image)) 
                  <div><img src="uploads/{{ $rs->image }}" width="250" style="margin-bottom:10px;"><div>
                @endif
                <input type="file" name="imgUpload">
              </div> -->


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

<script>
$(document).ready(function(){
  // ATTACH FILE (IMAGES)
  {{empty($attach_imgs->count())?'add_attachimgs();':'sort_attachimgs();'}}
  $('body').on('click', '.btn-attachimgs-add', add_attachimgs);
  $('body').on('click', '.btn-attachimgs-del', function(){ del_attachimgs($(this)); });
});
function sort_attachimgs() {
    for(i=0; i<=$('#attach_img tbody tr').length; i++) {
        $('#attach_img tbody tr').eq(i).find('td').eq(0).html(i);
    }
}
function add_attachimgs() {
    $('#attach_img tbody').append('<tr>'+$('#bp_img').html()+'</tr>');
    sort_attachimgs();
}
function del_attachimgs(obj) {
    obj.parent().parent().remove();
    sort_attachimgs();
}
</script>
@endsection
