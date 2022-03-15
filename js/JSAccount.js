function validateForm() {
    var amount = document.getElementById("WithrawAmount").value;
    if (amount == "") {
      document.getElementById("mytext").innerHTML="Please enter Withraw Amount";
      return false;
    }
  }