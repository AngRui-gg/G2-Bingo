<HTML>
<HEAD><TITLE> Bombo</TITLE></HEAD>
<BODY>
<?php
 $numero = range(1-60);
 shuffle($numero);

 foreach ($numero as $num) {
    echo $num . "<br>";
 }
?>
</BODY>
</HTML>