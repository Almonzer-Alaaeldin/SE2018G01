<!DOCTYPE html>
<html lang="en">
<?php include 'header.php';?>
<head>
    <link rel="stylesheet" href="styles1.css">
</head>
<!------ Include the above in your HEAD tag ---------->
<body>
    <?php include 'nav.php';?>
    
    <!------ Include the above in your HEAD tag ---------->
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
    ?>
    <?php
    $sql="SELECT DISTINCT * FROM accounts JOIN developers ON (developers.account_id='9' and accounts.id='9');" ;
    $state=$db->prepare($sql);
    $state->execute();
    $row=$state->fetch(PDO::FETCH_ASSOC);
    ?>

    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5><?=$row['name'] ?>
                        </h5> 
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
                    <button class="button edit"  >Edit</button>
                    <button class="button delete" >Delete</button>


                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>SKILLS</p>
                        <?=$row['skills'] ?>
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
                                    <p><?=$row['name'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Age</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?=$row['age'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Country</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?=$row['country'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?=$row['email'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?=$row['phone'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Profession</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?=$row['type'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Experience</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?=$row['years_of_exp'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Hourly Rate</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?=$row['payment'] ?>$/hr</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Working Hours</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?=$row['working_hrs'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Fields of Expertise</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?=$row['field'] ?></p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </form>           
    </div>
    <?php include 'footer.php';?>
    
</body>
</html>
