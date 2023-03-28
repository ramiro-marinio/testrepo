


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_POST['submit'])){
    $con = new mysqli('127.0.0.1','admin','Independencia121','victimas');
    if($con->connect_error){
        die('Connection Failed: ' . $con->connect_error);
        echo 'fail';
    }
    $sanname = filter_input(INPUT_POST,'nombre',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $col = $_POST['colfav'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $sql = "INSERT INTO victima (Nombre,Color,Ip) VALUES  ('$sanname','$col','$ip')";
    $query = mysqli_query($con,$sql);
    if($query){
        header('Location:success.html');
    }
    else{
        echo "error:" . mysqli_error($con);
    }
}
?>





    <h1 align="center" class="rainbowanim">Formulario para saber cual es el color más fachero</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="Nombre">Nombre:</label>
        <input type="text" required name="nombre">
        <label for="Color">Color Favorito:</label>
        <input type="color" required name="colfav">

        <input type="submit" value="Mandar form" name="submit">
    </form>
</body>
</html>