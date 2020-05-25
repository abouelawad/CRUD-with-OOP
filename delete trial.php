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
            <?php if($error !=''): ?>
            <h2 class="p-2 col text-center mt-5  alert alert-danger"> <?php echo $error; ?>  </h2>
            <?php endif; ?>

            <?php if($success !=''): ?>
            <h2 class="p-2 col text-center mt-5  alert alert-success"> <?php echo $success; ?>  </h2>
            <?php endif; ?>
        </div>        
    </div>
</div>


<?php }else{ ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="alert alert-danger mt-5 text-center"> Not Found </h3>
        </div>
    </div>
</div> 
    



	     
		<?php } ?> 



<?php include('footer.php'); ?>