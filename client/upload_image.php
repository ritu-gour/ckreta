
<?php
session_start();
if (isset($_SESSION['adm_id'])) {
} else {
 
    header("location:../index.php");
}

$USER= $_SESSION['adm_id'];
$admin_usrnm= $_SESSION['admin_usrnm'];

?>
<?php
$conn = mysqli_connect('localhost','root','','newckreta');
if(!$conn){
    echo 'connection failed';
}
if(isset($_POST['submit'])){
    $img_place=$_POST['img_place'];
    $trip_id=$_POST['trip_id'];
   $query = mysqli_query($conn,"SELECT * FROM images WHERE trip_id='$trip_id'");
if(mysqli_num_rows($query)>0){
    echo '<script type="text/javascript">';
    
    echo 'alert("Trip Id Already Use");';
   
    echo '</script>';
    
}
else{

$imageCount = count($_FILES['image']['name']);
for($i=0;$i<$imageCount;$i++){
   $imageName = $_FILES['image']['name'][$i];
   $imageTempName=$_FILES['image']['tmp_name'][$i];
   $targetPath = "upload/".$imageName;

   if(move_uploaded_file($imageTempName,$targetPath)){
       $sql = "INSERT INTO images(image,trip_id,img_place) VALUES('$imageName','$trip_id','$img_place')";
       $result = mysqli_query($conn,$sql);
   }
}
if($result){
    header('location:upload_image.php?msg=ins');
}
}
}
?>

   
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="add.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<script src="script.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="icon" href="image/micro-technologies-logo-120x120.png" type="image/icon type" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/setting.css">
<link rel="stylesheet" href="../css/main.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&family=Raleway:wght@300;500&family=Red+Hat+Display:wght@300&family=Red+Hat+Text:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
<style>
        .formdesign{
            /* width: 50%; */
            margin: auto;
            padding: 20px 15px;
            background-color: white ;
            /* box-shadow: 5px 10px; */
        
    }
    </style>
<body>

    <?php include '../include/side.php' ?>
    <section id="container">
        <section id="main-content">
            <section class="wrapper">
            <div class="panel-body ">
   
   <div class="formdesign">


   <?php
    if(isset($_GET['msg']) AND $_GET['msg']=='ins'){
        echo '<h4 align=center>image uploaded sucessfully...!!</h4>';
    }
    
    ?>
       <form  id="regForm1" action="#" method="POST" enctype="multipart/form-data">
         
           <br><br>
          Trip ID
          <select style="font-size:18px;" class="form-select form-select-lg mb-3 " name="trip_id"
                                      aria-label=".form-select-lg example">
                                      <option>Select Id</option>
                                      <?php

                                      include('../conn/config.php');
                                      
                                          $query = "SELECT * FROM add_clients ";
                                          $rs_result = mysqli_query($conn, $query);
                                         if (mysqli_num_rows($rs_result) > 0) {
                                       
                                          while ($row = mysqli_fetch_assoc($rs_result)){
                                          
                                              ?>

                                      <option style="font-size:18px;" value="<?php echo $row['trip_id']?> 
                                      "><?php echo $row['trip_id']?></option>
                                      <?php 
                                          }
                                         }
                                      ?>
                                  </select>
           Place
           <input type="text" name="img_place"><br><br>
           <input type="file" name="image[]" multiple><br>
           <input style="background-color: #0498d4; color:white;" type="submit" name="submit" value="Upload">
       </form><br>
       
   </div> 
   </div>
            </div>

        </section>

    </section>

    <!--main content end-->
</section>
<?php include '../include/footer.php' ?>


