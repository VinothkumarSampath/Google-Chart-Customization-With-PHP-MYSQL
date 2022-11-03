<?php
include("includes/config.php");
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
<?php 
$login_err = ""; 


	if(isset($_POST["applnwithclass"])){
		
		 // Allowed mime types
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );
 
		$filename=$_FILES["file"]["name"];		
		 if($_FILES["file"]["size"] > 0)
		 {
			 // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
 //echo $filename; exit;
            // Skip the first line
            fgetcsv($csvFile);
			
		  	//$file = fopen($filename, "r");
	        while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
	         {
				// Get row data
                $classno = $getData[0];
                $applications = $getData[1];
				 
				
	            $sql = "INSERT into applicationwithclass(classno,applications) 
					values('".$getData[0]."','".$getData[1]."')";
                   $result = mysqli_query($link,$sql);
			
				if(!isset($result))
				{
				
				 $login_err = "Invalid File:Please Upload CSV File.";
				 
				}
				else {
				 
				 $login_err = "CSV File has been successfully Imported.";
				}
	         }
	        // fclose($file);	
		 }
	}

if(isset($_POST["delete"])){
	  
	  $sql = "TRUNCATE TABLE applicationwithclass";
                   $result = mysqli_query($link,$sql);
			
				if(!isset($result))
				{
				
				 $login_err = "OOPS. Error.";
				 
				}
				else {
				 
				 $login_err = "Records deleted successfully.";
				}
}	
?>
<?php 

	if(isset($_POST["Attorney"])){
		
		 // Allowed mime types
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );
 
		$filename=$_FILES["file"]["name"];		
		 if($_FILES["file"]["size"] > 0)
		 {
			 // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
 //echo $filename; exit;
            // Skip the first line
            fgetcsv($csvFile);
			
		  	//$file = fopen($filename, "r");
	        while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
	         {
				// Get row data
                $classno = $getData[0];
                $applications = $getData[1];
				
	           $sql = "INSERT into attoneyinvolved(antonyinvolved,applications) 
					values('".$getData[0]."','".$getData[1]."')";
                   $result = mysqli_query($link,$sql);
				if(!isset($result))
				{
				
				 $login_err = "Invalid File:Please Upload CSV File.";
				 
				}
				else {
				 
				 $login_err = "CSV File has been successfully Imported.";
				}
	         }
	        // fclose($file);	
		 }
	}
if(isset($_POST["deleteAttorney"])){
	  
	  $sql = "TRUNCATE TABLE attoneyinvolved";
                   $result = mysqli_query($link,$sql);
			
				if(!isset($result))
				{
				
				 $login_err = "OOPS. Error.";
				 
				}
				else {
				 
				 $login_err = "Records deleted successfully.";
				}
}		
?>
<?php 

	if(isset($_POST["Status"])){
		
		 // Allowed mime types
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );
 
		$filename=$_FILES["file"]["name"];		
		 if($_FILES["file"]["size"] > 0)
		 {
			 // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
 //echo $filename; exit;
            // Skip the first line
            fgetcsv($csvFile);
			
		  	//$file = fopen($filename, "r");
	        while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
	         {
				// Get row data
                $classno = $getData[0];
                $applications = $getData[1];
				
	           $sql = "INSERT into applnstatus(applnstatus,noofappln) 
					values('".$getData[0]."','".$getData[1]."')";
                   $result = mysqli_query($link,$sql);
				if(!isset($result))
				{
				
				 $login_err = "Invalid File:Please Upload CSV File.";
				 
				}
				else {
				 
				 $login_err = "CSV File has been successfully Imported.";
				}
	         }
	        // fclose($file);	
		 }
	}
if(isset($_POST["deleteStatus"])){
	  
	  $sql = "TRUNCATE TABLE applnstatus";
                   $result = mysqli_query($link,$sql);
			
				if(!isset($result))
				{
				
				 $login_err = "OOPS. Error.";
				 
				}
				else {
				 
				 $login_err = "Records deleted successfully.";
				}
}		
?>

