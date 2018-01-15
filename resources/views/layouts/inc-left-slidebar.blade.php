<div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <img id="LockUserPicture" class="img-responsive" src="{{asset('./assets/img/logo/linchak-logo.png')}}" height="60px;">
            </div>

            <ul class="nav">
                <li {{ (Request::is('dashboard*') ? 'class=active' : '') }} >
                    <a href="{{url('dashboard')}}">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li {{ (Request::is('user_profile*') ? 'class=active' : '') }}>
                    <a href="{{url('user_profile')}}">
                        <i class="ti-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>


                <li {{ (Request::is('user_shop*') ? 'class=active' : '') }}>
                    <a href="{{url('user_shop')}}">
                        <i class="ti-briefcase"></i>
                        <p>User Shop</p>
                    </a>
                </li>

                <li {{ (Request::is('category*') ? 'class=active' : '') }}>
                    <a href="{{url('category')}}">
                        <i class="ti-direction-alt"></i>
                        <p>Category</p>
                    </a>
                </li>

                <li {{ (Request::is('product*') ? 'class=active' : '') }}>
                    <a href="{{url('product')}}">
                        <i class="ti-palette"></i>
                        <p>Product</p>
                    </a>
                </li>

          <!--      <li>
                    <a href="table.html">
                        <i class="ti-view-list-alt"></i>
                        <p>Table List</p>
                    </a>
                </li>
                <li>
                    <a href="typography.html">
                        <i class="ti-text"></i>
                        <p>Typography</p>
                    </a>
                </li>
                <li>
                    <a href="icons.html">
                        <i class="ti-pencil-alt2"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="ti-map"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="ti-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
              -->
				<li class="active-pro">
                    <a href="{{url('logout')}}">
                        <i class="ti-lock" style="font-size: 20px;"></i>
                        <p>Sign Out</p>
                    </a>
                </li>
            </ul>
    	</div>
<div class="sidebar-background" style="background-image: url({{url('assets/img/sidebar-5.jpg')}}) "></div>

    </div>
