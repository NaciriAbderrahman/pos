<?php 

$title = "Ajoute" ; 

ob_start();
?>

<div style="position:relative; left:200px; top:30px;"> 

     <form action="ajoute.php" method="POST" enctype="multipart/form-data" >

         <input type="file" name="img" id="img" required> <br>
        <label for="">Type</label><br>
        <input type="text" name="type"><br>
        <label for="">Name</label><br>
        <input type="text" name="name" id=""><br>
        <label for=""></label>
        <label for="" >prix</label><br>
        <input type="numbre"  name="prix" />
        <br>
        <input style="margin-top: 20px;" type="submit" class="btn btn-success" value="Ajouter">

     </form>

    </div>

<?php $div = ob_get_clean() ;
      require_once "layout.php" ; ?>

