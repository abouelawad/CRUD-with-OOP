<?php include('header.php'); ?>
<?php  $page_active = "home"; ?>
<?php include('nav.php'); ?>


<?php  $row = $db->delete("employees" , $_GET['id']);  ?>
<?php if (isset($_GET['id']) && is_numeric($_GET['id']) && $row) { ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="p-3 col text-center mt-5 text-white bg-success"> Delete Employee </h2>
        </div>



		<!-- Div actions -->
	    <div class="col-sm-12">
	        

	        
	        <h2 class="p-2 col text-center mt-5  alert alert-success"> <?php echo $row ; ?>  </h2>
	       
	    </div>
    </div>
</div>

	

<?php } ?>

<?php include('footer.php'); ?>