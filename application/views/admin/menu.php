 		<nav class="nav-primary hidden-xs">

                  <ul class="nav nav-main" data-ride="collapse">
                    
                    <li <?php if($this->router->fetch_class() == "category"):?> class="active"<?php endif;?>>
                        <a href="<?php echo base_url()?>admin/category" class="auto">
                        <i class="fa fa-sitemap">
                        </i>
                        <span class="font-bold">Category</span>
                      </a>
                    </li>
 
                    <li <?php if($this->router->fetch_class() == "departments"):?> class="active"<?php endif;?>>
                        <a href="<?php echo base_url()?>admin/departments" class="auto">
                        <i class="fa fa-sitemap">
                        </i>
                        <span class="font-bold">Department</span>
                      </a>
                    </li>

                    <!-- <li <?php if($this->router->fetch_class() == "specialization"):?> class="active"<?php endif;?>>
                        <a href="<?php echo base_url()?>admin/specialization" class="auto">
                        <i class="fa fa-sitemap">
                        </i>
                        <span class="font-bold">Specializations</span>
                      </a>
                    </li>-->

                    <!-- <li <?php if($this->router->fetch_class() == "insurance"):?> class="active"<?php endif;?>>
                        <a href="<?php echo base_url()?>admin/insurance" class="auto">
                        <i class="fa fa-sitemap">
                        </i>
                        <span class="font-bold">Insurance</span>
                      </a>
                    </li>-->
                    
                    <li <?php if($this->router->fetch_class() == "subscribers"):?> class="active"<?php endif;?>>
                        <a href="#" class="auto">
                        <i class="fa fa-user">
                        </i>
                        <span class="font-bold">Subscribers</span>
                      </a>
                        
                        <ul class="nav dk">
                            
                            <li>
                              <a href="<?php echo base_url().ADMIN_URL?>subscribers/" class="auto"> 
                                  
                                <i class="i i-dot"></i>
                                <span>Subscribers Management</span>
                              </a>
                            </li>
                            
                            <li>
                              <a href="<?php echo base_url().ADMIN_URL?>subscribers/create" class="auto"> 
                                  
                                <i class="i i-dot"></i>
                                <span>Create Subscribers</span>
                              </a>
                            </li>
                            
                        </ul>
                        
                    </li> 
                    
                    <li <?php if($this->router->fetch_class() == "ads"):?> class="active"<?php endif;?>>
                        
                        <a href="<?php echo base_url()?>admin/ads" class="auto">
                            <i class="fa fa-bullhorn">
                            </i>
                            <span class="font-bold">Advertisements</span>
                        </a>
                        
                    </li>

                    <li <?php if($this->router->fetch_class() == "banners"):?> class="active"<?php endif;?>>
                        
                        <a href="<?php echo base_url()?>admin/banners" class="auto">
                            <i class="fa fa-bullhorn">
                            </i>
                            <span class="font-bold">Banners</span>
                        </a>
                        
                    </li>

                    <li <?php if($this->router->fetch_class() == "signboards"):?> class="active"<?php endif;?>>
                        
                        <a href="<?php echo base_url().ADMIN_URL?>signboards/" class="auto">
                            <i class="fa fa-bullhorn">
                            </i>
                            <span class="font-bold">Pinboards</span>
                        </a>
                        
                    </li>

                    <li <?php if($this->router->fetch_class() == "patients"):?> class="active"<?php endif;?>>
                        
                        <a href="<?php echo base_url().ADMIN_URL?>patients/" class="auto">
                            <i class="fa fa-bullhorn">
                            </i>
                            <span class="font-bold">User Management</span>
                        </a>
                        
                    </li>

                    <li <?php if($this->router->fetch_class() == "comments"):?> class="active"<?php endif;?>>
                        
                        <a href="<?php echo base_url().ADMIN_URL?>comments/" class="auto">
                            <i class="fa fa-bullhorn">
                            </i>
                            <span class="font-bold">User Comments</span>
                        </a>
                        
                    </li>
 

                    <li <?php if($this->router->fetch_class() == "followers"):?> class="active"<?php endif;?>>
                        
                        <a href="<?php echo base_url()?>admin/followers" class="auto">
                            <i class="fa fa-users">
                            </i>
                            <span class="font-bold">Followers Listing</span>
                        </a>
                        
                    </li>

                    <li <?php if($this->router->fetch_class() == "notifications"):?> class="active"<?php endif;?>>
                        
                        <a href="<?php echo base_url()?>admin/notifications" class="auto">
                            <i class="fa fa-paper-plane">
                            </i>
                            <span class="font-bold">Send Notifications</span>
                        </a>
                        
                    </li>

                    <li <?php if($this->router->fetch_class() == "sponsors"):?> class="active"<?php endif;?>>
                        
                        <a href="<?php echo base_url()?>admin/sponsors" class="auto">
                            <i class="fa fa-eye">
                            </i>
                            <span class="font-bold">Sponsor Management</span>
                        </a>
                        
                    </li>

                    <li <?php if($this->router->fetch_class() == "news"):?> class="active"<?php endif;?>>
                        
                        <a href="<?php echo base_url().ADMIN_URL?>news/" class="auto">
                            <i class="fa fa-bullhorn">
                            </i>
                            <span class="font-bold">News</span>
                        </a>
                        
                    </li>

                    <li <?php if($this->router->fetch_class() == "articles"):?> class="active"<?php endif;?>>
                        
                        <a href="<?php echo base_url().ADMIN_URL?>articles/" class="auto">
                            <i class="fa fa-bullhorn">
                            </i>
                            <span class="font-bold">Articles</span>
                        </a>
                        
                    </li>

                    <li <?php if($this->router->fetch_class() == "tips"):?> class="active"<?php endif;?>>
                        
                        <a href="<?php echo base_url().ADMIN_URL?>tips/" class="auto">
                            <i class="fa fa-bullhorn">
                            </i>
                            <span class="font-bold">Health Tips</span>
                        </a>
                        
                    </li>

                    <li <?php if($this->router->fetch_class() == "slides"):?> class="active"<?php endif;?>>
                        
                        <a href="<?php echo base_url().ADMIN_URL?>slides/" class="auto">
                            <i class="fa fa-bullhorn">
                            </i>
                            <span class="font-bold">Featured Banners</span>
                        </a>
                        
                    </li> 
                    
                    <!-- <li <?php if($this->router->fetch_class() == "newsletters"):?> class="active"<?php endif;?>>
                        <a href="#" class="auto">
                        <i class="fa fa-envelope-o">
                        </i>
                        <span class="font-bold">Newsletter</span>
                      </a>
                        
                        <ul class="nav dk">
                            
                            <li>
                              <a href="<?php echo base_url()?>admin/newsletters/send" class="auto"> 
                                  
                                <i class="i i-dot"></i>
                                <span>Send A Newsletter</span>
                              </a>
                            </li>
                            
                            <li>
                              <a href="<?php echo base_url()?>admin/newsletters/send_email" class="auto"> 
                                  
                                <i class="i i-dot"></i>
                                <span>Send Email</span>
                              </a>
                            </li>

                            <li>
                              <a href="<?php echo base_url()?>admin/newsletters/send_followers" class="auto"> 
                                  
                                <i class="i i-dot"></i>
                                <span>Followers Newsletter</span>
                              </a>
                            </li>
                            
                            <li>
                              <a href="<?php echo base_url()?>admin/newsletters/custom_notifications" class="auto"> 
                                  
                                <i class="i i-dot"></i>
                                <span>Custom Notifications</span>
                              </a>
                            </li>
                            
                            <li>
                              <a href="<?php echo base_url()?>admin/contactlist" class="auto"> 
                                  
                                <i class="i i-dot"></i>
                                <span>Contact List Management</span>
                              </a>
                            </li>                            
                            <li>
                              <a href="<?php echo base_url()?>admin/newsletters/settings" class="auto"> 
                                  
                                <i class="i i-dot"></i>
                                <span>Newsletter Settings</span>
                              </a>
                            </li>
                            
                        </ul>
                        
                    </li>-->
                    
                    <li <?php if($this->router->fetch_class() == "city" || $this->router->fetch_class() == "region"):?> class="active"<?php endif;?>>
                        <a href="#" class="auto">
                            <i class="fa fa-map-marker">
                            </i>
                            <span class="font-bold">Location</span>
                        </a>
                        
                        <ul class="nav dk">

                            <li>
                              <a href="<?php echo base_url()?>admin/country/" class="auto"> 
                                  
                                <i class="i i-dot"></i>
                                <span>Country</span>
                              </a>
                            </li>

                            <li>
                              <a href="<?php echo base_url()?>admin/city/" class="auto"> 
                                  
                                <i class="i i-dot"></i>
                                <span>City</span>
                              </a>
                            </li>
                            
                            <!-- <li>
                              <a href="<?php echo base_url()?>admin/region/" class="auto"> 
                                  
                                <i class="i i-dot"></i>
                                <span>Regions</span>
                              </a>
                            </li>-->
                            
                        </ul>  
                        
                    </li>
                    <li <?php if($this->router->fetch_class() == "settings"):?> class="active"<?php endif;?>>
                        <a href="#" class="auto">
                        <i class="fa fa-cogs">
                        </i>
                        <span class="font-bold">Settings</span>
                      </a>
                        
                        <ul class="nav dk">
                        
                            <li>
                              <a href="<?php echo base_url()?>admin/settings/general" class="auto"> 
                                  
                                <i class="i i-dot"></i>
                                <span>General Settings</span>
                              </a>
                            </li>

                            <!-- <li>
                              <a href="<?php //echo base_url()?>admin/settings/mail" class="auto">  
                                  
                                <i class="i i-dot"></i>
                                <span>Mail Settings</span>
                              </a>
                            </li>
                            <li>
                              <a href="<?php //echo base_url()?>admin/settings/images" class="auto">  
                                  
                                <i class="i i-dot"></i>
                                <span>Images</span>
                              </a>
                            </li> -->
                            
                        </ul>
                        
                    </li> 
                
                  </ul>

                </nav>