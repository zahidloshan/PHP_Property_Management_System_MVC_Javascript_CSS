function validateForm() {
    var username = document.getElementById("userName").value;
    var password = document.getElementById("Password").value;
    if (username == "") {
      document.getElementById("mytext").innerHTML="Please enter username";
      return false;
    }
    if ( password == "") {
      document.getElementById("mytext").innerHTML="Please enter password";
      return false;
    }
  
    
  }