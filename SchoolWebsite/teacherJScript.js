function generateStudentId(sname)
{
	$.post("generateId.php",
	{
		studentName: (""+sname)
	});
	alert(("Really? "+sname));
}