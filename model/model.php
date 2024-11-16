<?php 

function dbconn(){
    $pdo = new PDO('mysql:dbname=product;host=localhost','root','');

    return $pdo;
}

function getfrmdb(){
    $pdo = dbconn();
    $produits = $pdo ->query('SELECT * FROM produit') ->fetchall(PDO::FETCH_OBJ);
    return $produits;
}

function affiche_stagier(){
    $produits =  getfrmdb();
    require_once "view/index.php";
}

function add_prd() {

    if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) { // Ensure the file was uploaded
        // Read the uploaded image file as binary data
        $imageData = file_get_contents($_FILES['img']['tmp_name']);
        $type = $_POST['type'];
        $name = $_POST['name'];
        $prix = $_POST['prix'];
        $url = bin2hex(random_bytes(32));

        // Database connection
        $pdo = dbconn();

        // Prepare the SQL statement with the correct column names
        $sqlstate = $pdo->prepare("INSERT INTO produit (img, type, name, prix,url) VALUES (?, ?, ?, ?,?)");


        // Execute the statement with binary data for the image
        $sqlstate->execute([$imageData, $type, $name, $prix, $url]);

        echo "Product added successfully!";
    } else {
        echo "Error: No file uploaded or file upload error.";
    }
}

    function get_item($url){
        $conn = mysqli_connect("localhost","root","","product");
        $item = mysqli_query($conn,"SELECT FROM produit WHERE url = '$url' ");
        return $item;
    }


?>
