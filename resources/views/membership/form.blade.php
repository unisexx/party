@extends('layouts.front') @section('content')


<section class="banner innerpage-banner contact-banner">
    <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="1000">สมัครสมาชิกพรรค</h1>
    </div>
</section>

<section class="blog-page blogsingle">
    <h3 data-aos="fade-up" data-aos-duration="1000">ใบสมัครสมาชิกพรรคพลังประชารัฐ</h3>

    <div class="container">
        {{Form::open(array('url'=>'membership/save', 'method'=>'post', 'class'=>'', 'id'=>'membershipFrm', 'files' => true))}}
        <h2>ข้อมูลทั่วไปของผู้สมัครสมาชิก</h2>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">ชื่อ - นามสกุล</label>
                    <input name="name" type="text" class="form-control" placeholder="ชื่อ - นามสกุล">
                </div>
                <div class="form-group col-md-4">
                    <label for="">เกิดวันที่</label>
                    <input name="birthdate" type="text" class="form-control" placeholder="เกิดวันที่">
                </div>
                <div class="form-group col-md-4">
                    <label for="">อายุ</label>
                    <input name="age" type="text" class="form-control" placeholder="อายุ">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">สัญชาติ</label>
                    <input name="nationality" type="text" class="form-control" placeholder="สัญชาติ">
                </div>
                <div class="form-group col-md-4">
                    <label for="">ศาสนา</label>
                    <input name="religion" type="text" class="form-control" placeholder="ศาสนา">
                </div>
                <div class="form-group col-md-4">
                    <label for="">จังหวัดที่เกิด</label>
                    <input name="birth_province" type="text" class="form-control" placeholder="จังหวัดที่เกิด">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">เลขประจำตัวประชาชน</label>
                    <input name="idcard" type="text" class="form-control" placeholder="เลชประจำตัวประชาชน">
                </div>
                <div class="form-group col-md-4">
                    <label for="">วันที่ออกบัตร</label>
                    <input name="issue_date" type="text" class="form-control" placeholder="วันที่ออกบัตร">
                </div>
                <div class="form-group col-md-4">
                    <label for="">วันหมดอายุ</label>
                    <input name="expired_date" type="text" class="form-control" placeholder="วันหมดอายุ">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="">ออกให้ที่ (เขต/อำเภอ)</label>
                    <input name="card_location" type="text" class="form-control" placeholder="ออกให้ที่ (เขต/อำเภอ)">
                </div>
                <div class="form-group col-md-4">
                    <label for="">จังหวัด</label>
                    <input name="card_province" type="text" class="form-control" placeholder="จังหวัด">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">สถานภาพ</label>
                    <select name="marital_status" id="inputState" class="form-control">
                        <option value="โสด">โสด</option>
                        <option value="สมรส">สมรส</option>
                        <option value="อย่า">อย่า</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="">จำนวนบุตร</label>
                    <input name="child_number" type="text" class="form-control" placeholder="จำนวนบุตร">
                </div>
                <div class="form-group col-md-4">
                    <label for="">ชื่อคู่สมรส</label>
                    <input name="couple_name" type="text" class="form-control" placeholder="ชื่อคู่สมรส">
                </div>
            </div>

        <hr>
        <h2>ประวัติการศึกษา</h2>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">ระดับการศึกษาสูงสุด</label>
                    <input name="education_level" type="text" class="form-control" placeholder="ระดับการศึกษาสูงสุด">
                </div>
                <div class="form-group col-md-4">
                    <label for="">คณะ/สาขา</label>
                    <input name="faculty" type="text" class="form-control" placeholder="คณะ/สาขา">
                </div>
                <div class="form-group col-md-4">
                    <label for="">จบเมื่อ</label>
                    <input name="graduation" type="text" class="form-control" placeholder="จบเมื่อ">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">สถาบัน</label>
                    <input name="institution" type="text" class="form-control" placeholder="สถาบัน">
                </div>
                <div class="form-group col-md-4">
                    <label for="">จังหวัด/รัฐ</label>
                    <input name="institution_province" type="text" class="form-control" placeholder="จังหวัด/รัฐ">
                </div>
                <div class="form-group col-md-4">
                    <label for="">ประเทศ</label>
                    <input name="institution_country" type="text" class="form-control" placeholder="ประเทศ">
                </div>
            </div>

        <hr>
        <h2>ที่อยู่ตามทะเบียนบ้าน</h2>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="">เลขที่</label>
                    <input name="reg_homeno" type="text" class="form-control" placeholder="เลขที่">
                </div>
                <div class="form-group col-md-3">
                    <label for="">หมู่ที่</label>
                    <input name="reg_moo" type="text" class="form-control" placeholder="หมู่ที่">
                </div>
                <div class="form-group col-md-3">
                    <label for="">อาคาร/หมู่บ้าน</label>
                    <input name="reg_building" type="text" class="form-control" placeholder="อาคาร/หมู่บ้าน">
                </div>
                <div class="form-group col-md-3">
                    <label for="">ตรอก/ซอย</label>
                    <input name="reg_soi" type="text" class="form-control" placeholder="ตรอก/ซอย">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="">ถนน</label>
                    <input name="reg_road" type="text" class="form-control" placeholder="ถนน">
                </div>
                <div class="form-group col-md-3">
                    <label for="">ตำบล/แขวง</label>
                    <input name="reg_subdistrict" type="text" class="form-control" placeholder="ตำบล/แขวง">
                </div>
                <div class="form-group col-md-3">
                    <label for="">อำเภอ/เขต</label>
                    <input name="reg_district" type="text" class="form-control" placeholder="อำเภอ/เขต">
                </div>
                <div class="form-group col-md-3">
                    <label for="">จังหวัด</label>
                    <input name="reg_province" type="text" class="form-control" placeholder="จังหวัด">
                </div>
            </div>

        <hr>
        <h2>ที่อยู่ที่สามารถติดต่อได้</h2>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="">เลขที่</label>
                    <input name="curr_homeno" type="text" class="form-control" placeholder="เลขที่">
                </div>
                <div class="form-group col-md-3">
                    <label for="">หมู่ที่</label>
                    <input name="curr_moo" type="text" class="form-control" placeholder="หมู่ที่">
                </div>
                <div class="form-group col-md-3">
                    <label for="">อาคาร/หมู่บ้าน</label>
                    <input name="curr_building" type="text" class="form-control" placeholder="อาคาร/หมู่บ้าน">
                </div>
                <div class="form-group col-md-3">
                    <label for="">ตรอก/ซอย</label>
                    <input name="curr_soi" type="text" class="form-control" placeholder="ตรอก/ซอย">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="">ถนน</label>
                    <input name="curr_road" type="text" class="form-control" placeholder="ถนน">
                </div>
                <div class="form-group col-md-3">
                    <label for="">ตำบล/แขวง</label>
                    <input name="curr_subdistrict" type="text" class="form-control" placeholder="ตำบล/แขวง">
                </div>
                <div class="form-group col-md-3">
                    <label for="">อำเภอ/เขต</label>
                    <input name="curr_district" type="text" class="form-control" placeholder="อำเภอ/เขต">
                </div>
                <div class="form-group col-md-3">
                    <label for="">จังหวัด</label>
                    <input name="curr_province" type="text" class="form-control" placeholder="จังหวัด">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="">รหัสไปรษณีย์</label>
                    <input name="curr_postcode" type="text" class="form-control" placeholder="รหัสไปรษณีย์">
                </div>
                <div class="form-group col-md-2">
                    <label for="">โทรศัพท์</label>
                    <input name="tel" type="text" class="form-control" placeholder="โทรศัพท์">
                </div>
                <div class="form-group col-md-2">
                    <label for="">โทรสาร</label>
                    <input name="fax" type="text" class="form-control" placeholder="โทรสาร">
                </div>
                <div class="form-group col-md-2">
                    <label for="">โทรศัพท์มือถือ</label>
                    <input name="mobile" type="text" class="form-control" placeholder="โทรศัพท์มือถือ">
                </div>
                <div class="form-group col-md-4">
                    <label for="">e-mail</label>
                    <input name="email" type="text" class="form-control" placeholder="e-mail">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="">อาชีพปัจจุบัน</label>
                    <input name="career" type="text" class="form-control" placeholder="อาชีพปัจจุบัน">
                </div>
                <div class="form-group col-md-3">
                    <label for="">ตำแหน่ง</label>
                    <input name="position" type="text" class="form-control" placeholder="ตำแหน่ง">
                </div>
                <div class="form-group col-md-6">
                    <label for="">สถานที่ทำงาน</label>
                    <input name="workplace" type="text" class="form-control" placeholder="สถานที่ทำงาน">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="">โทรศัพท์</label>
                    <input name="work_tel"type="text" class="form-control" placeholder="โทรศัพท์">
                </div>
                <div class="form-group col-md-3">
                    <label for="">โทรสาร</label>
                    <input name="work_fax"type="text" class="form-control" placeholder="โทรสาร">
                </div>
                <div class="form-group col-md-6">
                    <label for="">ความสามารถพิเศษ</label>
                    <input name="talent"type="text" class="form-control" placeholder="ความสามารถพิเศษ">
                </div>
            </div>

        <hr>
        <h2>ประวัติการเป็นสมาชิกพรรคการเมือง</h2>
            <div class="form-row">
                <div class="form-group col-md-3">
                <label for="">เคยเป็นสมาชิกพรรคการเมือง</label>
                    <select name="ever_party" id="inputState" class="form-control">
                        <option value="ไม่เคย">ไม่เคย</option>
                        <option value="เคย">เคย</option>
                    </select>
                </div>
                <div class="form-group col-md-9">
                    <label for="">ชื่อพรรค <small>(ปัจจุบันได้ลาออกจากการเป็นสมาชิกพรรคแล้ว)</small></label>
                    <input name="party_name" type="text" class="form-control" placeholder="ชื่อพรรค">
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
                    <input name="r_other" type="text" class="form-control" placeholder="อื่นๆ โปรดระบุ">
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
                    <input name="u_other" type="text" class="form-control" placeholder="อื่นๆ โปรดระบุ">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">เป็นสมาชิกองค์กร/สมาคม/สหภาพ/ชมรม/ชุมชน</label>
                    <input name="club" type="text" class="form-control" placeholder="เป็นสมาชิกองค์กร/สมาคม/สหภาพ/ชมรม/ชุมชน">
                </div>
                <div class="form-group col-md-3">
                    <label for="">จำนวน</label>
                    <input name="number" type="text" class="form-control" placeholder="จำนวน">
                </div>
                <div class="form-group col-md-3">
                    <label for="">องค์กร</label>
                    <input name="organization" type="text" class="form-control" placeholder="องค์กร">
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