function validateForm() {
    var pid = document.getElementById("pId").value;
    var pprice = document.getElementById("pPrice").value;
    var pquantity = document.getElementById("pQuantity").value;
    if (pid == "") {
      document.getElementById("mytext").innerHTML="Please enter Property Id";
      return false;
    }

    if (pquantity  == "") {
        document.getElementById("mytext").innerHTML="Please enter Quantity ";
        return false;
    }

        if (pprice == "") {
            document.getElementById("mytext").innerHTML="Please enter Price ";
            return false;
          }  
    
    
    
  }