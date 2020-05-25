<?php include('header.php'); ?>
<?php  $page_active = "home"; ?>
<?php include('nav.php'); ?>

<?php  $row = $db->find("employees" , $_GET['id']); ?>

<?php if (isset($_GET['id']) && is_numeric($_GET['id']) && $row) { ?>

	<?php 

		
		$error = "";
		$departments = array('it','cs', 'com');
		$success = "";

		if(isset($_POST['submit']))
	    {
	    	$name       = filter_var($_POST['name'],
	    	 	FILTER_SANITIZE_STRING);

	        $email      = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);

	        $department = filter_var($_POST['department'],FILTER_SANITIZE_STRING);

	       

	        if(empty($name) or empty($email) or empty($department) )
	        {
	            $error = "Please Fill All Fields";
	        }
	        else
	        {
	        	if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
	        	{
	        		$department = strtolower($department);
	        		if(in_array($department, $departments))
	        		{
	        			if (!empty($password))
	        			{
	        				$password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);

	        				 if (strlen($password)>=6) 
		        			{

		        				$Password = $db->inc_password($password); // encrypt password;

		        			}
		        			else
		        			{
		 	    				$error = "Password Must be Grater Than 6 chars !";
		        			}

	        			}
	        			else
	        			{
	        				$password = $row['password']; 

	        			}

	        			  	$sql = "UPDATE employees SET `name`='$name',`email`='$email',`department`='$department',
			               		 `password`='$password' WHERE `id`='$row[id]' ";
               			 	$success = $db->update($sql);
			            

	        		}
	        		else
	        		{
	        			$error = "This Department Not Found ";
	        		}
	        	}
	        	else
	        	{
	        		 $error = "Please Type Valid Email";
	        	}
	        }
	    }
	?>

				
	


			
					


  



	<!-- div container -->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="p-3 col text-center mt-5 text-white bg-success">  Edit Employee </h2>
        </div>
	   					

				
	        	<!-- Div actions -->
		        <div class="col-sm-12">
		            <?php if($error !=''): ?>
		            <h2 class="p-2 col text-center mt-5  alert alert-danger"> <?php echo $error; ?>  </h2>
		            <?php endif; ?>

		            <?php if($success !=''): ?>
		            <h2 class="p-2 col text-center mt-5  alert alert-success"> <?php echo $success; ?>  </h2>
		            <?php endif; ?>
		        </div>

		        <!-- DIV form -->
			    <div class="col-sm-12">

			    	<!-- Form to redirect in -->
			        <form method="post" action="<?php  $_SERVER['PHP_SELF']; ?>">


					  <div class="form-group">

					  	<!-- Name -->
					    <label for="name">Name</label>
					    <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" id="name"  placeholder="Enter Name">
					  </div>

					  <!-- Department -->
					 <div class="form-group">
					    <label for="department">Department</label>
					    <input type="text" name="department"  value="<?php echo $row['department']; ?>" class="form-control" id="department"  placeholder="Enter Department">
					  </div>

					  <!-- Email -->
					  <div class="form-group">
			            <label for="exampleInputEmail1">Email address</label>
			            <input type="text" name="email"  value="<?php echo $row['email']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
			            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			          </div>

		          <!-- Password -->
		           <div class="form-group">
		            <label for="exampleInputPassword1">Password</label>
		            <input type="password" name="password"  class="form-control" id="exampleInputPassword1" placeholder="Password">
		           </div>

				    <!-- Submit -->
				   	<button type="submit" name="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>

		</div>
	</div>

	<?php }else{?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="alert alert-danger mt-5 text-center"> Not Found </h3>
        </div>
    </div>
</div> 
    



	     
		<?php } ?> 


<?php include('footer.php'); ?>