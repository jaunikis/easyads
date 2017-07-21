<div class="col-sm-9">
                  <div class="widget my-profile">
                     <div class="widget-header">
                        <h1>My Account</h1>
                     </div>
                     <div class="widget-body">
                        <form action="/easyads/my_details2.php" method="post" class="row">
                           <div class="form-group">
                              <label class="col-sm-3 control-label">Username (Email) <span class="required">*</span></label>
                              <div class="col-sm-9">
                                 <input id="email" name="email" class="form-control border-form" type="text" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];}?>" placeholder="John Doe" disabled="">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-sm-3 control-label">First Name <span class="required">*</span></label>
                              <div class="col-sm-9">
                                 <input name="name" class="form-control border-form" type="text" value="<?php if(isset($_SESSION['user'])){echo $_SESSION['user'];}?>" placeholder="Enter First Name">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-sm-3 control-label">Phone Number </label>
                              <div class="col-sm-9">
                                 <div class="input-group">
                                    <input name="phone" type="text" class="form-control border-form" value="<?php if(isset($_SESSION['phone'])){echo $_SESSION['phone'];}?>" required="required" placeholder="e.g. 123456789">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
						   
                              <label class="col-sm-3 control-label">Location </label>
                              <div class="col-sm-9">
                                 <select name="location" class="form-control border-form">
                           
						   <option>All Locations</option>'
            <?php
				for($i=0;$i<count($locations);$i++){
					if(isset($_SESSION['location'])){if($locations[$i]==$_SESSION['location']){
						echo '<option selected="">'.$locations[$i].'</option>';
					}else{
						echo '<option>'.$locations[$i].'</option>';
					}
				}
				}
            ?>
                        </select>
								 
                              </div>
                           </div>
                           <div class="form-group" style="display:none;">
                              <label  class="col-sm-3 control-label">Image</label>
                              <div class="col-sm-9">
                                 <input id="inputFile" type="file" onchange="avatar(this)" class="filestyle55" accept="image/jpeg, image/png" />
                                 <span class="help-block"></span>
                              </div>
							  <div id="images-div"></div>
                           </div>
						   <div id="pass1" class="form-group">
                              <label class="col-sm-3 control-label">Old Password <span class="required">*</span></label>
                              <div class="col-sm-9">
                                 <input onkeyup="check_password(this.value)" name="old_password" class="form-control border-form" type="password" value="" placeholder="Enter Password">
								<span id="pass2" class=""></span>
								<div id="test"></div>
							  </div>
                           </div>
                           <div class="form-group">
                              <label class="col-sm-3 control-label">New Password </label>
                              <div class="col-sm-9">
                                 <input name="password1" class="form-control border-form" type="password" value="" placeholder="Enter Password">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-sm-3 control-label">Confirm Password </label>
                              <div class="col-sm-9">
                                 <input name="password2" class="form-control border-form" type="password" value="" placeholder="Enter Password">
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-9">
                                 <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Save Update</button>
                                 <a href="/easyads/my_details"><button class="btn btn-danger" type="button"><i class="fa fa-close"></i> Cancel</button></a>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Settings -->
	  
<script src="/easyads/js/avatar.js"></script>
	  
<script>
function check_password(password){
		var email=document.getElementById("email").value;
		//alert(email);
		// Create our XMLHttpRequest object
		var hr = new XMLHttpRequest();
		// Create some variables we need to send to our PHP file
		var url = "/easyads/check_password.php";
		var vars = "email="+email+"&password="+password;
		hr.open("POST", url, true);
		hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		// Access the onreadystatechange event for the XMLHttpRequest object
		hr.onreadystatechange = function() {
			//alert(hr);

			if(hr.readyState == 4 && hr.status == 200) {
				var return_data = hr.responseText;
				
				if(return_data=="ok"){
					//document.getElementById("test").innerHTML='test';
					document.getElementById("pass1").className = "form-group has-success has-feedback";
					document.getElementById("pass2").className = "glyphicon glyphicon-ok form-control-feedback";
					}else{
								document.getElementById("pass1").className = "form-group";
								document.getElementById("pass2").className = "";
								//document.getElementById("test").innerHTML = return_data;
							}
					}
			
		}
		// Send the data to PHP now... and wait for response to update the status div
		hr.send(vars); // Actually execute the request
		//document.getElementById("test").innerHTML = "processing...";
		}
	
</script>