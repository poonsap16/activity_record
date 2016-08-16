@extends('activity.app')

@section('title','วันหยุดประจำปี')

@section('content')
<h1>รายการวันหยุดประจำปี</h1>
<hr>

<form method="POST" action="{{ url('holiday/' . $holidays->id) }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />	
	<label>วันที่ : </label>
		<input type="text" name="date" size="10" value="{{ $holidays->date or '' }}"><br><br>
	<label>ชื่อวันหยุด : </label>
		<input type="text" name="name" size="50" value="{{ $holidays->name or '' }}"><br><br>
	<input type="submit" value="บันทึกข้อมูล">

</form>

@endsection