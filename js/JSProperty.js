function validateForm() {
    var pname = document.getElementById("propertyName").value;
    var pid = document.getElementById("pId").value;
    var plocation = document.getElementById("pLocation").value;
    var powner = document.getElementById("pOwner").value;
    var pprice = document.getElementById("pPrice").value;
    var pquantity = document.getElementById("pQuantity").value;
    
    if (pname == "") {
        document.getElementById("mytext").innerHTML="Please enter Property Name";
        return false;
      }
      if (pid == "") {
        document.getElementById("mytext").innerHTML="Please enter Property Id";
        return false;
      }
      if (plocation == "") {
        document.getElementById("mytext").innerHTML="Please enter Property Location";
        return false;
      }
      if (powner == "") {
        document.getElementById("mytext").innerHTML="Please enter Property Owner";
        return false;
      }
      
      if (pprice == "") {
        document.getElementById("mytext").innerHTML="Please enter Price ";
        return false;
      }
      if (pquantity  == "") {
        document.getElementById("mytext").innerHTML="Please enter Quantity ";
        return false;
      }
    

}