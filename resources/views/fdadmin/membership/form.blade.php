@extends('layouts.adminlte')

@section('content')

<style>
form h2{
  margin-left:10px;
  font-size:18px;
}
form hr{
  border:1px solid #f4f4f4 !important;
}
</style>
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
              <h3 class="box-title">ผู้สมัครพรรค (เพิ่ม/แก้ไข)</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            

            {{Form::open(array('url'=>'fdadmin/membership/save/'.@$rs->id, 'method'=>'post', 'class'=>'', 'id'=>'membershipFrm', 'files' => true))}}
            <div class="box-body">
              
              <h2>ข้อมูลทั่วไปของผู้สมัครสมาชิก</h2>
                  <div class="form-row">
                      <div class="form-group col-md-4 {{ $errors->has('name') ? 'has-error' : '' }}">
                          <label for="">ชื่อ - นามสกุล</label>
                          <input name="name" type="text" class="form-control" placeholder="ชื่อ - นามสกุล" value="{{ @$rs->name ? @$rs->name : old('name') }}">
                      </div>
                      <div class="form-group col-md-4 {{ $errors->has('birthdate') ? 'has-error' : '' }}">
                          <label for="">เกิดวันที่</label>
                          <input name="birthdate" type="text" class="form-control" placeholder="เกิดวันที่" value="{{ @$rs->birthdate ? @$rs->birthdate : old('birthdate') }}">
                      </div>
                      <div class="form-group col-md-4 {{ $errors->has('age') ? 'has-error' : '' }}">
                          <label for="">อายุ</label>
                          <input name="age" type="text" class="form-control" placeholder="อายุ" value="{{ @$rs->age ? @$rs->age : old('age') }}">
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-4 {{ $errors->has('nationality') ? 'has-error' : '' }}">
                          <label for="">สัญชาติ</label>
                          <input name="nationality" type="text" class="form-control" placeholder="สัญชาติ" value="{{ @$rs->nationality ? @$rs->nationality : old('nationality') }}">
                      </div>
                      <div class="form-group col-md-4 {{ $errors->has('religion') ? 'has-error' : '' }}">
                          <label for="">ศาสนา</label>
                          <input name="religion" type="text" class="form-control" placeholder="ศาสนา" value="{{ @$rs->religion ? @$rs->religion : old('religion') }}">
                      </div>
                      <div class="form-group col-md-4 {{ $errors->has('birth_province') ? 'has-error' : '' }}">
                          <label for="">จังหวัดที่เกิด</label>
                          <input name="birth_province" type="text" class="form-control" placeholder="จังหวัดที่เกิด" value="{{ @$rs->birth_province ? @$rs->birth_province : old('birth_province') }}">
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-4 {{ $errors->has('idcard') ? 'has-error' : '' }}">
                          <label for="">เลขประจำตัวประชาชน</label>
                          <input name="idcard" type="text" class="form-control" placeholder="เลชประจำตัวประชาชน" value="{{ @$rs->idcard ? @$rs->idcard : old('idcard') }}">
                      </div>
                      <div class="form-group col-md-4 {{ $errors->has('issue_date') ? 'has-error' : '' }}">
                          <label for="">วันที่ออกบัตร</label>
                          <input name="issue_date" type="text" class="form-control" placeholder="วันที่ออกบัตร" value="{{ @$rs->issue_date ? @$rs->issue_date : old('issue_date') }}">
                      </div>
                      <div class="form-group col-md-4 {{ $errors->has('expired_date') ? 'has-error' : '' }}">
                          <label for="">วันหมดอายุ</label>
                          <input name="expired_date" type="text" class="form-control" placeholder="วันหมดอายุ" value="{{ @$rs->expired_date ? @$rs->expired_date : old('expired_date') }}">
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-8 {{ $errors->has('card_location') ? 'has-error' : '' }}">
                          <label for="">ออกให้ที่ (เขต/อำเภอ)</label>
                          <input name="card_location" type="text" class="form-control" placeholder="ออกให้ที่ (เขต/อำเภอ)" value="{{ @$rs->card_location ? @$rs->card_location : old('card_location') }}">
                      </div>
                      <div class="form-group col-md-4 {{ $errors->has('card_province') ? 'has-error' : '' }}">
                          <label for="">จังหวัด</label>
                          <input name="card_province" type="text" class="form-control" placeholder="จังหวัด" value="{{ @$rs->card_province ? @$rs->card_province : old('card_province') }}">
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-4 {{ $errors->has('marital_status') ? 'has-error' : '' }}">
                          <label for="">สถานภาพ</label>
                          <select name="marital_status" id="inputState" class="form-control">
                              <option value="โสด" @if (old('marital_status') == 'โสด' || @$rs->marital_status == 'โสด') selected="selected" @endif>โสด</option>
                              <option value="สมรส" @if (old('marital_status') == 'สมรส' || @$rs->marital_status == 'สมรส') selected="selected" @endif>สมรส</option>
                              <option value="อย่า" @if (old('marital_status') == 'อย่า' || @$rs->marital_status == 'อย่า') selected="selected" @endif>อย่า</option>
                          </select>
                      </div>
                      <div class="form-group col-md-4 {{ $errors->has('child_number') ? 'has-error' : '' }}">
                          <label for="">จำนวนบุตร</label>
                          <input name="child_number" type="text" class="form-control" placeholder="จำนวนบุตร" value="{{ @$rs->child_number ? @$rs->child_number : old('child_number') }}">
                      </div>
                      <div class="form-group col-md-4 {{ $errors->has('couple_name') ? 'has-error' : '' }}">
                          <label for="">ชื่อคู่สมรส</label>
                          <input name="couple_name" type="text" class="form-control" placeholder="ชื่อคู่สมรส" value="{{ @$rs->couple_name ? @$rs->couple_name : old('couple_name') }}">
                      </div>
                  </div>

              <hr>
              <h2>ประวัติการศึกษา</h2>
                  <div class="form-row">
                      <div class="form-group col-md-4 {{ $errors->has('education_level') ? 'has-error' : '' }}">
                          <label for="">ระดับการศึกษาสูงสุด</label>
                          <input name="education_level" type="text" class="form-control" placeholder="ระดับการศึกษาสูงสุด" value="{{ @$rs->education_level ? @$rs->education_level : old('education_level') }}">
                      </div>
                      <div class="form-group col-md-4 {{ $errors->has('faculty') ? 'has-error' : '' }}">
                          <label for="">คณะ/สาขา</label>
                          <input name="faculty" type="text" class="form-control" placeholder="คณะ/สาขา" value="{{ @$rs->faculty ? @$rs->faculty : old('faculty') }}">
                      </div>
                      <div class="form-group col-md-4 {{ $errors->has('graduation') ? 'has-error' : '' }}">
                          <label for="">จบเมื่อ</label>
                          <input name="graduation" type="text" class="form-control" placeholder="จบเมื่อ" value="{{ @$rs->graduation ? @$rs->graduation : old('graduation') }}">
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-4 {{ $errors->has('institution') ? 'has-error' : '' }}">
                          <label for="">สถาบัน</label>
                          <input name="institution" type="text" class="form-control" placeholder="สถาบัน" value="{{ @$rs->institution ? @$rs->institution : old('institution') }}">
                      </div>
                      <div class="form-group col-md-4 {{ $errors->has('institution_province') ? 'has-error' : '' }}">
                          <label for="">จังหวัด/รัฐ</label>
                          <input name="institution_province" type="text" class="form-control" placeholder="จังหวัด/รัฐ" value="{{ @$rs->institution_province ? @$rs->institution_province : old('institution_province') }}">
                      </div>
                      <div class="form-group col-md-4 {{ $errors->has('institution_country') ? 'has-error' : '' }}">
                          <label for="">ประเทศ</label>
                          <input name="institution_country" type="text" class="form-control" placeholder="ประเทศ" value="{{ @$rs->institution_country ? @$rs->institution_country : old('institution_country') }}">
                      </div>
                  </div>

              <hr>
              <h2>ที่อยู่ตามทะเบียนบ้าน</h2>
                  <div class="form-row">
                      <div class="form-group col-md-3 {{ $errors->has('reg_homeno') ? 'has-error' : '' }}">
                          <label for="">เลขที่</label>
                          <input name="reg_homeno" type="text" class="form-control" placeholder="เลขที่" value="{{ @$rs->reg_homeno ? @$rs->reg_homeno : old('reg_homeno') }}">
                      </div>
                      <div class="form-group col-md-3 {{ $errors->has('reg_moo') ? 'has-error' : '' }}">
                          <label for="">หมู่ที่</label>
                          <input name="reg_moo" type="text" class="form-control" placeholder="หมู่ที่" value="{{ @$rs->reg_moo ? @$rs->reg_moo : old('reg_moo') }}">
                      </div>
                      <div class="form-group col-md-3 {{ $errors->has('reg_building') ? 'has-error' : '' }}">
                          <label for="">อาคาร/หมู่บ้าน</label>
                          <input name="reg_building" type="text" class="form-control" placeholder="อาคาร/หมู่บ้าน" value="{{ @$rs->reg_building ? @$rs->reg_building : old('reg_building') }}">
                      </div>
                      <div class="form-group col-md-3 {{ $errors->has('reg_soi') ? 'has-error' : '' }}">
                          <label for="">ตรอก/ซอย</label>
                          <input name="reg_soi" type="text" class="form-control" placeholder="ตรอก/ซอย" value="{{ @$rs->reg_soi ? @$rs->reg_soi : old('reg_soi') }}">
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-3 {{ $errors->has('reg_road') ? 'has-error' : '' }}">
                          <label for="">ถนน</label>
                          <input name="reg_road" type="text" class="form-control" placeholder="ถนน" value="{{ @$rs->reg_road ? @$rs->reg_road : old('reg_road') }}">
                      </div>
                      <div class="form-group col-md-3 {{ $errors->has('reg_subdistrict') ? 'has-error' : '' }}">
                          <label for="">ตำบล/แขวง</label>
                          <input name="reg_subdistrict" type="text" class="form-control" placeholder="ตำบล/แขวง" value="{{ @$rs->reg_subdistrict ? @$rs->reg_subdistrict : old('reg_subdistrict') }}">
                      </div>
                      <div class="form-group col-md-3 {{ $errors->has('reg_district') ? 'has-error' : '' }}">
                          <label for="">อำเภอ/เขต</label>
                          <input name="reg_district" type="text" class="form-control" placeholder="อำเภอ/เขต" value="{{ @$rs->reg_district ? @$rs->reg_district : old('reg_district') }}">
                      </div>
                      <div class="form-group col-md-3 {{ $errors->has('reg_province') ? 'has-error' : '' }}">
                          <label for="">จังหวัด</label>
                          <input name="reg_province" type="text" class="form-control" placeholder="จังหวัด" value="{{ @$rs->reg_province ? @$rs->reg_province : old('reg_province') }}">
                      </div>
                  </div>

              <hr>
              <h2>ที่อยู่ที่สามารถติดต่อได้</h2>
                  <div class="form-row">
                      <div class="form-group col-md-3 {{ $errors->has('curr_homeno') ? 'has-error' : '' }}">
                          <label for="">เลขที่</label>
                          <input name="curr_homeno" type="text" class="form-control" placeholder="เลขที่" value="{{ @$rs->curr_homeno ? @$rs->curr_homeno : old('curr_homeno') }}">
                      </div>
                      <div class="form-group col-md-3 {{ $errors->has('curr_moo') ? 'has-error' : '' }}">
                          <label for="">หมู่ที่</label>
                          <input name="curr_moo" type="text" class="form-control" placeholder="หมู่ที่" value="{{ @$rs->curr_moo ? @$rs->curr_moo : old('curr_moo') }}">
                      </div>
                      <div class="form-group col-md-3 {{ $errors->has('curr_building') ? 'has-error' : '' }}">
                          <label for="">อาคาร/หมู่บ้าน</label>
                          <input name="curr_building" type="text" class="form-control" placeholder="อาคาร/หมู่บ้าน" value="{{ @$rs->curr_building ? @$rs->curr_building : old('curr_building') }}">
                      </div>
                      <div class="form-group col-md-3 {{ $errors->has('curr_soi') ? 'has-error' : '' }}">
                          <label for="">ตรอก/ซอย</label>
                          <input name="curr_soi" type="text" class="form-control" placeholder="ตรอก/ซอย" value="{{ @$rs->curr_soi ? @$rs->curr_soi : old('curr_soi') }}">
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-3 {{ $errors->has('curr_road') ? 'has-error' : '' }}">
                          <label for="">ถนน</label>
                          <input name="curr_road" type="text" class="form-control" placeholder="ถนน" value="{{ @$rs->curr_road ? @$rs->curr_road : old('curr_road') }}">
                      </div>
                      <div class="form-group col-md-3 {{ $errors->has('curr_subdistrict') ? 'has-error' : '' }}">
                          <label for="">ตำบล/แขวง</label>
                          <input name="curr_subdistrict" type="text" class="form-control" placeholder="ตำบล/แขวง" value="{{ @$rs->curr_subdistrict ? @$rs->curr_subdistrict : old('curr_subdistrict') }}">
                      </div>
                      <div class="form-group col-md-3 {{ $errors->has('curr_district') ? 'has-error' : '' }}">
                          <label for="">อำเภอ/เขต</label>
                          <input name="curr_district" type="text" class="form-control" placeholder="อำเภอ/เขต" value="{{ @$rs->curr_district ? @$rs->curr_district : old('curr_district') }}">
                      </div>
                      <div class="form-group col-md-3 {{ $errors->has('curr_province') ? 'has-error' : '' }}">
                          <label for="">จังหวัด</label>
                          <input name="curr_province" type="text" class="form-control" placeholder="จังหวัด" value="{{ @$rs->curr_province ? @$rs->curr_province : old('curr_province') }}">
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-2 {{ $errors->has('curr_postcode') ? 'has-error' : '' }}">
                          <label for="">รหัสไปรษณีย์</label>
                          <input name="curr_postcode" type="text" class="form-control" placeholder="รหัสไปรษณีย์" value="{{ @$rs->curr_postcode ? @$rs->curr_postcode : old('curr_postcode') }}">
                      </div>
                      <div class="form-group col-md-2 {{ $errors->has('tel') ? 'has-error' : '' }}">
                          <label for="">โทรศัพท์</label>
                          <input name="tel" type="text" class="form-control" placeholder="โทรศัพท์" value="{{ @$rs->tel ? @$rs->tel : old('tel') }}">
                      </div>
                      <div class="form-group col-md-2 {{ $errors->has('fax') ? 'has-error' : '' }}">
                          <label for="">โทรสาร</label>
                          <input name="fax" type="text" class="form-control" placeholder="โทรสาร" value="{{ @$rs->fax ? @$rs->fax : old('fax') }}">
                      </div>
                      <div class="form-group col-md-2 {{ $errors->has('mobile') ? 'has-error' : '' }}">
                          <label for="">โทรศัพท์มือถือ</label>
                          <input name="mobile" type="text" class="form-control" placeholder="โทรศัพท์มือถือ" value="{{ @$rs->mobile ? @$rs->mobile : old('mobile') }}">
                      </div>
                      <div class="form-group col-md-4 {{ $errors->has('email') ? 'has-error' : '' }}">
                          <label for="">e-mail</label>
                          <input name="email" type="text" class="form-control" placeholder="e-mail" value="{{ @$rs->email ? @$rs->email : old('email') }}">
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-3 {{ $errors->has('career') ? 'has-error' : '' }}">
                          <label for="">อาชีพปัจจุบัน</label>
                          <input name="career" type="text" class="form-control" placeholder="อาชีพปัจจุบัน" value="{{ @$rs->career ? @$rs->career : old('career') }}">
                      </div>
                      <div class="form-group col-md-3 {{ $errors->has('position') ? 'has-error' : '' }}">
                          <label for="">ตำแหน่ง</label>
                          <input name="position" type="text" class="form-control" placeholder="ตำแหน่ง" value="{{ @$rs->position ? @$rs->position : old('position') }}">
                      </div>
                      <div class="form-group col-md-6 {{ $errors->has('workplace') ? 'has-error' : '' }}">
                          <label for="">สถานที่ทำงาน</label>
                          <input name="workplace" type="text" class="form-control" placeholder="สถานที่ทำงาน" value="{{ @$rs->workplace ? @$rs->workplace : old('workplace') }}">
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-3 {{ $errors->has('work_tel') ? 'has-error' : '' }}">
                          <label for="">โทรศัพท์</label>
                          <input name="work_tel"type="text" class="form-control" placeholder="โทรศัพท์" value="{{ @$rs->work_tel ? @$rs->work_tel : old('work_tel') }}">
                      </div>
                      <div class="form-group col-md-3 {{ $errors->has('work_fax') ? 'has-error' : '' }}">
                          <label for="">โทรสาร</label>
                          <input name="work_fax"type="text" class="form-control" placeholder="โทรสาร" value="{{ @$rs->work_fax ? @$rs->work_fax : old('work_fax') }}">
                      </div>
                      <div class="form-group col-md-6 {{ $errors->has('talent') ? 'has-error' : '' }}">
                          <label for="">ความสามารถพิเศษ</label>
                          <input name="talent"type="text" class="form-control" placeholder="ความสามารถพิเศษ" value="{{ @$rs->talent ? @$rs->talent : old('talent') }}">
                      </div>
                  </div>

              <hr>
              <h2>ประวัติการเป็นสมาชิกพรรคการเมือง</h2>
                  <div class="form-row">
                      <div class="form-group col-md-3 {{ $errors->has('ever_party') ? 'has-error' : '' }}">
                      <label for="">เคยเป็นสมาชิกพรรคการเมือง</label>
                          <select name="ever_party" id="inputState" class="form-control">
                              <option value="ไม่เคย" @if (old('ever_party') == 'ไม่เคย' || @$rs->ever_party == 'ไม่เคย') selected="selected" @endif>ไม่เคย</option>
                              <option value="เคย" @if (old('ever_party') == 'เคย' || @$rs->ever_party == 'เคย') selected="selected" @endif>เคย</option>
                          </select>
                      </div>
                      <div class="form-group col-md-9 {{ $errors->has('party_name') ? 'has-error' : '' }}">
                          <label for="">ชื่อพรรค <small>(ปัจจุบันได้ลาออกจากการเป็นสมาชิกพรรคแล้ว)</small></label>
                          <input name="party_name" type="text" class="form-control" placeholder="ชื่อพรรค" value="{{ @$rs->party_name ? @$rs->party_name : old('party_name') }}">
                      </div>
                  </div>

              <hr>
              <h2>ประสบการณ์ทางการเมือง</h2>
                  <div class="form-row">
                      <div class="form-group col-md-12">
                      <label for="">เคยสมัคร : </label>
                          <div class="form-check form-check-inline">
                              <input name="rsw" class="form-check-input" type="checkbox" id="" value="1" @if (old('rsw') == '1' || @$rs->rsw == '1') checked="checked" @endif>
                              <label class="form-check-label" for="">ส.ว.</label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input name="rss" class="form-check-input" type="checkbox" id="" value="1" @if (old('rss') == '1' || @$rs->rss == '1') checked="checked" @endif>
                              <label class="form-check-label" for="">ส.ส.</label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input name="rsj" class="form-check-input" type="checkbox" id="" value="1" @if (old('rsj') == '1' || @$rs->rsj == '1') checked="checked" @endif>
                              <label class="form-check-label" for="">ส.จ.</label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input name="rst" class="form-check-input" type="checkbox" id="" value="1" @if (old('rst') == '1' || @$rs->rst == '1') checked="checked" @endif>
                              <label class="form-check-label" for="">ส.ท.</label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input name="rabt" class="form-check-input" type="checkbox" id="" value="1" @if (old('rabt') == '1' || @$rs->rabt == '1') checked="checked" @endif>
                              <label class="form-check-label" for="">อบต.</label>
                          </div>
                          <input name="r_other" type="text" class="form-control" placeholder="อื่นๆ โปรดระบุ" value="{{ @$rs->r_other ? @$rs->r_other : old('r_other') }}">
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-12">
                      <label for="">เคยเป็น : </label>
                          <div class="form-check form-check-inline">
                              <input name="usw" class="form-check-input" type="checkbox" id="" value="1" @if (old('usw') == '1' || @$rs->usw == '1') checked="checked" @endif>
                              <label class="form-check-label" for="">ส.ว.</label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input name="uss" class="form-check-input" type="checkbox" id="" value="1" @if (old('uss') == '1' || @$rs->uss == '1') checked="checked" @endif>
                              <label class="form-check-label" for="">ส.ส.</label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input name="usj" class="form-check-input" type="checkbox" id="" value="1" @if (old('usj') == '1' || @$rs->usj == '1') checked="checked" @endif>
                              <label class="form-check-label" for="">ส.จ.</label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input name="ust" class="form-check-input" type="checkbox" id="" value="1" @if (old('ust') == '1' || @$rs->ust == '1') checked="checked" @endif>
                              <label class="form-check-label" for="">ส.ท.</label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input name="uabt" class="form-check-input" type="checkbox" id="" value="1" @if (old('uabt') == '1' || @$rs->uabt == '1') checked="checked" @endif>
                              <label class="form-check-label" for="">อบต.</label>
                          </div>
                          <input name="u_other" type="text" class="form-control" placeholder="อื่นๆ โปรดระบุ" value="{{ @$rs->u_other ? @$rs->u_other : old('u_other') }}">
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-6 {{ $errors->has('club') ? 'has-error' : '' }}">
                          <label for="">เป็นสมาชิกองค์กร/สมาคม/สหภาพ/ชมรม/ชุมชน</label>
                          <input name="club" type="text" class="form-control" placeholder="เป็นสมาชิกองค์กร/สมาคม/สหภาพ/ชมรม/ชุมชน" value="{{ @$rs->club ? @$rs->club : old('club') }}">
                      </div>
                      <div class="form-group col-md-3 {{ $errors->has('number') ? 'has-error' : '' }}">
                          <label for="">จำนวน</label>
                          <input name="number" type="text" class="form-control" placeholder="จำนวน" value="{{ @$rs->number ? @$rs->number : old('number') }}">
                      </div>
                      <div class="form-group col-md-3 {{ $errors->has('organization') ? 'has-error' : '' }}">
                          <label for="">องค์กร</label>
                          <input name="organization" type="text" class="form-control" placeholder="องค์กร" value="{{ @$rs->organization ? @$rs->organization : old('organization') }}">
                      </div>
                  </div>

              <hr>
              <h2>แนบเอกสารประกอบการสมัคร</h2>
              <div style="margin-left:20px;">
                  <div class="form-group">
                      <label for="exampleFormControlFile1">เอกสารแนบ 1</label>
                      @if(!empty($rs->file_path_1)) 
                        <a href="{{ url('fdadmin/membership/filedownload/'.$rs->id.'/file_path_1/1') }}"><div><i class="fa fa-download"></i> ดาวน์โหลดเอกสาร<div></a>
                      @endif
                      <input name="filUpload_1" type="file" class="form-control-file" id="">
                  </div>
                  <div class="form-group">
                      <label for="exampleFormControlFile1">เอกสารแนบ 2</label>
                      @if(!empty($rs->file_path_2)) 
                        <a href="{{ url('fdadmin/membership/filedownload/'.$rs->id.'/file_path_2/2') }}"><div><i class="fa fa-download"></i> ดาวน์โหลดเอกสาร<div></a>
                      @endif
                      <input name="filUpload_2" type="file" class="form-control-file" id="">
                  </div>
                  <div class="form-group">
                      <label for="exampleFormControlFile1">เอกสารแนบ 3</label>
                      @if(!empty($rs->file_path_3)) 
                        <a href="{{ url('fdadmin/membership/filedownload/'.$rs->id.'/file_path_3/3') }}"><div><i class="fa fa-download"></i> ดาวน์โหลดเอกสาร<div></a>
                      @endif
                      <input name="filUpload_3" type="file" class="form-control-file" id="">
                  </div>
                  <div class="form-group">
                      <label for="exampleFormControlFile1">เอกสารแนบ 4</label>
                      @if(!empty($rs->file_path_4)) 
                        <a href="{{ url('fdadmin/membership/filedownload/'.$rs->id.'/file_path_4/4') }}"><div><i class="fa fa-download"></i> ดาวน์โหลดเอกสาร<div></a>
                      @endif
                      <input name="filUpload_4" type="file" class="form-control-file" id="">
                  </div>
                  <div class="form-group">
                      <label for="exampleFormControlFile1">เอกสารแนบ 5</label>
                      @if(!empty($rs->file_path_5)) 
                        <a href="{{ url('fdadmin/membership/filedownload/'.$rs->id.'/file_path_5/5') }}"><div><i class="fa fa-download"></i> ดาวน์โหลดเอกสาร<div></a>
                      @endif
                      <input name="filUpload_5" type="file" class="form-control-file" id="">
                  </div>
                </div>

              <hr>
              <h2>ตรวจสอบใบสมัคร</h2>
              <div class="form-row">
                  <div class="form-group col-md-12 {{ $errors->has('ever_party') ? 'has-error' : '' }}">
                    <label for="">ผลการตรวจสอบ</label>
                        <select name="status" id="inputState" class="form-control">
                          <option value="รอการตรวจสอบ" @if (old('status') == 'รอการตรวจสอบ' || @$rs->status == 'รอการตรวจสอบ') selected="selected" @endif>รอการตรวจสอบ</option>
                          <option value="ผ่าน" @if (old('status') == 'ผ่าน' || @$rs->status == 'ผ่าน') selected="selected" @endif>ผ่าน</option>
                          <option value="ไม่ผ่าน" @if (old('status') == 'ไม่ผ่าน' || @$rs->status == 'ไม่ผ่าน') selected="selected" @endif>ไม่ผ่าน</option>
                        </select>
                    </div>
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

  <script src = "{{ URL::to('js/tinymce_file_membership/tinymce/tinymce.min.js') }}"></script>
<script>
tinymce.init({

   selector: "textarea.tinymce",theme: "modern",
	 height: 400,
   plugins: [
       "advlist autolink link image lists charmap print preview hr anchor pagebreak",
       "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
       "table contextmenu directionality emoticons paste textcolor responsivefilemembership code" ],
   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: "| responsivefilemembership | link unlink anchor | image media | forecolor backcolor  | print preview code ",
   image_advtab: true ,
   external_filemembership_path:"js/tinymce_file_membership/filemembership/",
   filemembership_title:"Responsive Filemembership" ,
   external_plugins: { "filemembership" : "../filemembership/plugin.min.js"}
   ,relative_urls:false,
   remove_script_host:false
 });
</script>
@endsection
