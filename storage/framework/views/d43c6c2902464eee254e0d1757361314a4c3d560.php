

<div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->

      <?php
			$user = DB::table('users')->where('id',Auth::user()->id)->first();
		  ?>
      
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name"><?php echo e(Auth::user()->name); ?></span>
              <img src="<?php echo e((!empty($user->image))? url('dashboard/img/profile_img/'.$user->image):url('dashboard/img/img12.jpg')); ?>" class="wd-32 rounded-circle" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href="<?php echo e(route('student.profile.view')); ?>"><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                <li><a href=""><i class="icon ion-ios-gear-outline"></i> Change Password</a></li>
                <li><a href="<?php echo e(route('user.logout')); ?>"><i class="icon ion-power"></i> Sign Out</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
      </div><!-- sl-header-right -->
    </div><?php /**PATH C:\Users\HP\Documents\GitHub\Laravel_PSM\resources\views/student/body/header.blade.php ENDPATH**/ ?>