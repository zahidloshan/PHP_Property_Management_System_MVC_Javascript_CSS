function validateForm() {
    var nspass = document.getElementById("nsPassword").value;
    var cspass = document.getElementById("csPassword").value;
    if (nspass  == "") {
      document.getElementById("mytext").innerHTML="Please enter New Password";
      return false;
    }
    if (cspass == "") {
      document.getElementById("mytext").innerHTML="Please enter Confirm Password";
      return false;
    }
  }