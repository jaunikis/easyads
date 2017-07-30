		<!-- Navbar -->
      <nav class="navbar top-navbar" role="navigation">
         <div class="container">
            <div class="navbar-header col-sm-2">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="easyads.ie"><img alt="logo" src="/images/logo2.png" ></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav">
                  <li><a href="/home">Home</a></li>
				  <li><a href="/items">All Adverts</a></li>
                  <li><a href="/blog">Blog</a></li>
                  <li><a href="/faq">FAQ</a></li>
                  <li><a href="/post_ad"><button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Post Free Ad</button></a></li>
               </ul>
<?php
if(isset($_SESSION['user'])){
	//echo $_SESSION['photo_blob'];
	
	echo '<div class="user-dropdown pull-right">
						<ul class="nav navbar-right top-nav">
							<li class="dropdown">
								<a aria-expanded="true" href="" class="dropdown-toggle" data-toggle="dropdown">';
					if($_SESSION['photo_blob']==''){echo'<img id="avatar_top_image" src="/images/user3.png" alt="User Image" class="user-dp">&nbsp';
						}else{
						echo'<img id="avatar_top_image" src="'.$_SESSION['photo_blob'].'" alt="User Image" class="user-dp">&nbsp';
					}
								
								
								echo $_SESSION['user'].'&nbsp<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li>
										<a href="/my_ads"><i class="fa fa-fw fa-pencil"></i> My Ads</a>
									</li>
									<li>
										<a href="/favourite"><i class="fa fa-fw fa-heart"></i> Favourite Ads</a>
									</li>
									<li>
										<a href="/ad_alerts"><i class="fa fa-fw fa-clock-o"></i> Ad Alerts</a>
									</li>
									<li>
										<a href="/my_details"><i class="fa fa-fw fa-gear"></i> My details</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>';
	}else{
		echo '<div class="user-login pull-right">
                  <a href="/signup">REGISTER</a>
                  <span>or</span>  
                  <a class="btn btn-md btn-primary" href="/login/">Sign In</a>
               </div>';
			   }
?>
            </div>
         </div>
      </nav>
	
      <!-- End Navbar -->