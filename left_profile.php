<!-- Settings -->
      <section class="settings">
         <div class="container">
            <div class="row">
               <div class="col-sm-3">
                  <div class="widget profile-widget">
                     <div class="widget-body">
                        <div class="avatar">
                           <a class="btn-icon" title="" data-placement="left" data-toggle="tooltip" href="#" data-original-title="Edit">
                           <i class="fa fa-camera"></i>
                           </a>
                           <img class="profile-dp" alt="User Image" src="/easyads/images/user3.png">
                           <div class="profile-info">
                              <h2 class="seller-name"><?php if(isset($_SESSION['user'])){echo $_SESSION['user'];}?></h2>
                              <p class="seller-detail"> Joined : <strong><?php if(isset($_SESSION['registered'])){echo $_SESSION['registered'];}?></strong></p>
                           </div>
                        </div>
                        <div class="list-group">
                           <a class="list-group-item" href="/easyads/my_ads">
                           <span class="label label-info">15</span>
                           <i class="fa fa-fw fa-pencil"></i> My Ads
                           </a>
                           <a class="list-group-item" href="/easyads/favourite">
                           <span class="label label-success">10</span>
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