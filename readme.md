# Activity Record Project.
## Department of Medicine - Faculty of Siriraj Hospital.

## Tables.
1. timesheet table - เก็บข้อมูลจากเครื่องอ่านบัตร
	`2016_07_14_021424_create_timesheet_table.php`
2. activitys table - เก็บข้อมูลรายการกิจกรรม
	'2016_08_02_062805_create_activitys_table.php'
3. calendars table - เก็บข้อมูลวันจัดกิจกรรม
	'2016_08_02_062700_create_calendars_table.php'
4. holidays table - เก็บข้อมูลวันหยุด
	'2016_08_02_065807_create_holidays_table.php'


## Models.
1. App\TimeSheet - มี methods ดังนี้
	`public static loadcsv($fileName)` วิธีใช้ `App\TimeSheet::loadcsv('filename.csv');`
2. App\Activity
3. App\Calendar
4. App\Holiday

## Controller.
1. ActivitysController.php - สำหรับสร้างข้อมูลรายการกิจกรรมของภาควิชาฯ
2. HolidaysController.pbp - สำหรับจัดการตารางวันหยุด



## View.
1. activity\activity.blade.php - หน้าสร้างรายการกิจกรรม
2. activity\edit.blade.pbp - หน้าแก้ไขรายการกิจกรรม
3. 


## Task List.
**Load scan data to database**  
	1. Load ข้อมูลจากเครื่องอ่านบัตร จากนั้นตั้งชื่อไฟล์ตาม format นี้ `YYMMDD_YYMMDD.csv`  
	2. เติม head row ดังต่อไปนี้ `no,rfid,sap_id,name,date,time,reader_location,stamp_type,reader_id`  
	3. นำไฟล์ไปเก็บที่ path project/scan_data_source (การเก็บไว้ใน public จะทำให้ client เข้าถึงไฟล์ได้)  
	4. run method `loadcsv()` ใน model `TimeSheet`  


