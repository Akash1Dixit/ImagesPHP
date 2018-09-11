<?php 
 $define['host_name']="localhost";
 $define['user_name']="root";
 $define['host_pass']="";
 $define['db_name']="Image_upload";

 foreach($define as $key =>$value){
 	define(strtoupper($key), $value);
 }
  $connection = mysqli_connect(HOST_NAME,USER_NAME,HOST_PASS,DB_NAME);
      
      if(isset($_POST['submit_btn'])){
      	$authorName=$_POST['authorName'];
      	$imageFile=$_FILES['imageFile']['name'];
      	$imageTmpName= $_FILES['imageFile']['tmp_name'];

      	$directoryToStore = "images/".$imageFile;

      	$result = move_uploaded_file($imageTmpName, $directoryToStore);
      	if($result==true){
      		$query = "INSERT INTO images(author,image_name) ";
      		$query .= "VALUES('".$authorName."','".$directoryToStore."') ";
      		$re= mysqli_query($connection,$query);
       	}else {
       		echo "failed";
       	}

      }

 ?>

 <?php 
         if(isset($_POST['submitBtn'])){

         	$query="SELECT * FROM images ";
         	$Ree=mysqli_query($connection,$query);
         	while($row = mysqli_fetch_assoc($Ree)){
               $post_image=  $row['image_name'];
               ?>
               <img src="<?php echo $post_image; ?>" height="100" width="100" /> 



          <?php      
                
         	}  
         }

  ?>
 

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data" >
		<div class="container" style="margin-top: 100px;">
	 <div class="row justify-content-center">
	 	<div class="col-md-6">
	 		<div class="form-group">
	 			<label for="">Image</label>
	 			<input type="file" class="form-control" name="imageFile" />
	 		</div>
	 	</div>
	 </div>
	 <div class="row justify-content-center">
	 	<div class="col-md-6">
	 		<div class="form-group">
	 			<label for="">Author Name</label>
	 			<input type="text" class="form-control" name="authorName" />
	 		</div>
	 	</div>
	 </div>
	 <div class="row justify-content-center">
	 	<div class="col-md-6">
	 		<div class="form-group">
	 			<input type="submit" class="btn btn-success" name="submit_btn" />
	 		</div>
	 	</div>
	 </div>
	 <div class="row justify-content-center">
	 	<div class="col-md-6">
	 		<div class="form-group">
	 			<input type="submit" class="btn btn-outline-primary" name="submitBtn"  />
	 		</div>
	 	</div>
	 </div>
	 
	</div>
    </form>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"  crossorigin="anonymous"></script>
</body>


</html>