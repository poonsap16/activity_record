@extends('activity.app')

@section('title','วันหยุดประจำปี')

@section('content')
<h1>รายการวันหยุดประจำปี</h1>
<hr>

<form method="POST" action="{{ url('holiday') }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />	
	<label>วันที่ : </label>
		<input type="date" name="date"><br><br>
	<label>ชื่อวันหยุด : </label>
		<input type="text" name="holiday_name" size="100"><br><br>
	    	
	<input type="submit" value="บันทึกข้อมูล">

</form>

@endsection