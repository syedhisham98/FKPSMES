
<?php $__env->startSection('student'); ?>

<link href="<?php echo e(URL::asset('css/button.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('css/table.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('css/tab.css')); ?>" rel="stylesheet">
<body onload="document.getElementById('defaultOpen').click();">
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
  
}
document.getElementById("defaultOpen").click();
</script>

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">PSM MS</a>
        <span class="breadcrumb-item active">LECTERUR LIST</span>
    </nav>

    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
      

  <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')"id="defaultOpen">LECTURER LIST</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">PROPOSAL STATUS</button>
</div>
 <?php
	$lects = DB::select('select * from users where role = "lecturer"');
  $status = DB::table('proposal')->where('student', '=', $user->id) ->get();
?>
<div id="London" class="tabcontent">
  <table>
 

  <tr>
    <th>Lecterur Name</th>
    <th>Setting</th>
    
  </tr>
<?php $__currentLoopData = $lects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td><a href="<?php echo e(route('svhunting.view',['lect' => $p->id])); ?>"><?php echo e($p->name); ?></a></td>
<td><a href="<?php echo e(route('svhunting.form',['lect' => $p->id])); ?>"><button class="button button1">REQUEST</button></a></td>

</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


</table>
</div>
<div id="Paris" class="tabcontent">
<table>
 

 <tr>
   <th>Lecterur Name</th>
   <th>Status</th>
   <th>Current Proposal</th>
   <th>ACTION</th>
   
 </tr>
<?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td><a href=""><?php echo e($d->lecterur); ?></a></td>
<td><a><?php echo e($d->status); ?></a></td>
<td><a href="<?php echo e(route('svhunting.download',['lect' => $d->lecterur])); ?>" download="<?php echo e($d->file); ?>"><?php echo e($d->file); ?></a></td>
<td>
<a href="<?php echo e(route('svhunting.update',['lect' => $d->lecterur])); ?>"><button class="button button1">Edit</button></a><br>
<a href="<?php echo e(route('svhunting.delete',['lect' => $d->lecterur])); ?>"><button class="button button1">Delete</button></a></td>

</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


</table>
</div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student.stud_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Documents\GitHub\Laravel_PSM\resources\views/student/svhunting/svhunting_list.blade.php ENDPATH**/ ?>