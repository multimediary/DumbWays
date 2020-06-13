<html>
	<head>
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
		<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
	</head>
	<body style="background-color:black">	
	<div class="container">
		<div class="row">
			<div class="col-md-12"><br></div>
			<div class="col-md-8"><h1><b><font style="color:white">Me-</font><font style="color:orange">dumb</font></b></h1></div>
			<div class="col-md-4">
				<label>
					<a class="btn btn-warning" href="4.php?p=add_berita">Add Berita</a> 
				</label>
				<label>
					<a class="btn btn-warning" href="4.php?p=add_user">Add User</a> 
				</label>
			</div>
			<div class="col-md-12"><br></div>
<!-- Tampilan View Berita -->			
<?php
$con = mysqli_connect("localhost","root","","me-dumb");
if(isset($_GET['p'])==""){
	$result = mysqli_query($con,"select * from news a
	left join user b on a.User_id=b.id order by a.create_time DESC");

	while($row = mysqli_fetch_array($result)) {  ?>  
	<div class="col-md-12" style="background-color:#373737; padding:5px;">	
		<div class="col-md-3">    
			<img src="<?php echo $row['image']."?".strtotime("now"); ?>" class="img-responsive" width="150px" alt="" style="padding:5px;">
		</div>
		<div class="col-md-9">
			<h1><b style="color:white"><?php echo $row['title']; ?></b></h1>
			<br>
			<font style="color:white">Author : <?php echo $row['name']; ?></font>
			<br>
			<p style="color:white; text-align:justify">
			<?php echo $row['deskripsi']; ?>
			</p>
			<p style="text-align:right;"><a class="btn btn-info" href="">Detail</a> </p>
		</div>
	</div>
	<div class="col-md-12"><br></div>
	<?php }
}
?>
<!-- End View Berita -->	

<!-- Start Add Berita -->	
<?php
if(isset($_GET['p'])=="add_berita"){ ?>
	<div class="col-md-12" style="background-color:#373737; padding:5px;">	
		<h1> Add Berita </h1>
		
		<form action="4.php?p=add_berita_action" method="post" enctype="multipart/form-data">
			 <div class="col-md-12">
				<div class="form-group">
					<label>	Judul Berita</label>
					<input type="text" class="form-control" name="title" placeholder="Judul Berita" required>
				</div>
				<div class="form-group">
					<label>	Gambar</label>
					<input type="file" class="form-control" name="image" required>
				</div>
				<div class="form-group">
					<label>	Deskripsi Berita</label>
					<textarea class="form-control" name="deskripsi" placeholder="Deskripsi Berita" required></textarea>
					<script>
                        CKEDITOR.replace( 'deskripsi' );
					</script>
				</div>
				<div class="form-group">
					<label>Author</label>
					<select name="User_id" class="form-control" required>
						<option value="">Pilih Author</option>	
<?php
	$result = mysqli_query($con,"select * from user order by name ASC");

	while($row = mysqli_fetch_array($result)) {   
			echo "<option value='$row[id]'>$row[name]</option>";
 } ?>
					<select>
				</div>
			</div>
			<div class="col-md-12"><br></div>
			<div class="col-md-6">
				<div class="form-group">
					<input type="submit" name="submit" onclick="return confirm('Apakah Yakin Menyimpan?');" value="Submit" class="btn btn-success">
				</div>
			</div>
		</form>
   </div>
<?php } ?>
<!-- End Add Berita -->	

<!-- Start Action Add Berita -->	
<?php
if(isset($_GET['p'])=="add_berita_action"){ 
	$target_dir = "";
	$type = explode(".",$_FILES['image']['name']);
	$new_name = time().".".end($type);
	$target_file = $target_dir . $new_name;
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	if(isset($_POST["submit"])) {
	  $check = getimagesize($_FILES["image"]["tmp_name"]);
	  if($check !== false) {
		$uploadOk = 1;
		move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
	  } else {
		echo "File is not an image.";
		$uploadOk = 0;
	  }
	}

	$image = $target_file;
	$create_time = date("Y-m-d H:i:s");
	if($uploadOk==1){
		mysqli_query($con,"INSERT INTO news 
		(title, image, deskripsi, create_time, User_id) 
		VALUES ('$_POST[title]', '$image', '$_POST[deskripsi]', '$create_time', '$_POST[User_id]')");
		header("Location: 4.php");
	} 
 
}?>
<!-- End Action Add Berita -->	

<!-- Start Add User -->	
<?php
if(isset($_GET['p'])=="add_user"){ ?>
	<div class="col-md-12" style="background-color:#373737; padding:5px;">	
		<h1> Add User </h1>
		
		<form action="4.php?p=add_user_action" method="post" enctype="multipart/form-data">
			 <div class="col-md-12">
				<div class="form-group">
					<label>	Nama User</label>
					<input type="text" class="form-control" name="name" placeholder="Nama User" required>
				</div>
				<div class="form-group">
					<label>	Email</label>
					<input type="email" class="form-control" name="email" placeholder="Email" required>
				</div>
			</div>
			<div class="col-md-12"><br></div>
			<div class="col-md-6">
				<div class="form-group">
					<input type="submit" name="submit" onclick="return confirm('Apakah Yakin Menyimpan?');" value="Submit" class="btn btn-success">
				</div>
			</div>
		</form>
   </div>
<?php } ?>
<!-- End Add User -->	

<!-- Start Action Add User -->	
<?php
if(isset($_GET['p'])=="add_user_action"){ 
	mysqli_query($con,"INSERT INTO user 
		(name, email) 
		VALUES ('$_POST[name]', '$_POST[email]')");
		header("Location: 4.php");
}?>
<!-- End Action Add User -->	
		</div>
	</div>
	</body>
</html>