<?php 

	if(isset($_POST["Renewals"])){
		
		 // Allowed mime types
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );
 
		$filename=$_FILES["file"]["name"];		
		 if($_FILES["file"]["size"] > 0)
		 {
			 // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
 //echo $filename; exit;
            // Skip the first line
            fgetcsv($csvFile);
			
		  	//$file = fopen($filename, "r");
	        while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
	         {
				// Get row data
                $ryear = $getData[0];
                $rfirst = $getData[1];
				$rsecond = $getData[2];
				
	           $sql = "INSERT into renewals(ryear,rfirst,rsecond) 
					values('".$getData[0]."','".$getData[1]."','".$getData[2]."')";
					
					//echo $sql; 
                   $result = mysqli_query($link,$sql);
				if(!isset($result))
				{
				
				 $login_err = "Invalid File:Please Upload CSV File.";
				 
				}
				else {
				 
				 $login_err = "CSV File has been successfully Imported.";
				}
	         }
			 //exit;
	        // fclose($file);	
		 }
	}
if(isset($_POST["deleteRenewals"])){
	  
	  $sql = "TRUNCATE TABLE renewals";
                   $result = mysqli_query($link,$sql);
			
				if(!isset($result))
				{
				
				 $login_err = "OOPS. Error.";
				 
				}
				else {
				 
				 $login_err = "Records deleted successfully.";
				}
}		
?>
<?php include("includes/header.php"); ?>
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>
                                <div class="nk-block">
                                    <div class="row g-gs">
                                        <div class="col-xxl-3 col-sm-6">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">No of applications with Attorney</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <form method='POST' action="#" enctype='multipart/form-data'>
			<label>Select File: </label><input type='file' name='file' /><br><br>
			<input style="width:30%" type='submit' name='Attorney' value='Upload File' class="btn btn-lg btn-primary btn-block"/>
			<a href="../attoneyinvolved.php" style="width:30%" class="btn btn-lg btn-info btn-block">View</a>
			<input style="width:30%" type='submit' name='deleteAttorney' value='Delete Records' class="btn btn-lg btn-danger btn-block"/>
			
</form>
                                                                
                                                            </div>
                                                         
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-xxl-3 col-sm-6">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Applications with Class details</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                
                                                                 <form method='POST' action="#" enctype='multipart/form-data'>
			<label>Select File: </label><input type='file' name='file' /><br><br>
			<input type='submit' style="width:30%" name='applnwithclass' value='Upload File' class="btn btn-lg btn-primary btn-block"/>
			
			<a href="../applicationwithclass.php" style="width:30%" class="btn btn-lg btn-info btn-block">View</a>
			<input style="width:30%" type='submit' name='delete' value='Delete Records' class="btn btn-lg btn-danger btn-block"/>
</form>
                                                            </div>
                                                         
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col --><div class="col-xxl-3 col-sm-6">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Upcoming Renewals</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <form method='POST' action="#" enctype='multipart/form-data'>
			<label>Select File: </label><input type='file' name='file' /><br><br>
			<input style="width:30%" type='submit' name='Renewals' value='Upload File' class="btn btn-lg btn-primary btn-block"/>
			<a href="../renewals.php" style="width:30%" class="btn btn-lg btn-info btn-block">View</a>
			<input style="width:30%" type='submit' name='deleteRenewals' value='Delete Records' class="btn btn-lg btn-danger btn-block"/>
			
</form>
                                                                
                                                            </div>
                                                         
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col --><div class="col-xxl-3 col-sm-6">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Application Status</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                 <form method='POST' action="#" enctype='multipart/form-data'>
			<label>Select File: </label><input type='file' name='file' /><br><br>
			
			<input style="width:30%" type='submit' name='Status' value='Upload File' class="btn btn-lg btn-primary btn-block"/>
			<a href="../applnstatus.php" style="width:30%" class="btn btn-lg btn-info btn-block">View</a>
			<input style="width:30%" type='submit' name='deleteStatus' value='Delete Records' class="btn btn-lg btn-danger btn-block"/>
			
</form>
                                                               
                                                            </div>
                                                         
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                       
                                    </div><!-- .row -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
   <?php include("includes/footer.php"); ?>             