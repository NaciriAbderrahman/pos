<?php
    $title="Desserts ";


    ob_start ();
?>

<script src="view/jquery.js"></script>

<style>
  .btn:active{
    border: none;
  }
</style>
    <div>


          <div class="container" style="width: 1500px; margin-top:70px;margin-left:50px;">
           <div class="row justify-content-between">

         <?php foreach($produits as $produit): ?>
          <div class="col-lg-4 col-md-6" style="height:350px;width: 200px; margin-top:10px; margin-left:0px;">
            <div style="height:350px;width: 320px ; border-radius: 12px; ">


            <img src="data:image/jpeg;base64,<?= base64_encode($produit->img); ?>" width="250"  height="200"  style="margin-left:40px;margin-top:10px;border-radius:12px;" >
                        <button class="btn" id="<?php echo $produit->url  ?>" onclick="get_item('<?=$produit->url ?>'),chng_btn('<?=$produit->url ?>'),qut_btn('<?=$produit->url ?>')" style="position:absolute; bottom:120px ; left : 110px; border-radius:20px; border:1Px solid black;cursor:pointer;width:150px; height : 40px;">
                          <img  style="position: absolute; top:8px; left:15px;"  src="images/icon-add-to-cart.svg" alt="">
                          <p style="position: absolute; top:5px; left:40px;" >Add to Cart</p>
                        </button>

                        <div class="btn" id="a<?php echo $produit->url  ?>" onclick="get_item('<?=$produit->url ?>'),chng_btn('<?=$produit->url ?>'),qut_btn('<?=$produit->url ?>')" style="display:none; position:absolute; bottom:120px ; left : 110px; border-radius:20px; border:1Px solid black;cursor:pointer;width:150px; height : 40px; background-color: white;">
                          <img  style="position: absolute; top:8px; left:15px;"  src="images/icon-add-to-cart.svg" alt="">
                          <p style="position: absolute; top:5px; left:40px;" >1</p>
                          
                         </div>
                        
                        <div style="padding-left: 44px; padding-top:20px;">

                          <label style="color:gray;"><?php echo $produit-> type ?></label> <br>
                          <label> <b><?php echo $produit-> name ?></b></label> <br>
                          <label style="color:orange;">$<?php echo $produit-> prix ?></label>
                        </div>

          </div>
            </div>

          <?php endforeach ?>
            
          <div style="position:absolute; top:210px; left:1150px; height: 300px; width:350px;">
             <div style="position: fixed; background-color: white; height: 400px; width:350px;border-radius:14px;">
              <h3 style="padding: 20px; color :orange;">
                Your cart (0)
              </h3>
              <div id="div">
                    
              </div>

            <script>

              function get_item(url_prd){
                      $.ajax({
                        url: "view/cart.php",
                        type:"POST",
                        data:{
                          url_prd : url_prd ,
                        }
                      }).done(function(data){

                         $("#div").html(data);
                         
                      }).fail(function(){
                        alert('Error in code ');
                      })
              }

              function chng_btn(url){
                $btn = document.getElementById(url);
                $btn.style.display = "none";
                $btn1 = document.getElementById("a"+url);
                $btn1.style.display = "block";

              }


              
              

            </script>
            </div>

          </div>

          </div>
          </div>



    </div>

   <?php $div = ob_get_clean() ;
      require_once "layout.php" ; ?>