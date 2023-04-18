<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>
<body>
    <input type="text" id="search">
    <div id="result"></div>
<script>
    $(document).ready(function(){
        $("#search").on("input",function(){
            var id=$("#search").val();
          

            $.ajax({
                url:'search.php',
                type:'POST',
                data:{data:id},
                success:function(response){
                    $("#result").html(response);
                }

            });
        });
    });
    </script>
</body>
</html>