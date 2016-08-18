@extends('activity.app') 

@section('title','จัดตารางกิจกรรม ภาวิชาอายุรศาสตร์') 

@section('content') 
<h1>จัดตารางกิจกรรม</h1> 
<hr> 
<form method="POST" action="{{ url('calendar/data/') }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />	
	<label>ชื่อกิจจกรรม : </label>
		@foreach($activitys as $activity)
			@if($activity->id == $activity_name)
				<input type="text" name="activity_name" value= "{{$activity->activity_name}}">
			@endif
		@endforeach
		<input type="text" name="activity_name" value= {{$activity_name}}>
		<br><br>
		<label>วันที่เริ่ม : </label>
		<input type="date" name="date_begin" value= {{$start}}><br><br>
		<label>วันที่สิ้นสุด : </label>
		<input type="date" name="date_end" value= {{$stop}}><br><br>

	<input type="submit" value="บันทึกข้อมูล">

</form>

{{$start}}
{{$stop}}

@endsection