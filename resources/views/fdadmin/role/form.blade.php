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
              <h3 class="box-title">สิทธิ์การใช้งาน (เพิ่ม/แก้ไข)</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{Form::open(array('url'=>'fdadmin/role/save/'.@$role->id, 'method'=>'post', 'class'=>'', 'id'=>'pageFrm'))}}
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
              <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label>ชื่อสิทธิ์การใช้งาน</label>
                <input name="name" type="text" class="form-control" value="{{ @$role->name ? @$role->name : old('name') }}">
              </div>


              <table class="table">
                @foreach($perms as $perm)
                    <tr>
                        <th colspan="4" class="info"><b>{{ $perm->name }}</b></th>
                    </tr>

                    @foreach ($perm->childs()->orderBy('pos')->get() as $key => $child)
                        <tr>
                            <th colspan="2" class="" style="padding-left:35px;">{{ $child->name }}</th>
                            <td style="width:250px !important;">
                                @foreach($child->permissions()->orderBy('id')->get() as $key => $p)
                                    {{ Form::checkbox('pm[]', $p->name, @in_array($p->id, $pm), ['id' => $p->name, 'class' => 'role-chk-box']) }} <label for="{{ $p->name }}">{{ $p->display_name }}</label> &nbsp;&nbsp;&nbsp;
                                @endforeach
                            </td>
                            <td>
                                <label style="float: right;">
                                    <button type="button" class="btn btn-sm btn-default checkAllRow">เลือกทั้งหมด</button>
                                    <button type="button" class="btn btn-sm btn-default unCheckAllRow">ไม่เลือกทั้งหมด</button>
                                </label>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </table>


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

<script type="text/javascript">
$(function(){

    $('.checkAllRow').on('click', function(){
        var value = $(this).closest('tr').find('input').prop('checked', true);
        change_chk_box(value);
        return false;
    });

    $('.unCheckAllRow').on('click', function(){
        $(this).parent().closest('tr').find('input').prop('checked', false);
        return false;
    });

});
</script>

@endsection

