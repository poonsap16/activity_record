@extends('activity.app')

@section('title','จัดตารางกิจกรรม ภาวิชาอายุรศาสตร์')

@section('content')
<h1>จัดตารางกิจกรรม</h1>
<hr>

<form method="POST" action="{{ url('calendar/date/') }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />	
	<label>รายการกิจจกรรม : </label>

		<select name='activity_name'>
			<option value = '0'>โปรดเลือกรายการ</option>
		@foreach($activitys as $activity)
        	<option value = "{{ $activity->id}}"> {{$activity->activity_name}}</option>
		@endforeach
		</select><br><br>
		<label>วันที่เริ่ม : </label>
			<input type="date" name="date_begin"><br><br>
		<label>วันที่สิ้นสุด : </label>
			<input type="date" name="date_end"><br><br>

		<label></label>
			
			<input type="radio" name="day" value="1">วันอาทิตย์
			<input type="radio" name="day" value="2">วันจันทร์
			<input type="radio" name="day" value="3">วันอังคาร
			<input type="radio" name="day" value="4">วันพุธ
			<input type="radio" name="day" value="5">วันพฤหัส
			<input type="radio" name="day" value="6">วันศุกร์
			<input type="radio" name="day" value="7">วันเสาร์

	<input type="submit" value="บันทึกข้อมูล">

</form>
@endsection
