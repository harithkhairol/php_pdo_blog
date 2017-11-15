<?php require('includes/config.php'); ?>
<!DOCTYPE html>


<html lang="en">



<head>
    <meta charset="utf-8">
    <title>Harith Blog</title>
	
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

</head>
<body>

	<div id="wrapper">

	


		<nav class="navbar navbar-expand-lg navbar-light bg-dark">
		

		
  <a class="navbar-brand" href="#" style="color:red"><img src="batman.png" alt="logo">
  
      HARITH BLOG</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#" style="color:red">Home <span class="sr-only">(current)</span></a>
      </li>

	   <li class="nav-item">
        <a href="#" class="nav-link" href="#" style="color:red">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:red">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#" style="color:red">Action</a>
          <a class="dropdown-item" href="#" style="color:red">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" style="color:red">Something else here</a>
        </div>
      </li>

    </ul>
    
	
	
	<form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" name="staffname" type="text" placeholder="Search" aria-label="Search" role="form" >
	  	
      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" value="Search">Search</button>
    </form>
	</style>
	
		
			  

	
  </div>
</nav>

		<hr />

		<?php 
		
					  
					  //capture textbox data
		if(isset($_GET['staffname'])){
			$key=$_GET['staffname'];
			$sql = 'SELECT postID, postTitle, postDesc, postDate from blog_posts where postTitle like :key; ORDER BY postID DESC';
					   $q=$db->prepare($sql);
                       $q->bindValue(':key','%'.$key.'%');
                       $q->execute();


                      while ($row=$q->fetch(PDO::FETCH_ASSOC)) {

                                echo '<div>';
						echo '<h1><a href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></h1>';
						echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).'</p>';
						echo '<p>'.$row['postDesc'].'</p>';				
						echo '<p><a href="viewpost.php?id='.$row['postID'].'">Read More</a></p>';				
					echo '</div>';
                       }
			
		}else{//tiada data dlm textbox
			
			try {

				$stmt = $db->query('SELECT postID, postTitle, postDesc, postDate FROM blog_posts ORDER BY postID DESC');
				while($row = $stmt->fetch()){
					
					echo '<div>';
						echo '<h1><a href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></h1>';
						echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).'</p>';
						echo '<p>'.$row['postDesc'].'</p>';				
						echo '<p><a href="viewpost.php?id='.$row['postID'].'">Read More</a></p>';				
					echo '</div>';

				}

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}
		}
		

		
					   
                       
			
		?>

	</div>


</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</html>