SELECT * FROM activity;

SELECT * FROM locomotion;

SELECT * FROM postalcode;

SELECT * FROM staff;

SELECT * FROM staffacitivity;

SELECT * FROM workdepartment;

SELECT * FROM admin;

SELECT * FROM staff
LEFT OUTER JOIN postalcode ON staff_PCID = postalcode_ID
LEFT OUTER JOIN locomotion ON staff_locomotionID = locomotion_ID
LEFT OUTER JOIN WorkDepartment ON Staff_DepartmentID = WorkDepartment_ID
LEFT OUTER JOIN staffactivity ON staff_id = StaffActivity_StaffID
LEFT OUTER JOIN activity on StaffActivity_ActivityID = activity_id
WHERE Staff_ID = 1;