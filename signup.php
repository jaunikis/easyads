<!-- Login -->
      <section class="login">
         <div class="container">
            <div class="row">
               <div class="col-sm-4 col-sm-offset-4">
                  <div class="login-panel widget">
                     <div class="login-body">
                        <form action="/easyads/signup2.php" method="post" onsubmit="return validateForm()">
                           <div id="email" class="form-group">
                              <input type="text" name="email" onkeyup="check_email(this.value)" placeholder="Email Address" class="form-control">
							<span id="email2" class=""></span>
						   </div>
						   <div id="email33" onclick="test(this.value)"></div>
                           <div id="p1" class="form-group">
                              <input pattern=".{3,}" onkeyup="check_password1()" id="password1" type="password" name="password1" placeholder="Password" class="form-control" required>
							  <span id="p11" class=""></span>
                           </div>
                           <div id="p2" class="form-group">
                              <input pattern=".{3,}" onkeyup="check_password2()" id="password2"type="password" name="password2" placeholder="Confirm Password" class="form-control" required>
							  <span id="p22" class=""></span>
                           </div>
						   <div id="name" class="form-group">
                              <input type="text" name="name" onkeyup="check_name(this.value)" placeholder="Name" class="form-control">
							<span id="name2" class=""></span>
						   </div>
                           <div class="form-group">
                              <button class="btn btn-block btn-lg btn-primary">Sign Up</button>
                           </div>
                        
                     </div>
                     <div class="login-footer">
                        <div class="checkbox checkbox-primary pull-left">
                           <input id="checkbox2" name="terms" type="checkbox" required>
                           <label for="checkbox2">
                           I Agree with Terms and Conditions
                           </label>
                        </div>
						</form>
                     </div>
                  </div>
                  <p class="text-center"><a href="/easyads/login"><strong>Have an account? </strong></a></p>
               </div>
            </div>
         </div>
      </section>
      <!-- End Login -->
	  
<script>
	function check_name(name){
		if(name.length>1){
			document.getElementById("name").className = "form-group has-success has-feedback";
			document.getElementById("name2").className = "glyphicon glyphicon-ok form-control-feedback";
		}else{
			document.getElementById("name").className = "form-group";
			document.getElementById("name2").className = "";
		}
	}
	function validateForm() {
    var email = document.getElementById("email").className;
	var p1=document.getElementById("p1").className;
	var p2=document.getElementById("p2").className;
	//alert (p1);
    if (email !=="form-group has-success has-feedback") {
        alert("Email address must be filled.");
		return false 
    }
	if(p1!=="form-group has-success has-feedback"){
		alert("Password must be minimum 6 length.");
		return false 
	}
}
	function check_password1(){
		var p1=document.getElementById("password1").value;
		var p2=document.getElementById("password2").value;
		if(p1.length>=6){
			document.getElementById("p1").className = "form-group has-success has-feedback";
			document.getElementById("p11").className = "glyphicon glyphicon-ok form-control-feedback";
		}else{
		document.getElementById("p1").className = "form-group";
		document.getElementById("p11").className = "";
		if(p2.value!==''){check_password2();}
		}
	}
	function check_password2(){
		var p1=document.getElementById("password1").value;
		var p2=document.getElementById("password2").value;
		if(p1.length>=6 && p1==p2){
			document.getElementById("p2").className = "form-group has-success has-feedback";
			document.getElementById("p22").className = "glyphicon glyphicon-ok form-control-feedback";
		}else{
		document.getElementById("p2").className = "form-group";
		document.getElementById("p22").className = "";
		}
	}
	function check_email(email){
		//alert('ok');
		// Create our XMLHttpRequest object
		var hr = new XMLHttpRequest();
		// Create some variables we need to send to our PHP file
		var url = "/easyads/check_email.php";
		var vars = "email="+email;
		hr.open("POST", url, true);
		hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		// Access the onreadystatechange event for the XMLHttpRequest object
		hr.onreadystatechange = function() {
			//alert(hr);

			if(hr.readyState == 4 && hr.status == 200) {
				var return_data = hr.responseText;
				
				if(return_data=="ok" && email.indexOf("@")>1){
					document.getElementById("email").className = "form-group has-success has-feedback";
					document.getElementById("email2").className = "glyphicon glyphicon-ok form-control-feedback";
					}else{
						if(return_data=="uzimtas"){
							document.getElementById("email").className = "form-group has-error has-feedback";
							document.getElementById("email2").className = "glyphicon glyphicon-remove form-control-feedback";
							document.getElementById("email33").innerHTML = '<div class="alert alert-warning"><strong>Email address exists!</strong> Please <a href="/easyads/login">login.</a><br>If you forget the password press <a href="/easyads/forget">here.</a></div>';
							}else{
								document.getElementById("email").className = "form-group";
								document.getElementById("email2").className = "";
								document.getElementById("email33").innerHTML = '';
							}
					}
			}
		}
		// Send the data to PHP now... and wait for response to update the status div
		hr.send(vars); // Actually execute the request
		//document.getElementById("email33").innerHTML = "processing...";
		}
	
</script>