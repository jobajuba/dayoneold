<!--Wrapper HomeServices Block Start Here-->
 
<?php 
 
echo $this->element("breadcrame",array('breadcrumbs'=>
	array('Popular Categories'=>'Popular Categories'))
	);
	
	?>
<!--Wrapper main-content Block Start Here-->
<div id="main-content">
  <div class="container">
    <div class="row-fluid">
      <div class="span12">
        <h2 class="page-title"></h2>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12 PageLeft-Block">
      <div class="search-box">
		 <?php echo $this->Form->create('Category',array('class'=>'form-inline form-horizontal',"role"=>"form"));
		     
			?>
      <div class="row-fluid"> 
      	<div class="span10"><input name="data[search]" type="text" class="textbox01" placeholder="Search"></div>
        <div class="span2">
		<?php
			echo $this->Form->button(__('Search'), array('type' => 'submit','class'=>'btn btn-primary btn-primary2')); 
			?>
     
        </div>
      </div>
	   <?php echo $this->Form->end();?>
      </div>
      
       <div class="row-fluid"> 
	   <?php  if(!empty($categories)){
				$i = 0;
					 
				foreach($categories['Category'] as $k=>$v){  
					echo '<div class="span3 Category-block">
					<div class="title01">'.$k.'</div> <ul>';
					foreach($v as $indx=>$value){
						echo '<li><a hrev="javascript:void(0)">'.$value.'</a></li>';
					  
					}
					echo '</ul></div>';
					$i++;
					if($i%4==0){
						echo '</div><div class="row-fluid">';
					}
				}
			 }
		?>
	   
    </div>
   
     
      </div>
      
    </div>
    <!-- @end .row --> 
    
	<?php echo $this->element('Croogo.getintouch'); ?>
    
  </div>
  <!-- @end .container --> 
</div>
<!--Wrapper main-content Block End Here--> 