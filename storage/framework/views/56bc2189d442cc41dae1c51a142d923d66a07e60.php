
<?php $__env->startSection('technician'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">PSM MS</a>
        <span class="breadcrumb-item active">Dashboard</span>
      </nav>

      <div class="sl-pagebody">
        <!-- CONTENT -->

        <form method="post" action="<?php echo e(route('technician.profile.store')); ?>" enctype="multipart/form-data">
	 	<?php echo csrf_field(); ?>
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">

          <!--tab-->
          <div class="pd-10 bg-gray-300 mg-t-20">
					
                <h6 class="card-body-title">Technician Profile</h6>
              <div class="mg-b-20 mg-sm-b-30">
                <img id="showImage" class="card-img-top img-fluid" src="<?php echo e((!empty($editData->image))? url('dashboard/img/profile_img/'.$editData->image):url('dashboard/img/img12.jpg')); ?>" alt="<?php echo e($editData->name); ?>" style="width: 15%; height: 15%;">
                <input type="file" name="image" class="form-control" id="image" style="width:15%" >
              </div>
              <div class="row mg-t-20">
              <h5 class="card-body-title col-sm-4">Full Name: </h6>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input class="form-control" type="text" name="name" value="<?php echo e($editData->name); ?>" required="" >
                </div>
              </div><!-- row -->
              <div class="row mg-t-20">
              <h5 class="card-body-title col-sm-4">Staff ID: </h6>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input class="form-control" type="text" name="staffID" value="<?php echo e($editData->staffID); ?>" required="" >
                </div>
              </div><!-- row -->
              <div class="row mg-t-20">
              <h5 class="card-body-title col-sm-4">Email Address: </h6>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input class="form-control" type="email" name="email" value="<?php echo e($editData->email); ?>" required="" >
                </div>
              </div><!-- row -->
              <div class="row mg-t-20">
              <h5 class="card-body-title col-sm-4">Phone Number: </h6>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input class="form-control" type="text" name="phone" value="<?php echo e($editData->phone); ?>" required="" >
                </div>
              </div><!-- row -->
              
              </div>

              <div class="form-layout-footer mg-t-30">
                <button class="btn btn-info mg-r-5">Update Profile</button>
              </div><!-- form-layout-footer -->
            </div><!-- card -->
          </div><!-- col-6 -->
</form>

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

        <!-- END CONTENT -->
      </div><!-- sl-pagebody -->
     

      </div><!-- sl-pagebody -->
      
    </div>

    <script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('technician.tech_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Documents\GitHub\Laravel_PSM\resources\views/technician/profile/profile_edit.blade.php ENDPATH**/ ?>