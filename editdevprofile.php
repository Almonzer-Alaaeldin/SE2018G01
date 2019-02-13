
<!DOCTYPE html>
<html lang="en">
<?php include 'header.php';?>
<head>
    <link rel="stylesheet" href="styles1.css">
</head>
<!------ Include the above in your HEAD tag ---------->
<body>
<?php include 'nav.php';?>

<?php
	
	$driver = 'mysql';
    $database = "dbname=service_web_database";  
    $dsn = "$driver:host=localhost;$database";  
    try {
        $db = new PDO($dsn, "islam", "1234");  
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       // echo "Connected successfully";
    } 
    catch(PDOException $e){
        echo "Connection failed: " .$e->getMessage(); 
    }
    $sql="SELECT DISTINCT * FROM accounts JOIN developers ON (developers.account_id='9' and accounts.id='9');" ;
	 //number 9 is the "$account_id" which will come from the login
    $state=$db->prepare($sql);
    $state->execute();
    $row=$state->fetch(PDO::FETCH_ASSOC);
	
?>
    <h2 class="mt-4"><?="Edit"?> Developer Profile</h2>
    <form action="saveedit.php" method="post">
    	<div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="profile-head">
                        <input class="form-control" type="text" name="name" value="<?=$row['name'] ?>" required>
                        
                        <h6>
                            Developer and Designer
                        </h6>
                         <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                         <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                            </li>
                        </ul>


                    </div>
                </div>
                <div class="col-md-2">
                    <button class="button float-right" type="submit" value="Edit Profile"> Edit </button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>SKILLS</p>
                        <input class="form-control" type="text" name="skills" value="<?=$row['skills'] ?>" required>
                    </div>
               
		    <div class="profile-work">
                        <p>Programming Lang</p>
                        <input class="form-control" type="text" name="programming_languages" value="<?=$row['programming_languages'] ?>" required>
                    </div>
		</div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p><input class="form-control" type="text" name="name" value="<?=$row['name'] ?>" required></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Age</label>
                                </div>
                                <div class="col-md-6">
                                    <p><input class="form-control" type="text" name="age" value="<?=$row['age'] ?>" required></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Country</label>
                                </div>
                                <div class="col-md-6">
                                    <p><input class="form-control" type="text" name="country" value="<?=$row['country'] ?>" required></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p><input class="form-control" type="text" name="email" value="<?=$row['email'] ?>" required></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p><input class="form-control" type="text" name="phone" value="<?=$row['phone'] ?>" required></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Profession</label>
                                </div>
                                <div class="col-md-6">
                                    <p><input class="form-control" type="text" name="type" value="<?=$row['type'] ?>" required></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Experience</label>
                                </div>
                                <div class="col-md-6">
                                    <p><input class="form-control" type="text" name="years_of_exp" value="<?=$row['years_of_exp'] ?>" required></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Hourly Rate</label>
                                </div>
                                <div class="col-md-6">
                                    <p><input class="form-control" type="text" name="payment" value="<?=$row['payment'] ?>" required></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Working Hours</label>
                                </div>
                                <div class="col-md-6">
                                    <p><input class="form-control" type="text" name="working_hrs" value="<?=$row['working_hrs'] ?>" required></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Fields of Expertise</label>
                                </div>
                                <div class="col-md-6">
                                    <p><input class="form-control" type="text" name="field" value="<?=$row['field'] ?>" required></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>





        </form>
    </div>
</form>
<?php include 'footer.php';?>
</body>
</html>

