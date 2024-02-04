<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            
                           <H5><span class="">D'Rasa </span></H5>  
<!-- <span class="caret"></span> -->
                        </span>
                    </a>
                     <!-- <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                    </div> -->
                </div>
            </div>
           
           <ul class="nav nav-primary">
						<li class="nav-item active">
							<a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="dashboard">
								<ul class="nav nav-collapse">
									<li>
										<a href="../demo1/index.html">
											<span class="sub-item">Dasboard Dapur</span>
										</a>
									</li>
									<li>
										<a href="../demo2/index.html">
											<span class="sub-item">Dasboard Kasir</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <!-- <h4 class="text-section">Components</h4> -->
                </li>
                <li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>DATA MASTER</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									
                        <li class="nav-item">
                            <a href="{{route('category.index')}}">
                            <i class="fas fa-align-justify"></i>
                                <p> Category Menu</p>
                            </a>
                        </li>
                        
                      </li>
                       
                        
                      </li>
                    
            </ul>

             
                  
                 <li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-pen-square"></i>
								<p>Menus & KItchen </p>
								<span class="caret"></span>
                            </a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
                          <li class="nav-item">
                                <a href="{{route('menu.index')}}">
                                <i class="fas fa-align-justify"></i>
                                <p> Menu</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('meja.index')}}">
                        <i class="fas fa-table"></i>
                            <p> Data Meja Pelanggan</p>
                        </a>
                    </li>
                     <li class="nav-item">
                         <a href="{{route('dapur.index')}}">
                          <i class="fas fa-table"></i>
                                <p>Data Dapur</p>
                            </a>  
                        </li>
                        </ul>
					</div>

                      <li class="nav-item">
						<a data-toggle="collapse" href="#charts">
							<i class="far fa-chart-bar"></i>
							<p>Website Setting</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="charts">
							<ul class="nav nav-collapse">
								<li>
									<a href="{{route('banner.index')}}">
										<span class="sub-item">Slider Banner</span>
									</a>
								</li>
                                <li>
									<a href="{{route('about.index')}}">
										<span class="sub-item">About</span>
									</a>
								</li>
								 <!-- <li>
									<a href="charts/charts.html">
										<span class="sub-item">Artikel</span>
									</a>
								</li> -->
                                  <li>
									<a href="charts/charts.html">
										<span class="sub-item">Footer & Copyright</span>
									</a>
								</li>
							</ul>
						</div>
					</li>
						</li>
                        	<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-user"></i>
								<p>Master Employes</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									 <li class="nav-item">
                                    <a href="{{route('pegawai.index')}}">
                                    <i class="fas fa-user"></i>
                                        <p> Employes</p>
                                    </a>
                                   </li>
									
								</ul>
							</div>
						</li>
                   <li class="nav-item">
							<a data-toggle="collapse" href="#maps">
								<i class="fas fa-book"></i>
								<p>Report</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="maps">
								<ul class="nav nav-collapse">
									<li>
										<a href="">
											<span class="sub-item">Report Transaksi </span>
										</a>
									</li>
                                    <li>
										<a href="">
											<span class="sub-item">Report Orderan Selesai</span>
										</a>
									</li>
								</ul>
                                 <li class="nav-item">
                                    <a href="{{url('/')}}">
                                    <i class="fas fa-globe"></i>
                                        <p> GO TO Website</p>
                                    </a>
                                   </li>
                                <li>
                         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href=""
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                 <!-- <li>
                    <a href=""
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                             <i class="fa-solid fa-"></i>
                    {{ __('LOGOUT') }}
                </a>
                <form id="logout-form" action="" method="POST" class="d-none">
                    @csrf
                </form>
              </li> 

        </div>
    </div>
</div>
