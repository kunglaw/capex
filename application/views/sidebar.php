<?php
 $id_session 	   = $this->session->userdata("id_user");
 $username 			 = $this->session->userdata("username");
	$name_session  = $this->session->userdata("name");
	$email_session = $this->session->userdata("email");
	$kode_session  = $this->session->userdata("kode");
	$role_session  = $this->session->userdata("role");
	$photo_session = $this->session->userdata("photo");

	$uri1 = $this->uri->segment(1);
	$this->load->model("master/department_model");
	$department = $this->department_model->detail_department($kode_session);

	$active_dashboard = "";
	$active_opex = "";
	$active_master = "";

	if($uri1 == "dashboard")
	{
		$active_dashboard = "active";
	}
	else if($uri1 == "opex")
	{
		$active_opex = "active";
	}
	else if($uri1 == "master" || $uri1 == "users")
	{
		$active_master = "active";
	}



?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                    	<center>
                        <img alt="image" class="img-circle" src="<?=base_url("resources/upload/$photo_session")?>" width="120" height="120"/>
                        </center>
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs">
                        	<strong class="font-bold"><?=$name_session?></strong>

<<<<<<< HEAD
<<<<<<< HEAD
                        </span></span>
=======
                        </span>
>>>>>>> capex/master
=======

                        </span></span>

                        </span>

>>>>>>> 773dd887ed641489985fe37ccd2a42f38c565af1
												<span><?=$department["department"]?>  </span>
                        <span class="text-muted text-xs block"><?=$role_session?>
                        <b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
<<<<<<< HEAD
<<<<<<< HEAD
                        <li><a href="<?=base_url("users/update/$id_session")?>">Profile</a></li>
=======
=======

                        <li><a href="<?=base_url("users/update/$id_session")?>">Profile</a></li>

>>>>>>> 773dd887ed641489985fe37ccd2a42f38c565af1
                        <li><a href="#">Profile</a></li>
>>>>>>> capex/master

                        <li class="divider"></li>
                        <li><a href="<?=base_url("users/users_process/logout")?>">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    Opex
                </div>
            </li>
            <li class="<?=$active_dashboard?>">
            	 <a href="<?=base_url("dashboard")?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>

            </li>
            <li class="<?=$active_opex?>">
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Opex</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                	<!-- <li><a href="<?=base_url("opex");?>"> List </a></li> -->
                    <li ><a href="<?=base_url("opex/create")?>"> Create new </a></li>
                    <li><a href="<?=base_url("opex/additional")?>">Additional</a></li>
                    <!-- <li><a href="<?=base_url("opex/transfer")?>"> Transfer / Switching </a></li> -->
                    <li><a href="<?=base_url("opex/realization")?>"> Realization </a></li>
<<<<<<< HEAD
<<<<<<< HEAD
                    <li><a href="<?=base_url("opex/report")?>"> Report </a></li>

=======
>>>>>>> capex/master
=======
                    <li><a href="<?=base_url("opex/report")?>"> Report </a></li>
>>>>>>> 773dd887ed641489985fe37ccd2a42f38c565af1

                </ul>
            </li>
            <li class="<?=$active_master?>">
            	 <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Master</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                	<li><a href="<?=base_url("master/opex_account")?>"> Opex Account </a></li>
                	<!-- <li><a href="<?=base_url("master/division");?>"> Division </a></li>
                    <li ><a href="<?=base_url("master/department")?>"> Department </a></li>
<<<<<<< HEAD
<<<<<<< HEAD
                    <li><a href="<?=base_url("users/user_list")?>"> Users </a></li> -->
=======
=======

                    <li><a href="<?=base_url("users/user_list")?>"> Users </a></li> -->
>>>>>>> 773dd887ed641489985fe37ccd2a42f38c565af1
                    <li><a href="<?=base_url("users/user_list")?>"> Users </a></li>
>>>>>>> capex/master


                </ul>


            </li>


        </ul>

    </div>
</nav>
