SELECT * FROM activity;

SELECT * FROM locomotion;

SELECT * FROM postalcode;

SELECT * FROM staff;

SELECT * FROM staffacitivity;

SELECT * FROM workdepartment;

SELECT * FROM admin;

SELECT * FROM staff
INNER JOIN postalcode ON staff_PCID = postalcode_ID
INNER JOIN locomotion ON staff_locomotionID = locomotion_ID
INNER JOIN WorkDepartment ON Staff_DepartmentID = WorkDepartment_ID
INNER JOIN staffactivity ON staff_id = StaffActivity_StaffID
INNER JOIN activity on StaffActivity_ActivityID = activity_id
WHERE Staff_ID = 1;

SELECT staff_FirstName, Staff_Name, Staff_Mail , PostalCode_Number, PostalCode_Name, Locomotion_Name, WorkDepartment_Name, Activity_Name FROM staff
INNER JOIN postalcode ON staff_PCID = postalcode_ID
INNER JOIN locomotion ON staff_locomotionID = locomotion_ID
INNER JOIN WorkDepartment ON Staff_DepartmentID = WorkDepartment_ID
INNER JOIN staffactivity ON staff_id = StaffActivity_StaffID
INNER JOIN activity on StaffActivity_ActivityID = activity_id
WHERE Staff_ID = 1;

DELETE FROM staff WHERE Staff_ID = 3;
DELETE FROM staffactivity WHERE StaffActivity_StaffID = 3;