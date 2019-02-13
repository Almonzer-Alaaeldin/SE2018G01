<!DOCTYPE html>
<html lang="en">
 <?php include 'header.php';?>

<body>
<div class="jumbotron text-center" style="margin-bottom: 0; padding: 0px 0px 0px 0px; background-color: lavender">
      <div id="ImgSlide" class="carousel slide" data-ride="carousel">

      <ul class="carousel-indicators">
        <li data-target="#ImgSlide" data-slide-to="0"></li>
        <li data-target="#ImgSlide" data-slide-to="1" class="active"></li>
        <li data-target="#ImgSlide" data-slide-to="2"></li>
      </ul>

      <div class="carousel-inner">
        <div class="carousel-item">
          <img src="Dev1.jpg" alt="Devs" style="height: 400px; width: 100%; filter: blur(3px) contrast(0.5); ">
            <div class="carousel-caption">
            <h1 style="color: black;">Developers</h1>
            <p style="color: black;">Become a developer</p>
          </div>
        </div>
        <div class="carousel-item  active">
          <img src="office4.jpg" alt="Bussiness" style="height: 400px; width: 100%; filter: blur(2px) contrast(0.5);">
            <div class="carousel-caption">
            <h1 style="color: black;">Bussiness</h1>
            <p style="color: black;">Some bussiness</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="Enter1.jpg" alt="Enterpenurship" style="height: 400px; width: 100%; filter: blur(1px) contrast(0.5);">
            <div class="carousel-caption">
            <h1 style="color: black;">Enterpenurship</h1>
            <p style="color: black;">Kickstart your bussiness</p>
          </div>
        </div>
      </div>

      <a class="carousel-control-prev" href="#ImgSlide" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#ImgSlide" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>

    </div>
    </div>
  <?php include 'nav.php';?>




<div class="container">
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Create Account</h4>
	<p class="text-center">Get started with your free account</p>
	 <!-- <p> 
		<a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
		<a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
	</p>
	<p class="divider-text">
        <span class="bg-light">OR</span>
    </p>-->
	<form action="processing_form.php" class="row" method="POST">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="Name" class="form-control" placeholder="Full name" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-globe"></i> </span>
		 </div>
     <input name="Country" class="form-control" placeholder="Country" type="text">
 </div> <!-- form-group// -->
 <div class="form-group input-group">
  <div class="input-group-prepend">
    <span class="input-group-text"> <i class="fa fa-child"></i> </span>
 </div>
 <input name="Age" class="form-control" placeholder="Age" type="number" min="12" max="70">
</div> <!-- form-group// -->
<div class="form-group input-group">
 <div class="input-group-prepend">
   <span class="input-group-text"> <i class="fa fa-info"></i> </span>
</div>
<textarea name="Experience" rows="3" cols="42" >
Your Experience!
</textarea>
</div> <!-- form-group// -->
<!--<div class="form-group input-group">
 <div class="input-group-prepend">
   <span class="input-group-text"> <i class="fa fa-graduation-cap"></i> </span>
</div>
<input name="Experience" class="form-control" placeholder="Years of Experience" type="number" min="1" max="15">
</div>  -->
<div class="form-group input-group">
 <div class="input-group-prepend">
   <span class="input-group-text"> <i class="fa fa-info"></i> </span>
</div>
<textarea name="Expertise" rows="3" cols="42" >
Fields of Expertise !
</textarea>
</div> <!-- form-group// -->
<div class="form-group input-group">
 <div class="input-group-prepend">
   <span class="input-group-text"> <i class="	fa fa-info-circle"></i> </span>
</div>
<textarea name="Skills" rows="3" cols="40">
Skills !
</textarea>
</div> <!-- form-group// -->
<div class="form-group input-group row">
 <div class="input-group-prepend">
   <span class="input-group-text"> <i class="		fa fa-language" title="Programming languages"></i> </span>
</div>
<div class="col">
<input type="checkbox" name="ProgLang[]" value="c++">C++<br>
<input type="checkbox" name="ProgLang[]" value="c#">C#<br>
<input type="checkbox" name="ProgLang[]" value="c">C<br>
<input type="checkbox" name="ProgLang[]" value="python">Python<br>
<input type="checkbox" name="ProgLang[]" value="java">Java<br>
</div>
<div class="col">
<input type="checkbox" name="ProgLang[]" value="js">JavaScript<br>
<input type="checkbox" name="ProgLang[]" value="sql">SQL<br>
<input type="checkbox" name="ProgLang[]" value="perl">Perl<br>
<input type="checkbox" name="ProgLang[]" value="ruby">Ruby<br>
<input type="checkbox" name="ProgLang[]" value="kotlin">Kotlin<br>
</div>
</div> <!-- form-group// -->
<div class="form-group input-group">
 <div class="input-group-prepend">
   <span class="input-group-text"> <i class="fa fa-clock"></i> </span>
</div>
<input name="WorkingHours" class="form-control" placeholder="Working Hours" type="number" min="1" max="16">
</div> <!-- form-group// -->
<div class="form-group input-group">
 <div class="input-group-prepend">
   <span class="input-group-text"> <i class="	fas fa-dollar-sign"></i> </span>
</div>
<input name="Payment" class="form-control" placeholder="Payment per hour" type="number" min=10>
</div> <!-- form-group// -->
<div class="form-group input-group">
<div class="input-group-prepend">
<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
</div>
        <input name="Email" class="form-control" placeholder="Email address" type="email">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		<select name="phOption" class="custom-select" style="max-width: 120px;">
		    <option selected="">+20</option>
		    <option value="1">+972</option>
		    <option value="2">+198</option>
		    <option value="3">+701</option>
		</select>
    	<input name="Phone" class="form-control" placeholder="Phone number" type="text">
    </div> <!-- form-group// -->

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="password" class="form-control" placeholder="Create password" type="password">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="Repeatpassword" class="form-control" placeholder="Repeat password" type="password">
    </div> <!-- form-group// -->
    <div class="form-group">
        <button name="form_submitted" type="submit" class="btn btn-primary btn-block"> Create Account  </button>
    </div> <!-- form-group// -->
    <p class="text-center">Have an account? <a href="">Log In</a> </p>
</form>
</article>
</div> <!-- card.// -->

</div>
<!--container end.//-->
<?php include 'footer.php';?>


</body>
</html>
