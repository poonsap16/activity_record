@extends('activity.app')

@section('title','จัดตารางกิจกรรม ภาวิชาอายุรศาสตร์')

@section('content')
<h1>จัดตารางกิจกรรม</h1>
<hr>

<form method="POST" action="{{ url('date/') }}">
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

	<input type="submit" value="บันทึกข้อมูล">

</form>
@endsection
