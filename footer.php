     <!-- Footer -->
      <footer>
         <section class="footer-Content">
            <div class="container">
               <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <div class="footer-widget">
                        <h3 class="block-title">About</h3>
                        <div class="textwidget">
							<p style="margin-bottom:15px;"> <span style="color:steelBlue;font-size:16px;">Easyads.ie</span> react to increasing fees to advertise in the biggest Ireland's classifieds websites. We lounching completely <strong><a href="post_ad">free</a></strong> and powerfull Irelands classified website.</p>
						   <p>Easyads.ie is all about you. Our aim is to empower every person in Ireland to independently connect with buyers and sellers online. We care about you — and the transactions that bring you closer to your dreams. Want to buy your first car? We’re here for you. Want to sell commercial property to buy your dream home? We’re here for you. Whatever job you’ve got, we promise to get it done.</p>
						 
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                     <div class="footer-widget">
                        <h3 class="block-title">Quick Links</h3>
                        <ul class="menu">
                           <li><a href="home">Home</a></li>
                           <li><a href="about">About</a></li>
                           <li><a href="faq">FAQ</a></li>
                           <li><a href="careers">Careers</a></li>
                           <li><a href="pricing">Pricing Plans</a></li>
                           <li><a href="items">Categories</a></li>
                           <li><a href="services">Services</a></li>
                           <li><a href="team">Team</a></li>
                           <li><a href="contact">Contact</a></li>
                           <li><a href="blog">Blog</a></li>
                           <li><a href="faq">Help</a></li>
                           <li><a href="post_ad">Advertise With Us</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                     <div class="footer-widget">
                        <h3 class="block-title">Categories</h3>
                        <ul class="menu">
						<?php
						$categ=$_SESSION["categ"];
						$cat_count2=$_SESSION["cat_count2"];
                        echo '<li><a href="/items/'.$categ[0].'"><span>'.$cat_count2[0].'</span> '.$categ[0].'</a></li>';
						for($i=1;$i<count($categ);$i++){
							 echo '<li><a href="/items/'.$categ[$i].'"><span>'.$cat_count2[$i].'</span> '.$categ[$i].'</a></li>';
						}
						?>
                           
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <div class="copyright">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="site-info pull-left">
                        <p>All Copyrights Reserved @ 2017 - Made with <i class="fa fa-heart"></i> by <a target="_blank" href="http://www.mv-media.com/">mvmedia</a></p>
                     </div>
                     <div class="bottom-social-icons social-icon pull-right">  
                        <a href="#" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a> 
                        <a href="#" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" target="_blank" class="dribble"><i class="fa fa-dribbble"></i></a>
                        <a href="#" target="_blank" class="youtube"><i class="fa fa-youtube"></i></a>
                        <a href="#" target="_blank" class="google-plus"><i class="fa fa-google-plus"></i></a>
                        <a href="#" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- End Footer -->
    