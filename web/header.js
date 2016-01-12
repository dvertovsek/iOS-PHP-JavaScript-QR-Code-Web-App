function generateCode(length) {
  var chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJLKMNOPQRSTUVWXYZ0123456789";
  var code = "";
  for (i = 0; i < length; i++)
  {
    var item = chars[Math.floor(Math.random()*chars.length)];
    code += item;
  }
  return code;
}

function checkForCodeScanned(){
  var data = "{'status' : '100'}";

  // TO DO: ajax
  //DOcument.location = "index.php";

  alert("bok");
  return data;
}
