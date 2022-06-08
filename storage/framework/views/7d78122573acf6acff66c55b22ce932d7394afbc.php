<?php
$prefix = Request::route()->getPrefix();
$route = Route::current()->Getname();


?>

<div class="sl-logo"><a href="<?php echo e(route('index')); ?>"><i class="icon ion-android-star-outline"></i> PSM MS</a></div>
    <div class="sl-sideleft">
      <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span><!-- input-group-btn -->
      </div><!-- input-group -->

      <label class="sidebar-label">Navigation</label>
      <div class="sl-sideleft-menu">
        <a href="<?php echo e(route('index')); ?>" class="sl-menu-link active">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Lecturer Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="<?php echo e(route('title.lists')); ?>" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Manage Title</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <a href="<?php echo e(route('lect_Request')); ?>" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Manage Inventory</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
      </div><!-- sl-sideleft-menu -->

      <a href="#" class="sl-menu-link  <?php echo e(($prefix == '/expertise')?'active':''); ?>">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
            <span class="menu-item-label">Manage Expertise</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a>

        <ul class="sl-menu-sub nav flex-column" style="display: none;">
          <li class="nav-item"><a href="<?php echo e(route('lecturer.teaching.view')); ?>" class="nav-link active">Teaching</a></li>
          <li class="nav-item"><a href="<?php echo e(route('lecturer.research.view')); ?>" class="nav-link">Research</a></li>
          <li class="nav-item"><a href="<?php echo e(route('lecturer.intellectual.view')); ?>" class="nav-link">Intellectual Property</a></li>
        </ul>

        <a href="<?php echo e(route('view')); ?>" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Approval & Report</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <a href="" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Log Book Approval</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
      </div><!-- sl-sideleft-menu -->

      <br>
    </div>
<?php /**PATH C:\Users\HP\Documents\GitHub\Laravel_PSM\resources\views/lecturer/body/sidebar.blade.php ENDPATH**/ ?>