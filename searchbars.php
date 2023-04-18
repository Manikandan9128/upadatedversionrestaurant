<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>
<body>
<form action="">
<input type="text"  id="search" name="search">
</form>
  
 
 
    <div id="result">result</div>
  
    <script></script>

    <!-- <script>
        let content=document.getElementById("search");
          function loadDoc(x) {
            if(x.length==0){
                content.innerHTML="empty...";
            }
            else{
                var xhttp = new XMLHttpRequest();

   
    xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
    content.innerHTML = this.responseText;
    console.log(this.responseText);
  } 
  xhttp.open("POST", "demosearchajax.php?data="+x, true);
    xhttp.send();
            }

} 
          }
        </script> -->
        <!-- <script>
    function loadDoc(x){
    let content=document.getElementById("result");
    let search =document.getElementById("search")
    alert(search);
    if(x.length==0){
                content.innerHTML="empty...";
            }
            else{
            xhtp= new XMLHttpRequest();
            
            xhtp.open("POST","search.php?data="+x,true);
            xhtp.onreadystatechange=function(){
           if (xhtp.readyState == 4 && xhtp.status == 200) {
    content.innerHTML = this.responseText;
    console.log(this.responseText);
  } }
            xhtp.send();
           }
        
        }

    </script>
   -->

</body>
</html>