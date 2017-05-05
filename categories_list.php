   <!-- Categories List -->
	<section class="categories-list">
         <div class="container">
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                  <div class="widget brown-widget">
                     <div class="widget-header">
                        <a href="/easyads/items/Motor/Cars"><h1><i class="fa fa-car shortcut-icon icon-orange"></i> Cars</h1></a>
                     </div>
                     <div class="widget-body">
                        <ul class="trends">
		<?php
		require_once ('incl/server.php');
			// get cars
			$sql="SELECT COUNT(id), make
			FROM skelbimai
			WHERE cat2='Cars'
			GROUP BY make
			ORDER BY COUNT(id) DESC
			LIMIT 3";
			$result=sqlconnect($sql);
			while ($row = $result->fetch_assoc()) {
				$make=$row['make'];
				$count_id=$row['COUNT(id)'];
?>   				
                           <li><a href="/easyads/items/Motor/Cars/<?php echo $make;?>"><?php echo $make;?> <span class="item-numbers"><?php echo $count_id;?></span></a></li>
                           
			<?php } ?>			   
                        </ul>
                     </div>
                  </div>
               </div>

 
	<?php
//kitos kategorijos
/*
$sql="SELECT COUNT(id), cat1
FROM skelbimai
GROUP BY cat1
ORDER BY COUNT(id) DESC";
$result=sqlconnect($sql);
$cat_count = $result->num_rows;
while ($row = $result->fetch_assoc()) {
	//$id=$row['id'];
	$cat1=$row['cat1'];
	$count_id=$row['COUNT(id)'];
	*/
?>
               <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                  <div class="widget blue-widget">
                     <div class="widget-header">
                        <h1><i class="fa fa-gears shortcut-icon icon-green"></i> Motors</h1>
                     </div>
                     <div class="widget-body">
                        <ul class="trends">
		<?php
			$sql1="SELECT COUNT(id), cat2
			FROM skelbimai
			WHERE cat1='Cars & Motor'
			GROUP BY cat2
			ORDER BY COUNT(id) DESC
			LIMIT 3";
			$result1=sqlconnect($sql1);
			while ($row1 = $result1->fetch_assoc()) {
				$cat2=$row1['cat2'];
				$countas=$row1['COUNT(id)'];
?>   	
                           <li><a href="#"><?php echo $cat2; ?> <span class="item-numbers"><?php echo $countas;?></span></a></li>
         <?php } ?>	                 
                        </ul>
                     </div>
                  </div>
               </div>


			  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                  <div class="widget green-widget">
                     <div class="widget-header">
                        <h1><i class="fa fa-gavel shortcut-icon icon-blue"></i> House & DIY</h1>
                     </div>
                     <div class="widget-body">
                        <ul class="trends">
             <?php
			$sql1="SELECT COUNT(id), cat2
			FROM skelbimai
			WHERE cat1='House & DIY'
			GROUP BY cat2
			ORDER BY COUNT(id) DESC
			LIMIT 3";
			$result1=sqlconnect($sql1);
			while ($row1 = $result1->fetch_assoc()) {
				$cat2=$row1['cat2'];
				$countas=$row1['COUNT(id)'];
?>   	
                           <li><a href="#"><?php echo $cat2; ?> <span class="item-numbers"><?php echo $countas;?></span></a></li>
         <?php } ?>	      
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                  <div class="widget brown-widget">
                     <div class="widget-header">
                        <h1><i class="fa fa-truck shortcut-icon icon-brown"></i> Farming</h1>
                     </div>
                     <div class="widget-body">
                        <ul class="trends">
          <?php
			$sql1="SELECT COUNT(id), cat2
			FROM skelbimai
			WHERE cat1='Farming'
			GROUP BY cat2
			ORDER BY COUNT(id) DESC
			LIMIT 3";
			$result1=sqlconnect($sql1);
			while ($row1 = $result1->fetch_assoc()) {
				$cat2=$row1['cat2'];
				$countas=$row1['COUNT(id)'];
?>   	
                           <li><a href="#"><?php echo $cat2; ?> <span class="item-numbers"><?php echo $countas;?></span></a></li>
         <?php } ?>	 
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                  <div class="widget violet-widget">
                     <div class="widget-header">
                        <h1><i class="fa fa-shopping-cart shortcut-icon icon-violet"></i> Electronics <span class="item-numbers">68</span></h1>
                     </div>
                  </div>
               </div>
            
               <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                  <div class="widget dark-blue-widget">
                     <div class="widget-header">
                        <h1><i class="fa fa-briefcase shortcut-icon icon-dark-blue"></i> Job</h1>
                     </div>
                     <div class="widget-body">
                        <ul class="trends">
                           <li><a href="#">Accountancy <span class="item-numbers">78</span></a></li>
                           <li><a href="#">Banking <span class="item-numbers">45</span></a></li>
                           <li><a href="#">Managerment <span class="item-numbers">30</span></a></li>
                           <li><a href="#">Secretarial & PA <span class="item-numbers">28</span></a></li>
                           <li><a href="#">Voluntary Work <span class="item-numbers">16</span></a></li>
                           <li><a href="#">Show More <span class="item-numbers">9</span></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                  <div class="widget orange-widget">
                     <div class="widget-header">
                        <h1><i class="fa fa-building-o shortcut-icon icon-orange"></i> Hotels</h1>
                     </div>
                     <div class="widget-body">
                        <ul class="trends">
                           <li><a href="#">Artists <span class="item-numbers">95</span></a></li>
                           <li><a href="#">Events & Nightlife <span class="item-numbers">86</span></a></li>
                           <li><a href="#">Hotel Stuff <span class="item-numbers">60</span></a></li>
                           <li><a href="#">Classes <span class="item-numbers">30</span></a></li>
                           <li><a href="#">Hostel <span class="item-numbers">22</span></a></li>
                           <li><a href="#">Show More <span class="item-numbers">19</span></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                  <div class="widget light-blue-widget">
                     <div class="widget-header">
                        <h1><i class="fa fa-star shortcut-icon icon-light-blue"></i> Services</h1>
                     </div>
                     <div class="widget-body">
                        <ul class="trends">
                           <li><a href="#">Computers <span class="item-numbers">55</span></a></li>
                           <li><a href="#">Clothing <span class="item-numbers">35</span></a></li>
                           <li><a href="#">Childcare <span class="item-numbers">31</span></a></li>
                           <li><a href="#">Business <span class="item-numbers">29</span></a></li>
                           <li><a href="#">Cleaning <span class="item-numbers">18</span></a></li>
                           <li><a href="#">Show More <span class="item-numbers">8</span></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                  <div class="widget light-green-widget">
                     <div class="widget-header">
                        <h1><i class="fa fa-paw shortcut-icon icon-light-green"></i> Pets</h1>
                     </div>
                     <div class="widget-body">
                        <ul class="trends">
                           <li><a href="#">Cats <span class="item-numbers">66</span></a></li>
                           <li><a href="#">Dogs <span class="item-numbers">54</span></a></li>
                           <li><a href="#">Birds <span class="item-numbers">34</span></a></li>
                           <li><a href="#">Wanted <span class="item-numbers">12</span></a></li>
                           <li><a href="#">Pets for Sale <span class="item-numbers">6</span></a></li>
                           <li><a href="#">Show More <span class="item-numbers">1</span></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
           
         </div>
      </section>
      <!-- End Categories List -->