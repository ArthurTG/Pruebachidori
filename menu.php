<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function()
{
    function ActializarJugadores()
    {
    	$.ajax({url: "ok.php", success: function(result)
        {
            $("#div1").html(result);
        }});
    }
    setInterval(ActializarJugadores, 1000);

});
</script>
</head>
<body>

<div><h2>Usuarios Conectados:</h2></div>
<div id="div1"></div>


</body>
</html>
