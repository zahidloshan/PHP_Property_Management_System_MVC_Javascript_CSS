function validateForm() {
    var pid = document.getElementById("pId").value;
    if (pid == "") {
      document.getElementById("mytext").innerHTML="Please enter Property Id";
      return false;
    }
  }