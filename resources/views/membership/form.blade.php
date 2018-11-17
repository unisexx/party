@extends('layouts.front') @section('content')


<section class="banner innerpage-banner contact-banner">
    <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="1000">สมัครสมาชิกพรรค</h1>
    </div>
</section>

<section class="blog-page blogsingle">
    <h3 data-aos="fade-up" data-aos-duration="1000">ใบสมัครสมาชิกพรรคพลังประชารัฐ</h3>

    <div class="container">

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

        {{Form::open(array('url'=>'membership/save', 'method'=>'post', 'class'=>'', 'id'=>'membershipFrm', 'files' => true))}}
        <h2>ข้อมูลทั่วไปของผู้สมัครสมาชิก</h2>
            <div class="form-row">
                <div class="form-group col-md-4 {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="">ชื่อ - นามสกุล</label>
                    <input name="name" type="text" class="form-control" placeholder="ชื่อ - นามสกุล" value="{{ old('name') }}">
                </div>
                <div class="form-group col-md-4 {{ $errors->has('birthdate') ? 'has-error' : '' }}">
                    <label for="">เกิดวันที่</label>
                    <input name="birthdate" type="text" class="form-control" placeholder="เกิดวันที่" value="{{ old('birthdate') }}">
                </div>
                <div class="form-group col-md-4 {{ $errors->has('age') ? 'has-error' : '' }}">
                    <label for="">อายุ</label>
                    <input name="age" type="text" class="form-control" placeholder="อายุ" value="{{ old('age') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4 {{ $errors->has('nationality') ? 'has-error' : '' }}">
                    <label for="">สัญชาติ</label>
                    <input name="nationality" type="text" class="form-control" placeholder="สัญชาติ" value="{{ old('nationality') }}">
                </div>
                <div class="form-group col-md-4 {{ $errors->has('religion') ? 'has-error' : '' }}">
                    <label for="">ศาสนา</label>
                    <input name="religion" type="text" class="form-control" placeholder="ศาสนา" value="{{ old('religion') }}">
                </div>
                <div class="form-group col-md-4 {{ $errors->has('birth_province') ? 'has-error' : '' }}">
                    <label for="">จังหวัดที่เกิด</label>
                    <input name="birth_province" type="text" class="form-control" placeholder="จังหวัดที่เกิด" value="{{ old('birth_province') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4 {{ $errors->has('idcard') ? 'has-error' : '' }}">
                    <label for="">เลขประจำตัวประชาชน</label>
                    <input name="idcard" type="text" class="form-control" placeholder="เลชประจำตัวประชาชน" value="{{ old('idcard') }}">
                </div>
                <div class="form-group col-md-4 {{ $errors->has('issue_date') ? 'has-error' : '' }}">
                    <label for="">วันที่ออกบัตร</label>
                    <input name="issue_date" type="text" class="form-control" placeholder="วันที่ออกบัตร" value="{{ old('issue_date') }}">
                </div>
                <div class="form-group col-md-4 {{ $errors->has('expired_date') ? 'has-error' : '' }}">
                    <label for="">วันหมดอายุ</label>
                    <input name="expired_date" type="text" class="form-control" placeholder="วันหมดอายุ" value="{{ old('expired_date') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8 {{ $errors->has('card_location') ? 'has-error' : '' }}">
                    <label for="">ออกให้ที่ (เขต/อำเภอ)</label>
                    <input name="card_location" type="text" class="form-control" placeholder="ออกให้ที่ (เขต/อำเภอ)" value="{{ old('card_location') }}">
                </div>
                <div class="form-group col-md-4 {{ $errors->has('card_province') ? 'has-error' : '' }}">
                    <label for="">จังหวัด</label>
                    <input name="card_province" type="text" class="form-control" placeholder="จังหวัด" value="{{ old('card_province') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4 {{ $errors->has('marital_status') ? 'has-error' : '' }}">
                    <label for="">สถานภาพ</label>
                    <select name="marital_status" id="inputState" class="form-control">
                        <option value="โสด" @if (old('marital_status') == 'โสด') selected="selected" @endif>โสด</option>
                        <option value="สมรส" @if (old('marital_status') == 'สมรส') selected="selected" @endif>สมรส</option>
                        <option value="อย่า" @if (old('marital_status') == 'อย่า') selected="selected" @endif>อย่า</option>
                    </select>
                </div>
                <div class="form-group col-md-4 {{ $errors->has('child_number') ? 'has-error' : '' }}">
                    <label for="">จำนวนบุตร</label>
                    <input name="child_number" type="text" class="form-control" placeholder="จำนวนบุตร" value="{{ old('child_number') }}">
                </div>
                <div class="form-group col-md-4 {{ $errors->has('couple_name') ? 'has-error' : '' }}">
                    <label for="">ชื่อคู่สมรส</label>
                    <input name="couple_name" type="text" class="form-control" placeholder="ชื่อคู่สมรส" value="{{ old('couple_name') }}">
                </div>
            </div>

        <hr>
        <h2>ประวัติการศึกษา</h2>
            <div class="form-row">
                <div class="form-group col-md-4 {{ $errors->has('education_level') ? 'has-error' : '' }}">
                    <label for="">ระดับการศึกษาสูงสุด</label>
                    <input name="education_level" type="text" class="form-control" placeholder="ระดับการศึกษาสูงสุด" value="{{ old('education_level') }}">
                </div>
                <div class="form-group col-md-4 {{ $errors->has('faculty') ? 'has-error' : '' }}">
                    <label for="">คณะ/สาขา</label>
                    <input name="faculty" type="text" class="form-control" placeholder="คณะ/สาขา" value="{{ old('faculty') }}">
                </div>
                <div class="form-group col-md-4 {{ $errors->has('graduation') ? 'has-error' : '' }}">
                    <label for="">จบเมื่อ</label>
                    <input name="graduation" type="text" class="form-control" placeholder="จบเมื่อ" value="{{ old('graduation') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4 {{ $errors->has('institution') ? 'has-error' : '' }}">
                    <label for="">สถาบัน</label>
                    <input name="institution" type="text" class="form-control" placeholder="สถาบัน" value="{{ old('institution') }}">
                </div>
                <div class="form-group col-md-4 {{ $errors->has('institution_province') ? 'has-error' : '' }}">
                    <label for="">จังหวัด/รัฐ</label>
                    <input name="institution_province" type="text" class="form-control" placeholder="จังหวัด/รัฐ" value="{{ old('institution_province') }}">
                </div>
                <div class="form-group col-md-4 {{ $errors->has('institution_country') ? 'has-error' : '' }}">
                    <label for="">ประเทศ</label>
                    <input name="institution_country" type="text" class="form-control" placeholder="ประเทศ" value="{{ old('institution_country') }}">
                </div>
            </div>

        <hr>
        <h2>ที่อยู่ตามทะเบียนบ้าน</h2>
            <div class="form-row">
                <div class="form-group col-md-3 {{ $errors->has('reg_homeno') ? 'has-error' : '' }}">
                    <label for="">เลขที่</label>
                    <input name="reg_homeno" type="text" class="form-control" placeholder="เลขที่" value="{{ old('reg_homeno') }}">
                </div>
                <div class="form-group col-md-3 {{ $errors->has('reg_moo') ? 'has-error' : '' }}">
                    <label for="">หมู่ที่</label>
                    <input name="reg_moo" type="text" class="form-control" placeholder="หมู่ที่" value="{{ old('reg_moo') }}">
                </div>
                <div class="form-group col-md-3 {{ $errors->has('reg_building') ? 'has-error' : '' }}">
                    <label for="">อาคาร/หมู่บ้าน</label>
                    <input name="reg_building" type="text" class="form-control" placeholder="อาคาร/หมู่บ้าน" value="{{ old('reg_building') }}">
                </div>
                <div class="form-group col-md-3 {{ $errors->has('reg_soi') ? 'has-error' : '' }}">
                    <label for="">ตรอก/ซอย</label>
                    <input name="reg_soi" type="text" class="form-control" placeholder="ตรอก/ซอย" value="{{ old('reg_soi') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3 {{ $errors->has('reg_road') ? 'has-error' : '' }}">
                    <label for="">ถนน</label>
                    <input name="reg_road" type="text" class="form-control" placeholder="ถนน" value="{{ old('reg_road') }}">
                </div>
                <div class="form-group col-md-3 {{ $errors->has('reg_subdistrict') ? 'has-error' : '' }}">
                    <label for="">ตำบล/แขวง</label>
                    <input name="reg_subdistrict" type="text" class="form-control" placeholder="ตำบล/แขวง" value="{{ old('reg_subdistrict') }}">
                </div>
                <div class="form-group col-md-3 {{ $errors->has('reg_district') ? 'has-error' : '' }}">
                    <label for="">อำเภอ/เขต</label>
                    <input name="reg_district" type="text" class="form-control" placeholder="อำเภอ/เขต" value="{{ old('reg_district') }}">
                </div>
                <div class="form-group col-md-3 {{ $errors->has('reg_province') ? 'has-error' : '' }}">
                    <label for="">จังหวัด</label>
                    <input name="reg_province" type="text" class="form-control" placeholder="จังหวัด" value="{{ old('reg_province') }}">
                </div>
            </div>

        <hr>
        <h2>ที่อยู่ที่สามารถติดต่อได้</h2>
            <div class="form-row">
                <div class="form-group col-md-3 {{ $errors->has('curr_homeno') ? 'has-error' : '' }}">
                    <label for="">เลขที่</label>
                    <input name="curr_homeno" type="text" class="form-control" placeholder="เลขที่" value="{{ old('curr_homeno') }}">
                </div>
                <div class="form-group col-md-3 {{ $errors->has('curr_moo') ? 'has-error' : '' }}">
                    <label for="">หมู่ที่</label>
                    <input name="curr_moo" type="text" class="form-control" placeholder="หมู่ที่" value="{{ old('curr_moo') }}">
                </div>
                <div class="form-group col-md-3 {{ $errors->has('curr_building') ? 'has-error' : '' }}">
                    <label for="">อาคาร/หมู่บ้าน</label>
                    <input name="curr_building" type="text" class="form-control" placeholder="อาคาร/หมู่บ้าน" value="{{ old('curr_building') }}">
                </div>
                <div class="form-group col-md-3 {{ $errors->has('curr_soi') ? 'has-error' : '' }}">
                    <label for="">ตรอก/ซอย</label>
                    <input name="curr_soi" type="text" class="form-control" placeholder="ตรอก/ซอย" value="{{ old('curr_soi') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3 {{ $errors->has('curr_road') ? 'has-error' : '' }}">
                    <label for="">ถนน</label>
                    <input name="curr_road" type="text" class="form-control" placeholder="ถนน" value="{{ old('curr_road') }}">
                </div>
                <div class="form-group col-md-3 {{ $errors->has('curr_subdistrict') ? 'has-error' : '' }}">
                    <label for="">ตำบล/แขวง</label>
                    <input name="curr_subdistrict" type="text" class="form-control" placeholder="ตำบล/แขวง" value="{{ old('curr_subdistrict') }}">
                </div>
                <div class="form-group col-md-3 {{ $errors->has('curr_district') ? 'has-error' : '' }}">
                    <label for="">อำเภอ/เขต</label>
                    <input name="curr_district" type="text" class="form-control" placeholder="อำเภอ/เขต" value="{{ old('curr_district') }}">
                </div>
                <div class="form-group col-md-3 {{ $errors->has('curr_province') ? 'has-error' : '' }}">
                    <label for="">จังหวัด</label>
                    <input name="curr_province" type="text" class="form-control" placeholder="จังหวัด" value="{{ old('curr_province') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2 {{ $errors->has('curr_postcode') ? 'has-error' : '' }}">
                    <label for="">รหัสไปรษณีย์</label>
                    <input name="curr_postcode" type="text" class="form-control" placeholder="รหัสไปรษณีย์" value="{{ old('curr_postcode') }}">
                </div>
                <div class="form-group col-md-2 {{ $errors->has('tel') ? 'has-error' : '' }}">
                    <label for="">โทรศัพท์</label>
                    <input name="tel" type="text" class="form-control" placeholder="โทรศัพท์" value="{{ old('tel') }}">
                </div>
                <div class="form-group col-md-2 {{ $errors->has('fax') ? 'has-error' : '' }}">
                    <label for="">โทรสาร</label>
                    <input name="fax" type="text" class="form-control" placeholder="โทรสาร" value="{{ old('fax') }}">
                </div>
                <div class="form-group col-md-2 {{ $errors->has('mobile') ? 'has-error' : '' }}">
                    <label for="">โทรศัพท์มือถือ</label>
                    <input name="mobile" type="text" class="form-control" placeholder="โทรศัพท์มือถือ" value="{{ old('mobile') }}">
                </div>
                <div class="form-group col-md-4 {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="">e-mail</label>
                    <input name="email" type="text" class="form-control" placeholder="e-mail" value="{{ old('email') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3 {{ $errors->has('career') ? 'has-error' : '' }}">
                    <label for="">อาชีพปัจจุบัน</label>
                    <input name="career" type="text" class="form-control" placeholder="อาชีพปัจจุบัน" value="{{ old('career') }}">
                </div>
                <div class="form-group col-md-3 {{ $errors->has('position') ? 'has-error' : '' }}">
                    <label for="">ตำแหน่ง</label>
                    <input name="position" type="text" class="form-control" placeholder="ตำแหน่ง" value="{{ old('position') }}">
                </div>
                <div class="form-group col-md-6 {{ $errors->has('workplace') ? 'has-error' : '' }}">
                    <label for="">สถานที่ทำงาน</label>
                    <input name="workplace" type="text" class="form-control" placeholder="สถานที่ทำงาน" value="{{ old('workplace') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3 {{ $errors->has('work_tel') ? 'has-error' : '' }}">
                    <label for="">โทรศัพท์</label>
                    <input name="work_tel"type="text" class="form-control" placeholder="โทรศัพท์" value="{{ old('work_tel') }}">
                </div>
                <div class="form-group col-md-3 {{ $errors->has('work_fax') ? 'has-error' : '' }}">
                    <label for="">โทรสาร</label>
                    <input name="work_fax"type="text" class="form-control" placeholder="โทรสาร" value="{{ old('work_fax') }}">
                </div>
                <div class="form-group col-md-6 {{ $errors->has('talent') ? 'has-error' : '' }}">
                    <label for="">ความสามารถพิเศษ</label>
                    <input name="talent"type="text" class="form-control" placeholder="ความสามารถพิเศษ" value="{{ old('talent') }}">
                </div>
            </div>

        <hr>
        <h2>ประวัติการเป็นสมาชิกพรรคการเมือง</h2>
            <div class="form-row">
                <div class="form-group col-md-3 {{ $errors->has('ever_party') ? 'has-error' : '' }}">
                <label for="">เคยเป็นสมาชิกพรรคการเมือง</label>
                    <select name="ever_party" id="inputState" class="form-control">
                        <option value="ไม่เคย">ไม่เคย</option>
                        <option value="เคย">เคย</option>
                    </select>
                </div>
                <div class="form-group col-md-9 {{ $errors->has('party_name') ? 'has-error' : '' }}">
                    <label for="">ชื่อพรรค <small>(ปัจจุบันได้ลาออกจากการเป็นสมาชิกพรรคแล้ว)</small></label>
                    <input name="party_name" type="text" class="form-control" placeholder="ชื่อพรรค" value="{{ old('party_name') }}">
                </div>
            </div>

        <hr>
        <h2>ประสบการณ์ทางการเมือง</h2>
            <div class="form-row">
                <div class="form-group col-md-12">
                <label for="">เคยสมัคร : </label>
                    <div class="form-check form-check-inline">
                        <input name="rsw" class="form-check-input" type="checkbox" id="" value="1">
                        <label class="form-check-label" for="">ส.ว.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input name="rss" class="form-check-input" type="checkbox" id="" value="1">
                        <label class="form-check-label" for="">ส.ส.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input name="rsj" class="form-check-input" type="checkbox" id="" value="1">
                        <label class="form-check-label" for="">ส.จ.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input name="rst" class="form-check-input" type="checkbox" id="" value="1">
                        <label class="form-check-label" for="">ส.ท.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input name="rabt" class="form-check-input" type="checkbox" id="" value="1">
                        <label class="form-check-label" for="">อบต.</label>
                    </div>
                    <input name="r_other" type="text" class="form-control" placeholder="อื่นๆ โปรดระบุ" value="{{ old('r_other') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                <label for="">เคยเป็น : </label>
                    <div class="form-check form-check-inline">
                        <input name="usw" class="form-check-input" type="checkbox" id="" value="1">
                        <label class="form-check-label" for="">ส.ว.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input name="uss" class="form-check-input" type="checkbox" id="" value="1">
                        <label class="form-check-label" for="">ส.ส.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input name="usj" class="form-check-input" type="checkbox" id="" value="1">
                        <label class="form-check-label" for="">ส.จ.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input name="ust" class="form-check-input" type="checkbox" id="" value="1">
                        <label class="form-check-label" for="">ส.ท.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input name="uabt" class="form-check-input" type="checkbox" id="" value="1">
                        <label class="form-check-label" for="">อบต.</label>
                    </div>
                    <input name="u_other" type="text" class="form-control" placeholder="อื่นๆ โปรดระบุ" value="{{ old('u_other') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 {{ $errors->has('club') ? 'has-error' : '' }}">
                    <label for="">เป็นสมาชิกองค์กร/สมาคม/สหภาพ/ชมรม/ชุมชน</label>
                    <input name="club" type="text" class="form-control" placeholder="เป็นสมาชิกองค์กร/สมาคม/สหภาพ/ชมรม/ชุมชน" value="{{ old('club') }}">
                </div>
                <div class="form-group col-md-3 {{ $errors->has('number') ? 'has-error' : '' }}">
                    <label for="">จำนวน</label>
                    <input name="number" type="text" class="form-control" placeholder="จำนวน" value="{{ old('number') }}">
                </div>
                <div class="form-group col-md-3 {{ $errors->has('organization') ? 'has-error' : '' }}">
                    <label for="">องค์กร</label>
                    <input name="organization" type="text" class="form-control" placeholder="องค์กร" value="{{ old('organization') }}">
                </div>
            </div>

        <hr>
        <h2>แนบเอกสารประกอบการสมัคร</h2>
            <div class="form-group">
                <label for="exampleFormControlFile1">เอกสารแนบ 1</label>
                <input name="filUpload_1" type="file" class="form-control-file" id="">
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">เอกสารแนบ 2</label>
                <input name="filUpload_2" type="file" class="form-control-file" id="">
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">เอกสารแนบ 3</label>
                <input name="filUpload_3" type="file" class="form-control-file" id="">
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">เอกสารแนบ 4</label>
                <input name="filUpload_4" type="file" class="form-control-file" id="">
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">เอกสารแนบ 5</label>
                <input name="filUpload_5" type="file" class="form-control-file" id="">
            </div>

            <hr>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="" style="text-indent:50px;">ข้าพเจ้าขอรับรองว่าเป็นผู้มีคุณสมบัติในการเป็นสมาชิกพรรค ไม่มีลักษณะต้องห้ามตามกฏหมาย และไม่เป็นสมาชิกพรรคการเมืองอื่น จึงขอสมัครเป็นสมาชิกพรรคพลังประชารัฐด้วยตนเอง</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">ยื่นใบสมัคร</button>
        {{Form::close()}}
    </div>

</section>


@endsection