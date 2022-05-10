<?php

if (!isset($_SESSION['can302'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
elseif (isset($_POST['update'])) {
    $p_cat_name = $_POST['p_cat_name'];
    $p_cat_amount = $_POST['p_cat_amount'];
    $update_p_cat = "update product_category set amount='$p_cat_amount' where name='$p_cat_name'";
    $run_p_cat = mysqli_query($con,$update_p_cat);
    if ($run_p_cat) {
        echo "<script>alert('Product Category has been Updated.')</script>";
        echo "<script>window.open('index.php?category=view','_self')</script>";
    }
}
elseif (!isset($_GET['name'])) {
        echo "<script>alert('Product Category name is misssing.')</script>";
        echo "<script>window.open('index.php?view_p_cats','_self')</script>";
}
else{
    $edit_p_cat_name = $_GET['name'];
    $edit_p_cat_query = "select * from product_category where name='$edit_p_cat_name'";
    $run_edit = mysqli_query($con,$edit_p_cat_query);
    $row_edit = mysqli_fetch_array($run_edit);
    $p_cat_name = $row_edit['name'];
    $p_cat_amount = $row_edit['amount'];

?>

<div class="row"><!-- row begin -->
	<div class="col-lg-12"><!-- col-lg-12 begin -->	
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-tasks"></i> Product Categories
			</li>
			<li>Edit Product Category</li>
		</ol>
	</div><!-- col-lg-12 finish -->
</div><!-- row finish -->
<div class="row"><!-- row begin -->	
	<div class="col-lg-12"><!-- col-lg-12 begin -->		
		<div class="panel panel-default"><!-- panel panel-default begin -->			
			<div class="panel-heading"><!-- panel-heading begin -->				
				<h3 class="panel-title">					
					<i class="fa fa-pencil fa-fw"></i> Edit Product Category
				</h3>
			</div><!-- panel-heading finish -->
			<div class="panel-body"><!-- panel-body begin -->				
				<form method="post" class="form-horizontal">					
					<div class="form-group"><!-- form-group begin -->						
						<label class="control-label col-md-3"> amount </label>
						<div class="col-md-6"><!-- col-md-6 begin -->							
							<input name="p_cat_amount" type="text" class="form-control" value="<?php echo $p_cat_amount; ?>">
						</div><!-- col-md-6 finish -->
					</div><!-- form-group finish -->
					<div class="form-group"><!-- form-group begin -->						
						<label class="control-label col-md-3"> </label>
						<div class="col-md-6"><!-- col-md-6 begin -->
							<input type="submit" name="update" class="form-control btn btn-primary" value="Update">
							<input type="hnameden" name="p_cat_name" class="form-control" value="<?php echo $p_cat_name; ?>" >
						</div><!-- col-md-6 finish -->
					</div><!-- form-group finish -->
				</form>
			</div><!-- panel-body finish -->
		</div><!-- panel panel-default finish -->
	</div><!-- col-lg-12 finish -->
</div><!-- row finish -->

<?php 

?>

<?php } ?>