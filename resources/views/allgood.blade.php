<!DOCTYPE html>
<html onclick="hello();" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>
<body >
    <div id="click" onclick="dergController()">click</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<script>
function hello(){
    setInterval(dergController,60000);
}



function dergController(){
     $.ajax({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     },
     method: 'POST', 
     url: 'https://trackfox.tk/send-mails', 
     success: function(response){
         console.log(response);
     },
     error: function(jqXHR, textStatus, errorThrown) {
         console.log(JSON.stringify(jqXHR));
         console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
     }
 });

}


</script>
</html>