<!DOCTYPE html>
<html>


         <?php echo $__env->make('module.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>   
	


	
	
<body class="option6">
<!-- HEADER -->
<div id="header" class="header">
    
    <!-- MAIN HEADER -->
    
     <?php echo $__env->make('module.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>   
	
	
	
          <?php echo $__env->make('module.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>   
	
    <!-- END MANIN HEADER -->
    
</div>
<!-- end header -->
<!-- Home slideder-->

         <?php echo $__env->make('module.homeslider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>   
	



         <?php echo $__env->make('module.content_hotdeal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>   
	




<!---->

  <?php echo $__env->make('module.content_1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>   
	




  <?php echo $__env->make('module.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>   
	



<!-- Footer -->


<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
	
	
        <?php echo $__env->make('module.js_v', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>   
	
	
	
</body></html>