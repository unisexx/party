@extends('layouts.adminlte')

@section('content')

<!-- Content Wrapper. Contains user content -->
<div class="content-wrapper">
    <!-- Content Header (user header) -->
    <!-- <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section> -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">ผู้ใช้งาน</h3>
              @can('user-add')
              <a href="{{ url('fdadmin/user/form') }}">
                <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> เพิ่มรายการ</button>
              </a>
              @endcan
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="tableSticker" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ไอดี</th>
                  <th>สถานะ</th>
                  <th>ชื่อ</th>
                  <th>อีเมล์</th>
                  <th>สิทธิ์การใช้งาน</th>
                  <th data-orderable="false" data-searchable="false">จัดการ</th>
                </tr>
                </thead>
                <tbody>
                	@foreach($rs as $row)
                		<tr>
                      <td>{{ $row->id }}</td>
                      <td>
                        <input class="switch_status" type="checkbox" data-toggle="toggle" data-switch-id="{{ $row->id }}" @if($row->status == 'public') checked @endif>
                      </td>
		                  <td>{{ $row->name }}</td>
                      <td>{{ $row->email }}</td>
                      <td>{{ $row->roles()->first()->name }}</td>
		                  <td>
                            @can('user-edit')
		                  	    <a href="fdadmin/user/form/{{ $row->id }}"><button type="button" class="btn btn-warning  btn-xs">แก้ไข</button></a>
                            @endcan

                            @can('user-delete')
		                  	    <a href="fdadmin/user/delete/{{ $row->id }}" onclick="return confirm('ต้องการลบรายการนี้')"><button type="button" class="btn btn-danger btn-xs">ลบ</button></a>
                            @endcan
		                  </td>
		                </tr>
                	@endforeach
                </tfoot>
              </table>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- switch status -->
<script>
  $(function() {

    $(document).on('change', ".switch_status", function () {
      
      $.ajax({
          url: '{{ url("fdadmin/ajax/changestatus") }}',
          data:{ table : 'users', status : $(this).prop('checked'), id : $(this).data('switch-id') },
          dataType: "json",
      });

    });

  });
</script>

@endsection