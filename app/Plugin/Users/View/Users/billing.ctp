<!--Wrapper HomeServices Block Start Here-->
<?php echo $this->element("breadcrame",array('breadcrumbs'=>
	array('My Dashboard'=>'My Billing'))
	);?>

<!--Wrapper main-content Block Start Here-->
<div id="main-content">
  <div class="container">
    <div class="row-fluid">
      <div class="span12">
        
      </div>
    </div>
    <div class="row-fluid">
  <?php echo $this->Element("myaccountleft") ?> 
      <div class="span9">
      <h2 class="page-title"><?php echo __("Billing")?></h2>
      <div class="StaticPageRight-Block">
      <div class="PageLeft-Block">
      
      <div class="row-fluid Add-Payment-blocks">
        <div class="span12">
          <p class="FontStyle20 color1"><?php echo __("Payment Type:")?></p>
          </div>
          
          <?php 
		 $this->request->data = $this->Session->read("Auth.User");
		 
		 echo $this->Form->create('UserRate',array('class'=>'form-horizontal'));
		
			echo $this->Form->input('id',array('value'=>isset($ratedata['UserRate']['id'])?$ratedata['UserRate']['id']:"",'type'=>'hidden'));
			 echo $this->Form->input('userid',array('value'=>$this->request->data['id'],'type'=>'hidden'));
			 $pchecked = "checked='checked'";
			 $phchecked= "";
			 if($ratedata['UserRate']['price_type'] == 'permin'){
				$pchecked = "checked='checked'";
			 }
			 if($ratedata['UserRate']['price_type'] == 'permin'){
				$phchecked = "checked='checked'";
				$pchecked = "";
			 }
			 $rate = ($ratedata['UserRate']['rate'])?$ratedata['UserRate']['rate']:"";
		 ?>
            <div class="control-group">
              <label class="control-label span5"><?php echo __("Rate:")?></label>
              <div class="controls">
                <label class="radio inline span4">
                  <input type="radio" name="data[UserRate][price_type]" value="permin"  <?php echo $phchecked?>>
                  Per Minute Price </label>
                <label class="radio inline span4 mar0">
                  <input type="radio" name="data[UserRate][price_type]" value="perhour" <?php echo $pchecked?>>
                  Per Hour Price </label>
              </div>
              <div class="control-group">
               <label class="control-label span5" for="rate">&nbsp;</label>
                <div class="controls span5">
				<?php echo $this->Form->input('rate',array('class'=>'textbox','placeholder'=>"rate",'label' => false,'value'=>$rate,'type'=>'text'));?>
                   
                  </div>
              </div>
          </div>
          
          
        <div class="row-fluid Add-Payment-blocks">
        <div class="span5">
          
          </div>
          <div class="span5">
          <button type="submit" class="btn btn-primary">Update</button>
          </div>
          </div>
       <!-- <div class="row-fluid Add-Payment-blocks">
        <div class="span5">
          <p class="FontStyle20 color1">Add Your Payment Method:</p>
          </div>
          <div class="span5">
          <button type="submit" class="btn btn-primary">Add a Payment Account</button>
          </div>
          </div>-->
         <?php echo $this->Form->end();?>

       <!--<div class="row-fluid Add-Payment-blocks">
        <div class="span5">
          <p class="FontStyle20 color1">Total Balance:</p>
          </div>
          <div class="span5">
          <p class="FontStyle20">Total Blanace: $1000</p>
          </div>
          </div>
          
          <div class="row-fluid payment-blocks">
        <div class="span5">
          &nbsp;
          </div>
          <div class="span5">
          <button type="submit" class="btn btn-primary">Withdrawal</button>
          </div>
          </div>
        -->
        
       </div>
   
        
        
        
       </div>
      </div>
      </div>
    </div>
    <!-- @end .row --> 
    
 
    
    
    
  </div>
  <!-- @end .container --> 
</div>
<!--Wrapper main-content Block End Here-->  