<?php
if(!isset($_SESSION['email'])){$_SESSION['link']='/easyads/my_ads';echo('<script>window.location = "/easyads/login";</script>');exit;}

$email=$_SESSION['email'];
require_once ('incl/server.php');
require_once ('incl/elapsed.php');
//my_ads
$sql="SELECT * FROM skelbimai WHERE email='$email' ORDER BY id DESC";
$result_my_ads=sqlconnect($sql);
$my_ads = $result_my_ads->num_rows;

//saved
$sql="SELECT saved FROM users WHERE email='$email'";
$result=sqlconnect($sql);
$row = $result->fetch_assoc();
$saved=$row['saved'];

$sql="SELECT * FROM skelbimai WHERE id IN ($saved) ORDER BY id DESC";
//$sql="SELECT * FROM skelbimai WHERE id IN (SELECT saved FROM users WHERE email='as') ORDER BY id DESC";
if($result_favourite=sqlconnect($sql)){
$favourite = $result_favourite->num_rows;
}else{$favourite=0;}
?>

<!-- Settings -->
      <section class="settings">
         <div class="container">
            <div class="row">
               <div class="col-sm-3">
                  <div class="widget profile-widget">
                     <div class="widget-body">
                        <div class="avatar">
                           <a onclick="document.getElementById('iFile').click();" class="btn-icon" title="" data-placement="left" data-toggle="tooltip" data-original-title="Edit">
						   <input id="iFile" type="file" onchange="avatar(this)" class="filestyle55" accept="image/jpeg, image/png" style="display:none;" />
                           <i class="fa fa-camera"></i>
                           </a>
				<?php
					if($_SESSION['photo_blob']==''){echo'<img id="avatar_image" class="profile-dp" alt="User Image" src="/easyads/images/user3.png">';
						}else{
						echo'<img id="avatar_image" class="profile-dp" alt="User Image" src="'.$_SESSION['photo_blob'].'">';
					}
                ?>
                           <div class="profile-info">
                              <h2 class="seller-name"><?php if(isset($_SESSION['user'])){echo $_SESSION['user'];}?></h2>
                              <p class="seller-detail"> Joined : <strong><?php if(isset($_SESSION['registered'])){echo $_SESSION['registered'];}?></strong></p>
                           </div>
                        </div>
                        <div class="list-group">
                           <a class="list-group-item" href="/easyads/my_ads">
                           <span class="label label-info"><?php echo $my_ads; ?></span>
                           <i class="fa fa-fw fa-pencil"></i> My Ads
                           </a>
                           <a class="list-group-item" href="/easyads/favourite">
                           <span class="label label-success"><?php echo $favourite; ?></span>
                           <i class="fa fa-fw fa-heart"></i> Favourite Ads
                           </a>
                           <a class="list-group-item" href="ad-alerts.html">
                           <i class="fa fa-fw fa-clock-o"></i> Ad Alerts
                           </a>
                           <a class="list-group-item" href="/easyads/my_details">
                           <i class="fa fa-fw fa-gear"></i> My Details
                           </a>
                           <a class="list-group-item" href="/easyads/logout.php">
                           <i class="fa fa-fw fa-power-off"></i> Log Out</a>
                           </a>
                        </div>
                        <a href="close-account.html" class="btn btn-danger btn-block"><i class="fa fa-trash"></i> Delete Account</a>
                     </div>
                  </div>
               </div>