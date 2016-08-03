@extends('activity.app')

@section('title','แก้ไขรายการกิจกรรม ภาวิชาอายุรศาสตร์')

@section('content')
<h1>แก้ไขรายการกิจกรรม</h1>
<hr>

<form method="POST" action="{{ url('activity/' . $activitys->id) }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />	
	<label>รหัสกิจกรรม : </label>
		<input type="text" name="activity_id" size="10" value="{{ $activitys->activity_id or '' }}"><br><br>
	<label>ชื่อกิจกรรม : </label>
		<input type="text" name="activity_name" size="100" value="{{ $activitys->activity_name or '' }}"><br><br>
	<label>ชื่อย่อกิจกรรม : </label>
		<input type="text" name="activity_acronym" size="30" value="{{ $activitys->activity_acronym or '' }}"><br><br>
	<label>เวลาเริ่มกิจกรรม : </label>
		<input type="time" name="start_time" size="30" value="{{ $activitys->start_time or '' }}">
	<label>เวลาสิ้นสุดกิจกรรม : </label>
		<input type="time" name="end_time" size="30" value="{{ $activitys->end_time or '' }}"><br><br>
	<label>รหัสภาระงาน : </label>
		<input type="text" name="job_id" size="30" value="{{ $activitys->job_id or '' }}"><br><br>
	<label>ประเภทผู้เข้าร่วมกิจกรรม : </label>
		<select name='person_type'>
			<option value= "1" {{ ($activitys->person_type == 1) ? 'selected' : '' }}>อาจารย์/Resident/Fellow</option>
			<option value="2" {{ ($activitys->person_type == 2) ? 'selected' : '' }}>อาจารย์</option>
		</select>

    <label>ตำแหน่งเครื่องทาบบัตร : </label>
		<select name='reader_location'>
        	<option value="1" {{ ($activitys->reader_location == 1) ? 'selected' : '' }}>ห้องวีกิจฯ</option>
        	<option value="2" {{ ($activitys->reader_location == 2) ? 'selected' : '' }}>Mobile 1</option>
        	<option value="3" {{ ($activitys->reader_location == 3) ? 'selected' : '' }}>Mobile 2</option>
        	<option value="4" {{ ($activitys->reader_location == 4) ? 'selected' : '' }}>OPD</option>
    	</select>
	<input type="submit" value="บันทึกข้อมูล">

</form>
@endsection