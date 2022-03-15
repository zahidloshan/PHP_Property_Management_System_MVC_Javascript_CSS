function validateForm() {
    var ppropertyid = document.getElementById("pPropertyid").value;
    var pprice = document.getElementById("makeDiscount").value;
    if (ppropertyid == "") {
      document.getElementById("mytext").innerHTML="Please enter Property Id";
      return false;
    }
    if (pprice == "") {
      document.getElementById("mytext").innerHTML="Please enter Price";
      return false;
    }

    
  }