<?php
	defined('_JEXEC') or die;
	/* As usual we have the defined or die statement at the top to prevent direct access. */
?>

<div class="latestextensions<?php echo $moduleclass_sfx ?>">
<!-- We then wrap the module output in a div tag, and this is where we are using the $module_class_suffix 
parameter that we loaded through our main PHP file. -->


        <div class="row-striped">
        	<?php foreach ($list as $item) : ?>
        		<div class="row-fluid">
                
        			<div class="span6">
       				 <strong class="row-title">
       					 <?php echo $item->name; ?>
       				 </strong>
       				</div>
                    <div class="span3">
                     	<?php echo $item->type; ?>
                    </div>
                    <div class="span3">
                        <?php echo $item->id; ?>
                    </div>
                
        	  </div>
        <?php endforeach; ?>
        
        </div>
   </div>