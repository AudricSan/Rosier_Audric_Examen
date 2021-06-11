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

UPDATE staff SET Staff_FirstName = 'Philippe' WHERE Staff_ID = 2;

UPDATE staff SET (Staff_Name, Staff_FirstName, Staff_Mail, Staff_PCID, Staff_LocomotionID, Staff_DepartmentID, Staff_Eating) VALUES (:names, :fisrt, :mail, :pcid, :loco, :depa, :eat);

UPDATE StaffActivity SET (StaffActivity_StaffID, StaffActivity_ActivityID) VALUES (:staffid, :activityid);

SELECT COUNT(StaffActivity_StaffID) as countnb FROM StaffActivity INNER JOIN Activity ON StaffActivity_ActivityID = Activity_Id WHERE Activity_Id = 2 GROUP BY StaffActivity_ActivityID;

SELECT Activity_MaxNumber FROM staffactivity INNER JOIN activity ON StaffActivity_ActivityID = Activity_ID WHERE StaffActivity_ActivityID LIKE 2 GROUP BY StaffActivity_ActivityID