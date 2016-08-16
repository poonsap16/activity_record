@extends('activity.app')

@section('title','ตารางวันหยุด')

@section('content')
<h1>รายการวันหยุดประจำปี</h1>
<hr>
<a href="{{ url('holiday/create') }}">สร้างรายการวันหยุด</a><br><br>

<table>
		<thead>
			<tr>
				<th style="background:#33CCFF">ลำดับ</th>
				<th style="background:#33CCFF">วันที่</th>
				<th style="background:#33CCFF">วันหยุด</th>
			</tr>
		</thead>
		<tbody>
			@foreach($holidays as $holiday)
				@if($holiday->id % 2 == 0)
				<tr style="background-color:#9FF781">
				@else
				<tr style="background-color:#F3F781">
				@endif
					<td>{{$holiday->id}}</td>
					<td>{{$holiday->date}}</td>
					<td>{{$holiday->holiday_name}}</td>
					<td><a href="/holiday/{{$holiday->id}}/edit">แก้ไข</a></td>
				</tr>
			@endforeach
		</tbody>


	</table>


@endsection