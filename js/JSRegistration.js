function validateForm() {
    var sellername = document.getElementById("sellerName").value;
    var sphone = document.getElementById("sPhone").value;
    var tradelicen = document.getElementById("tradelicense").value;
    var streetaddress = document.getElementById("streetAddress").value;
    var sarea = document.getElementById("sArea").value;
    var scity = document.getElementById("sCity").value;
    var szipcode = document.getElementById("sZipCode").value;
    var email = document.getElementById("Email").value;
    var pass = document.getElementById("password").value;
    var rpass = document.getElementById("rpassword").value;
    
    
    if (sellername == "") {
      document.getElementById("mytext").innerHTML="Please enter Seller Name";
      return false;
    }
    if (sphone == "") {
      document.getElementById("mytext").innerHTML="Please enter Phone Number ";
      return false;
    }
    if (document.getElementById("male").checked == false && document.getElementById("female").checked == false)
    {
      document.getElementById("mytext").innerHTML="Please select Gender ";
      return false;
    }
    if (tradelicen == "") {
      document.getElementById("mytext").innerHTML="Please enter Tradelincense ";
      return false;
    }
    if (streetaddress == "") {
      document.getElementById("mytext").innerHTML="Please enter street Address";
      return false;
    }
    if (sarea == "") {
      document.getElementById("mytext").innerHTML="Please enter Area ";
      return false;
    }
    if (scity == "") {
      document.getElementById("mytext").innerHTML="Please enter City ";
      return false;
    }
    if (szipcode == "") {
      document.getElementById("mytext").innerHTML="Please enter Zip Code ";
      return false;
    }
    if (email == "") {
      document.getElementById("mytext").innerHTML="Please enter Email ";
      return false;
    }
    if (pass == "") {
      document.getElementById("mytext").innerHTML="Please enter Password ";
      return false;
    }
  
    if (rpass == "") {
      document.getElementById("mytext").innerHTML="Please Reenter Password ";
      return false;
    }
  
    
  }