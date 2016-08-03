@extends('activity.app')

@section('title','รายการกิจกรรม ภาวิชาอายุรศาสตร์')

@section('content')
<h1>รายการกิจกรรม</h1>
<hr>

<form method="POST" action="{{ url('activity') }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />	
	<label>รหัสกิจกรรม : </label>
		<input type="text" name="activity_id" size="10"><br><br>
	<label>ชื่อกิจกรรม : </label>
		<input type="text" name="activity_name" size="100"><br><br>
	<label>ชื่อย่อกิจกรรม : </label>
		<input type="text" name="activity_acronym" size="30"><br><br>
	<label>เวลาเริ่มกิจกรรม : </label>
		<input type="time" name="start_time" size="30">
	<label>เวลาสิ้นสุดกิจกรรม : </label>
		<input type="time" name="end_time" size="30"><br><br>
	<label>รหัสภาระงาน : </label>
		<input type="text" name="job_id" size="30"><br><br>
	<label>ประเภทผู้เข้าร่วมกิจกรรม : </label>
		<select name='person_type'>
        	<option selected value= 'เลือกประเภทผู้เข้าร่วม'></option>
        	<option value="1">อาจารย์/Resident/Fellow</option>
        	<option value="2"> อาจารย์</option>
    	</select>
	<label>ตำแหน่งเครื่องทาบบัตร : </label>
		<select name='reader_location'>
        	<option selected value= 'เลือกตำแหน่งเครื่องทาบบัตร'></option>
        	<option value="1">ห้องวีกิจฯ</option>
        	<option value="2">Mobile 1</option>
        	<option value="3">Mobile 2</option>
        	<option value="4">OPD</option>
    	</select>

    	
	<input type="submit" value="บันทึกข้อมูล">

</form>
@endsection