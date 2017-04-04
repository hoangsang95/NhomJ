 
  <?php $__env->startSection('content'); ?>
<div id="page-wrapper">
            <div class="container-fluid">
                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Người dùng
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <?php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($err); ?><br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </div>
                        <?php endif; ?>
                        
                        <?php if(session('thongbao')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('thongbao')); ?>

                        </div>
                        <?php endif; ?>
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="quanly/user/sua/<?php echo e($r->id); ?>" method="POST">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                            <div class="form-group">
                                <label>Tên người dùng</label>
                                <input class="form-control" name="name" placeholder="Tên người dùng" value="<?php echo e($r->name); ?>" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo e($r->email); ?>" readonly=""/>
                            </div>
                           
                            <div class="form-group">
                                <input type="checkbox" name="changePassword" id="changePassword"/>
                                <label>Đổi mật khẩu</label>
                                  
                                <input class="form-control password"  type="password" name="password" placeholder="Mật khẩu" disabled="" value="<?php echo e($r->password); ?>"/>
                            </div>
                           <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input class="form-control password" type="password" name="repassword" placeholder="Nhập lại mật khẩu" disabled="" value="<?php echo e($r->password); ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Quyền</label>
                                <label class="radio-inline">
                                    <input name="admin" value="0"   type="radio" 
                                            <?php if($r->admin ==0): ?>
                                           <?php echo e("checked"); ?>

                                           <?php endif; ?>
                                           >Người dùng
                                </label>
                                <label class="radio-inline">
                                    <input name="admin" value="1" type="radio"
                                             <?php if($r->admin ==1): ?>
                                           <?php echo e("checked"); ?>

                                           <?php endif; ?>
                                           >Quản trị
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Xóa trắng</button>
                        <form>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
 <?php $__env->stopSection(); ?>
 
 <?php $__env->startSection('script'); ?>
     <script>
         $(document).ready(function(){
              $("#changePassword").change(function(){
                  if($(this).is(":checked"))
                      {
                     $(".password").removeAttr('disabled');
                 }
                   else
                 {
                      $(".password").attr('disabled','');
                 }
              });
         });   
     </script>
 <?php $__env->stopSection(); ?>
 
  
                 
                  
<?php echo $__env->make('layouts.quanly.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>