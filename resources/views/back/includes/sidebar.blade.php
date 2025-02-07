<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{ asset('back/assets/images/logo.svg') }}" width="80" alt="">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{{ auth()->user()->name }}</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i>
                    Online</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Ana Səhifə</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-settings-3-line"></i>
                        <span>Tənzimləmələr</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                    <li>
                            <a href="{{ route('back.pages.translation-manage.index') }}">
                                <i class="ri-translate"></i>
                                <span>Tərcümələr</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('back.pages.seo.index') }}">
                                <i class="ri-earth-line"></i>
                                <span>SEO</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('back.pages.logos.index') }}">
                                <i class="ri-file-line"></i>
                                <span>Logo</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('back.pages.theme-settings.index') }}">
                                <i class="ri-palette-line"></i>
                                <span>Tema Ayarları</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-share-line"></i>
                        <span>Sosial Media</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                       
                    <li>
                            <a href="{{ route('back.pages.social.index') }}">
                                <i class="ri-messenger-line"></i>
                                <span>Sosial Media</span>
                            </a>
                        </li>   

                        <li>
                        <a href="{{ route('back.pages.socialshare.index') }}">
                            <i class="ri-share-line"></i>
                            <span>Sosial Share</span>
                        </a>
                    </li>  

                    <li>
                        <a href="{{ route('back.pages.socialfooter.index') }}">
                            <i class="ri-mail-open-line"></i>
                            <span>Sosial Footer</span>
                        </a>
                    </li>  
                    </ul>
                    <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-home-line"></i>
                        <span>Ana Səhifə</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                       
                      
                    <li>
                        <a href="{{ route('back.pages.home-heroes.index') }}">
                            <i class="ri-slideshow-line"></i>
                            <span>Slayder</span>
                        </a>
                    </li> 

                   

                    <li>
                        <a href="{{ route('back.pages.home-sections.index') }}">
                            <i class="ri-layout-grid-line"></i>
                            <span>Bölmələr</span>
                        </a>
                    </li> 

                    <li>
                        <a href="{{ route('back.pages.country-flags.index') }}">
                            <i class="ri-flag-line"></i>
                            <span>Bayraqlar</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('back.pages.home-cart-twos.index') }}">
                            <i class="ri-layout-grid-line"></i>
                            <span>Bölmələr iki</span>
                        </a>
                    </li>
                    </ul>

                    <li>
                        <a href="{{ route('back.pages.services.index') }}">
                            <i class="ri-service-line"></i>
                            <span>Xidmətlər</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('back.pages.services-types.index') }}">
                            <i class="ri-pie-chart-line"></i>
                            <span>Xidmət Növləri</span>
                        </a>
                    </li>

                    <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-file-text-line"></i>
                        <span>Blog</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                    <!-- <li>
                        <a href="{{ route('back.pages.blog-types.index') }}">
                            <i class="ri-folder-line"></i>
                            <span>Blog Növləri</span>
                        </a>
                    </li> -->

                    <li>
                        <a href="{{ route('back.pages.blogs.index') }}">
                            <i class="ri-article-line"></i>
                            <span>Bloglar</span>
                        </a>
                    </li>
                    </ul>


                    <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-phone-line"></i>
                        <span>Contact</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                    <li>
                        <a href="{{ route('back.pages.contact.index') }}">
                            <i class="ri-phone-line"></i>
                            <span>Contact Məlumatları</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('back.pages.contact-requests.index') }}">
                            <i class="ri-message-line"></i>
                            <span>Contact Sorğuları</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('back.pages.contact-data.index') }}">
                            <i class="ri-phone-line"></i>
                            <span>Contact Parametrləri</span>
                        </a>
                    </li>
                   


                    </ul>

                    <li class="nav-item">
                        <a href="{{ route('back.pages.about-pages.index') }}" class="nav-link">
                            <i class="ri-information-line"></i>
                            <span>Haqqımızda</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('back.pages.teams.index') }}">
                            <i class="ri-team-line"></i>
                            <span>Komandamız</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('back.pages.networks.index') }}">
                            <i class="ri-earth-line"></i>
                            <span>Global Networks</span>
                        </a>
                    </li>

                   


                    <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-user-line"></i>
                        <span>Müştərilərimiz</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                    
                    <li class="nav-item">
                        <a href="{{ route('back.pages.our-clients.index') }}" class="nav-link">
                            <i class="ri-team-line"></i>
                            <span>Müştərilərimiz</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('back.pages.home-carts.index') }}">
                            <i class="ri-pages-line"></i>
                            <span>Kartlar</span>
                        </a>
                    </li> 


                    </ul>
                
                
                </li>
                            


                    



                     
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->







