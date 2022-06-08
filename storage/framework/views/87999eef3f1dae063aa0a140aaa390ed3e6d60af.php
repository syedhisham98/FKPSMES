
<?php $__env->startSection('lecturer'); ?>

<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">PSM MS</a>
        <span class="breadcrumb-item active">Dashboard</span>
      </nav>

      <div class="sl-pagebody">

 <!-- CONTENT -->

 <div class="card pd-20 pd-sm-40 form-layout form-layout-4"><!--start border-->
 <h2>Teaching Information</h2>
 <div class="col-sm-6 col-md-1 mg-t-0 mg-md-t-0">
              <a href="<?php echo e(route('lecturer.teaching.add')); ?>" style="float: right" class="btn btn-rounded btn-info mg-r-5"> Add Teaching</a>
</div>

          <div class="box-body">
					<!-- Nav tabs -->
					
					<!-- Tab panes -->
							<div class="p-15">
								
        <div class="table-wrapper" style="padding-top:2%;"><!--start table Teaching-->
            <div id="datatable2_wrapper" class="dataTables_wrapper no-footer">
                <table id="datatable2" class="table display responsive nowrap dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable2_info" style="width: 1531px;">
              <thead>
                <tr role="row">
                    <th class="wd-15p sorting_asc" style="width:1%" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1"  aria-label="No: activate to sort column descending" aria-sort="ascending">No</th>
                    <th class="wd-15p sorting" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1"  aria-label="Code: activate to sort column ascending">Code</th>
                    <th class="wd-15p sorting" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1"  aria-label="Code: activate to sort column ascending">Subject</th>
                    <th class="wd-20p sorting" tabindex="0" aria-controls="datatable2" rowspan="1" colspan="1"  aria-label="Subject: activate to sort column ascending">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php $__currentLoopData = $allData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $teach): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr role="row" class="odd">
                  <td tabindex="0" class="sorting_1"><?php echo e($key+1); ?></td>
                  <td><?php echo e($teach->code); ?></td>
                  <td><?php echo e($teach->subject); ?></td>
                  <td><a href="<?php echo e(route('lecturer.teaching.delete',$teach->id)); ?>" class="btn btn-danger" id="delete">Delete</a></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- <tr role="row" class="even">
                  <td class="sorting_1" tabindex="0">Angelica</td>
                  <td>Ramos</td>
                  <td>Chief Executive Officer</td>
                </tr> -->
            </table>
        </div>
          </div><!--end table-->

                        </div>
				</div>


<!--end tab-->



          </div><!--End border col-6 -->
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
<?php echo $__env->make('lecturer.lect_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UMP\Degree\SEM6\SOFTWARE ENGINEERING PRACTICE\Laravel_PSM\resources\views/lecturer/expertise/teaching_view.blade.php ENDPATH**/ ?>