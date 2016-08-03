@extends('activity.app')

@section('title','รายการกิจกรรม ภาวิชาอายุรศาสตร์')

@section('content')
<h1>รายการกิจกรรม</h1>
<hr>
<a href="{{ url('activity/create') }}">สร้างรายการกิจกรรมใหม่</a><br><br>

<table>
		<thead>
			<tr>
				<th style="background:#33CCFF">ลำดับ</th>
				<th style="background:#33CCFF">รหัสกิจกรรม</th>
				<th style="background:#33CCFF">ชื่อกิจกรรม</th>
				<th style="background:#33CCFF">ชื่อย่อกิจกรรม</th>
				<th style="background:#33CCFF">เวลาที่เริ่มต้น</th>
				<th style="background:#33CCFF">เวลาที่สิ้นสุด</th>
				<th style="background:#33CCFF">รหัสภาระงาน</th>
				<th style="background:#33CCFF">ประเภทผู้เข้าร่วม</th>
				<th style="background:#33CCFF">ตำแหน่งเครื่อง</th>
			</tr>
		</thead>
		<tbody>
			@foreach($activitys as $activity)
				@if($activity->id % 2 == 0)
				<tr style="background-color:#9FF781">
				@else
				<tr style="background-color:#F3F781">
				@endif
					<td>{{$activity->id}}</td>
					<td>{{$activity->activity_id}}</td>
					<td>{{$activity->activity_name}}</td>
					<td>{{$activity->activity_acronym}}</td>
					<td>{{$activity->start_time}}</td>
					<td>{{$activity->end_time}}</td>
					<td>{{$activity->job_id}}</td>
					@if($activity->person_type == 1)
						<td>อาจารย์/Resident/Fellow</td>
					@else
						<td>อาจารย์</td>
					@endif

					<td>{{$activity->getRecordLocationName()}}</td>

					<td><a href="/activity/{{$activity->id}}/edit">แก้ไข</a></td>
				</tr>
			@endforeach
		</tbody>


	</table>


@endsection