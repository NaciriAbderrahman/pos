<?php
    function get_item($url){
        $conn = mysqli_connect("localhost","root","","product");
        $item = mysqli_query($conn,"SELECT * FROM produit WHERE url = '$url' ");
        return $item;
    }
    function get_item2($url){
        $conn = mysqli_connect("localhost","root","","product");
        $item = mysqli_query($conn,"SELECT * FROM cart WHERE url = '$url' ");
        return $item;
    }
    function add_item($name,$type,$prix,$url){
        $conn =  mysqli_connect("localhost","root","","product");
        $add =  mysqli_query($conn,"INSERT INTO cart (nom,type,prix,url) VALUES ('$name' ,'$type','$prix','$url')");

    }
    
    $url_prd = $_POST['url_prd'];
    
    $item_sl = get_item($url_prd);
    mysqli_fetch_all($item_sl);

    foreach($item_sl as $item){
        $type = $item['type'];
        $name = $item['name'];
        $prix = $item['prix'];
        $url = $item['url'];
    } 
    add_item($name,$type,$prix,$url);

    $item_sl2 = get_item2($url_prd);

    


    

?>

<?php     foreach($item_sl2 as $item2): ?>

        <label for=""> <?= $item2['Nom']?></label>
        <label for=""><?=$item2['type']?></label>
        <label for=""><?=$item2['prix']?></label>


<?php endforeach ?>