@extends('layouts.adminlte')

@section('content')

<!-- Content Wrapper. Contains hilight content -->
<div class="content-wrapper">
    <!-- Content Header (hilight header) -->
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
                        <h3 class="box-title">ไฮไลท์</h3>
                        @can('hilight-add')
                        <a href="{{ url('fdadmin/hilight/form') }}">
                            <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i>
                                เพิ่มรายการ</button>
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
                                    <th>หัวข้อ</th>
                                    <th data-orderable="false" data-searchable="false">ภาพแบนเนอร์</th>
                                    <th data-orderable="false" data-searchable="false">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rs as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>
                                        <input class="switch_status" type="checkbox" data-toggle="toggle"
                                            data-switch-id="{{ $row->id }}" @if($row->status == 'public') checked
                                        @endif>
                                    </td>
                                    <td>{{ $row->title }}</td>
                                    <td><img src="{{ url('uploads/hilight/'.$row->image) }}" width="300"></td>
                                    <td>
                                        @can('hilight-edit')
                                        <a href="fdadmin/hilight/form/{{ $row->id }}"><button type="button" class="btn btn-warning  btn-xs">แก้ไข</button></a>
                                        @endcan

                                        @can('hilight-delete')
                                        <a href="fdadmin/hilight/delete/{{ $row->id }}" onclick="return confirm('ต้องการลบรายการนี้')"><button
                                                type="button" class="btn btn-danger btn-xs">ลบ</button></a>
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
          data:{ table : 'hilights', status : $(this).prop('checked'), id : $(this).data('switch-id') },
          dataType: "json",
      });

    });

  });
</script>

@endsection
