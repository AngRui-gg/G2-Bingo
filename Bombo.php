<HTML>

<HEAD>
   <TITLE> Bombo</TITLE>
</HEAD>

<BODY>
   <?php
   $numero = range(1, 60);

   shuffle($numero);

   foreach ($numero as $num) {
      echo "<img src='imagesBombo/" . $num . ".PNG' alt='Bola " . $num . "' width='100'><br>";
      var_dump($num . "<br>");

   }
   ?>

</BODY>

</HTML>