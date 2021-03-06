      <!-- Search Box -->
<?php
$location='All Locations';
if(isset($_SESSION['s_location'])){$location=$_SESSION['s_location'];}
$search='';
if(isset($_SESSION['search'])){$search=$_SESSION['search'];}

$string = file_get_contents("categories-list.txt");
$json = json_decode($string, true);
?>    
      <section class="search-box">
         <div class="container">
            <div class="row">
               <div class="main-search-box text-center">
                  <h1 class="intro-title" >Sell or Advertise everything online with Easyads.ie classified</h1>
                  <p class="sub-title">Buy and sell everything from used cars to mobile phones and computers, or search for property, jobs and more</p>
                  <form action="/easyads/items">
                     <div class="col-md-4 col-sm-4 search-input">
                        <input name="search" type="text" placeholder="What are you looking for...?" class="form-control input-lg search-form">
                     </div>
					 <div class="col-md-3 col-sm-3 search-input">
                        <select name="cat1" class="form-control input-lg search-form">
                           <option selected="">All Category</option>
            <?php
				for($i=0;$i<count($json['cat1']);$i++){
					echo '<option ';
					//if($json['cat1'][$i]==$cat1){echo 'selected';}
				echo '>'.$json['cat1'][$i].'</option>';
				}
            ?>
                        </select>
                     </div>
                     <div class="col-md-3 col-sm-3 search-input">
                        <select name="location" class="form-control input-lg search-form">
                           <option selected="">All Locations</option>
            <?php
				for($i=0;$i<count($json["locations"]);$i++){
					echo '<option ';
					//if($json["locations"][$i]==$location){echo 'selected';}
					echo'>'.$json["locations"][$i].'</option>';
				}
            ?>
                        </select>
                     </div>
                     <div class="col-md-2 col-sm-2 search-input">
                        <button class="btn btn-primary btn-lg simple-btn btn-block">
                        <i class="fa fa-search"></i> Search
                        </button>
                     </div>
                  </form>
               </div>
               <div class="top-categories">
                  <h4>Popular Categories</h4>
                  <a href="/easyads/items/Cars & Motor/Cars">
                  <i class="fa fa-car"></i>Cars
                  </a>
                  <a href="/easyads/items/Jobs">
                  <i class="fa fa-briefcase"></i>Jobs
                  </a>
                  <a href="/easyads/items/Electronics/Mobile phones">
                  <i class="fa fa-mobile"></i>Mobiles
                  </a>
                  <a href="/easyads/items/Electronics/Laptops">
                  <i class="fa fa-laptop"></i>Laptop
                  </a>
                  <a href="/easyads/items/Real Estate">
                  <i class="fa fa-building-o"></i>Property
                  </a>
               </div>
            </div>
         </div>
      </section>
      <!-- End Search Box -->