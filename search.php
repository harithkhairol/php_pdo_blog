<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>Blog</h3>
            </div>
				<br>
  <div class="row">
	  <div class="col-md-9" name="maincontent" id="maincontent">
		  <!-- ***********Edit your content STARTS from here******** -->
		<h5>Simple Blog Search</h5>
		<br>
		<form name="formsearch" action="" method="GET" 
			class="form-inline" role="form" >
			  
			  <input class="form-control" name="staffname" 
			  type="text" placeholder="Article name...">
			  <input class="btn btn-success" 
			  type="submit" value="Search">

		</form>
            <div class="row">

              
                      <?php
					  
					  //capture textbox data
		if(isset($_GET['staffname'])){
			$key=$_GET['staffname'];
		}else{//tiada data dlm textbox
			$key=$_GET['staffname'];
		}
		

		
					   
                       $sql = 'SELECT postID, postTitle, postDesc, postDate from blog_posts where postTitle like :key; ';
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
                      ?>
                      </tbody>
                </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>