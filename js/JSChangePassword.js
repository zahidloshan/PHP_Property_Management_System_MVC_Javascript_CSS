function validateForm() {
    var sellerid = document.getElementById("sellerId").value;
    var spass = document.getElementById("sPassword").value;
    if (sellerid  == "") {
      document.getElementById("mytext").innerHTML="Please enter Id";
      return false;
    }
    if (spass == "") {
      document.getElementById("mytext").innerHTML="Please enter Password";
      return false;
    }
  }
  