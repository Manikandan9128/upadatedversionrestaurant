<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<script>
    // var xhttp;
    // if(window.XMLHttpRequest){
    //     xhttp=new XMLHttpRequest();
    //     console.log(xhttp);
    // }
    
  function loadDoc() {
  var xhttp = new XMLHttpRequest();

  xhttp.open("GET", "new.php", true);
  xhttp.send();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("demo").innerHTML = this.responseText;
    }
  };

} 
// function loadDoc(){
//     document.write("hello");
// }
</script>
</head>
<body>
    <div  id="demo">Hii</div>
    <button onclick="loadDoc()">click</button>
</body>
</html>