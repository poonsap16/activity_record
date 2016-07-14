# Activity Record Project.
## Department of Medicine - Faculty of Siriraj Hospital.

## Tables.
1. timesheet table - เก็บข้อมูลจากเครื่องอ่านบัตร
	`2016_07_14_021424_create_timesheet_table.php`

## Models.
1. App\TimeSheet - มี methods ดังนี้
	`public static loadcsv($fileName)` วิธีใช้ `App\TimeSheet::loadcsv('filename.csv');`

## Task List.
**Load scan data to database**
1. Load ข้อมูลจากเครื่องอ่านบัตร จากนั้นตั้งชื่อไฟล์ตาม format นี้ YYMMDD_YYMMDD.csv  
2. เติม head row ดังต่อไปนี้ no,rfid,sap_id,name,date,time,reader_location,stamp_type,reader_id  
3. นำไฟล์ไปเก็บที่ path project/scan_data_source (การเก็บไว้ใน public จะทำให้ client เข้าถึงไฟล์ได้)  
4. run method loadcsv() ใน model TimeSheet  


