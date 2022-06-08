
<?php $__env->startSection('technician'); ?>

<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">PSM MS</a>
        <span class="breadcrumb-item active">Dashboard</span>
      </nav>

      <div class="sl-pagebody">

 <!-- CONTENT -->
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
   
      <!--tab-->
      <?php
			$user = DB::table('users')->where('id',Auth::user()->id)->first();
		  ?>
      <div class="pd-10 bg-gray-300 mg-t-20">
					
              <h6 class="card-body-title">Technician Profile</h6>
              <div class="mg-b-20 mg-sm-b-30">
                <img class="card-img-top img-fluid" src="<?php echo e((!empty($user->image))? url('dashboard/img/profile_img/'.$user->image):url('dashboard/img/img12.jpg')); ?>" alt="<?php echo e($user->name); ?>" style="width: 15%; height: 15%;">
              </div>
              <div class="row mg-t-20">
              <h5 class="card-body-title col-sm-4">Full Name: </h6>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <p class="form-control"><?php echo e($user->name); ?> </p>
                </div>
              </div><!-- row -->
              <div class="row mg-t-20">
              <h5 class="card-body-title col-sm-4">Staff ID: </h6>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <p class="form-control"><?php echo e($user->staffID); ?> </p>
                </div>
              </div><!-- row -->
              <div class="row mg-t-20">
              <h5 class="card-body-title col-sm-4">Email Address: </h6>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <p class="form-control"><?php echo e($user->email); ?> </p>
                </div>
              </div><!-- row -->
              <div class="row mg-t-20">
              <h5 class="card-body-title col-sm-4">Phone Number: </h6>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <p class="form-control"><?php echo e($user->phone); ?> </p>
                </div>
              </div><!-- row -->
            </div>
					
       

            
             
              <div class="form-layout-footer mg-t-30">
                <button class="btn btn-info mg-r-5"><a href="<?php echo e(route('technician.profile.edit')); ?>">Edit Profile</button>
              </div><!-- form-layout-footer -->
            </div><!-- card -->
          </div><!-- col-6 -->

          <!-- END CONTENT -->


          <!--footer-->
<footer class="sl-footer">
        <div class="footer-left">
          <div class="mg-b-2">Copyright &copy; 2021. PSM MS. All Rights Reserved.</div>
          <div>Made by AisBatuCampur.</div>
        </div>
        <div class="footer-right d-flex align-items-center">
          <span class="tx-uppercase mg-r-10">Share:</span>
          <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/starlight"><i class="fa fa-facebook tx-20"></i></a>
          <a target="_blank" class="pd-x-5" href="https://twitter.com/home?status=Starlight,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/starlight"><i class="fa fa-twitter tx-20"></i></a>
        </div>
      </footer>
      <!--end footer-->


        
      </div><!-- sl-pagebody -->
      

      </div><!-- sl-pagebody -->
      
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('technician.tech_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Documents\GitHub\Laravel_PSM\resources\views/technician/profile/profile_view.blade.php ENDPATH**/ ?>