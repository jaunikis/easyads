<?php
$sql="SELECT cat1,cat2 FROM skelbimai";
$result3=sqlconnect($sql);
$cars_count = $result3->num_rows;
while ($row = $result3->fetch_assoc()) {
	$count[]=$row['cat1'];
	$count[]=$row['cat2'];
}
	$occ = array_count_values($count);
?>

				  
                     <div id="categories_left" class="widget listing-filter-block filter-categories">
                        <div class="widget-header">
                           <h1>Categories</h1>
                        </div>
                        <div class="widget-body">
                           <ul class="trends">
                              <li>
                                 <a href="/easyads/items/cars & motor/cars">
                                    <i class="fa fa-car shortcut-icon icon-orange"></i> 
                                    <p>Cars <small><?php if(isset($occ['Cars'])){echo $occ['Cars'].' Ads';} ?></small></p>
                                 </a>
                              <li>
                                 <a href="/easyads/items/cars & motor">
                                    <i class="fa fa-gears shortcut-icon icon-green"></i> 
                                    <p>Motor <small><?php if(isset($occ['Cars & Motor'])){echo $occ['Cars & Motor'].' Ads';} ?></small></p>
                                 </a>
                              </li>
							  <li>
                                 <a href="/easyads/items/farming">
                                    <i class="fa fa-truck shortcut-icon icon-brown"></i> 
                                    <p>Farming <small><?php if(isset($occ['Farming'])){echo $occ['Farming'].' Ads';} ?></small></p>
                                 </a>
                              </li>
							  <li>
                                 <a href="/easyads/items/Electronics">
                                    <i class="fa fa-laptop shortcut-icon icon-blue"></i> 
                                    <p>Electronics <small><?php if(isset($occ['Electronics'])){echo $occ['Electronics'].' Ads';} ?></small></p>
                                 </a>
                              </li>
                              <li>
                                 <a href="/easyads/items/Services">
                                    <i class="fa fa-star shortcut-icon icon-light-green"></i> 
                                    <p>Services <small><?php if(isset($occ['Services'])){echo $occ['Services'].' Ads';} ?></small></p>
                                 </a>
                              </li>
                              <li>
                                 <a href="/easyads/items/Jobs">
                                    <i class="fa fa-briefcase shortcut-icon icon-dark-blue"></i> 
                                    <p>Jobs <small><?php if(isset($occ['Jobs'])){echo $occ['Jobs'].' Ads';} ?></small></p>
                                 </a>
                              </li>
							  <li>
                                 <a href="/easyads/items/Real estate">
                                    <i class="fa fa-home shortcut-icon icon-violet"></i> 
                                    <p>Real estate <small><?php if(isset($occ['Real estate'])){echo $occ['Real estate'].' Ads';} ?></small></p>
                                 </a>
                              </li>
                              <li>
                                 <a href="/easyads/items/Pets">
                                    <i class="fa fa-paw shortcut-icon icon-orange"></i> 
                                    <p>Pets <small><?php if(isset($occ['Pets'])){echo $occ['Pets'].' Ads';} ?></small></p>
                                 </a>
                              </li>
                              <li>
                                 <a href="/easyads/items/Baby & kids">
                                    <i class="fa fa-child shortcut-icon icon-light-blue"></i> 
                                    <p>Baby & kids <small><?php if(isset($occ['Baby & kids'])){echo $occ['Baby & kids'].' Ads';} ?></small></p>
                                 </a>
                              </li>
							  <li>
                                 <a href="/easyads/items/House & DIY">
                                    <i class="fa fa-gavel shortcut-icon icon-brown"></i> 
                                    <p>House & DIY <small><?php if(isset($occ['House & DIY'])){echo $occ['House & DIY'].' Ads';} ?></small></p>
                                 </a>
                              </li>
                              <li>
                                 <a href="/easyads/items/Sports">
                                    <i class="fa fa-bicycle shortcut-icon icon-light-green"></i> 
                                    <p>Sports <small><?php if(isset($occ['Sports'])){echo $occ['Sports'].' Ads';} ?></small></p>
                                 </a>
                              </li>
							  <li>
                                 <a href="/easyads/items/Clothes">
                                    <i class="fa fa-female shortcut-icon icon-orange"></i> 
                                    <p>Clothes <small><?php if(isset($occ['Clothes'])){echo $occ['Clothes'].' Ads';} ?></small></p>
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </div>