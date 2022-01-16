
function validate() {
  if (document.Form.fName.value === "") {
    alert("First Name is required");
    document.myForm.fName.focus();
    return false;
  }

  if (document.Form.lName.value === "") {
    alert("last name is required");
    document.myForm.lName.focus();
    return false;
  }

  if (document.Form.schoolName.value === "") {
    alert("school name is required");
    document.myForm.schoolName.focus();
    return false;
  }

  if (document.Form.major.value === "") {
    alert("major is required");
    document.myForm.major.focus();
    return false;
  }

  return true;
}
