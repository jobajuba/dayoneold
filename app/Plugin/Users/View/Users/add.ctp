<?php 
 
echo $this->element("breadcrame",array('breadcrumbs'=>
	array('Registration'=>'Sign Up'))
	);
$default = "2";
if($this->Session->check("type")){
	if($this->Session->read("type")=='tutor'){
		$default = "2";
	}else if($this->Session->read("type")=='student'){
		$default = "3";
	}
}

  
	echo $this->Html->script(array( '/croogo/js/autocomplete/jquery-1.9.1',
			'/croogo/js/autocomplete/jquery.ui.core','/croogo/js/autocomplete/jquery.ui.widget','/croogo/js/autocomplete/jquery.ui.position','/croogo/js/autocomplete/jquery.ui.menu','/croogo/js/autocomplete/jquery.ui.autocomplete',
			));
 
 echo $this->Html->css(array(
			'/croogo/css/autocomplete/themes/base/jquery.ui.all', '/croogo/css/autocomplete/demos', 
		));
?>

<script>
	$(function() {
		 
		function split( val ) {
			return val.split( /,\s*/ );
		}
		function extractLast( term ) {
			return split( term ).pop();
		}

		$( "#UserSubject" )
			// don't navigate away from the field on tab when selecting an item
			.bind( "keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.TAB &&
						$( this ).data( "ui-autocomplete" ).menu.active ) {
					event.preventDefault();
				}
			})
			.autocomplete({
				source: function( request, response ) {
					$.getJSON( "/botangle/subject/search", {
						term: extractLast( request.term )
					}, response );
				},
				search: function() {
					// custom minLength
					var term = extractLast( this.value );
					if ( term.length < 2 ) {
						return false;
					}
				},
				focus: function() {
					// prevent value inserted on focus
					return false;
				},
				select: function( event, ui ) {
					var terms = split( this.value );
					// remove the current input
					terms.pop();
					// add the selected item
					terms.push( ui.item.value );
					// add placeholder to get the comma-and-space at the end
					terms.push( "" );
					this.value = terms.join( ", " );
					return false;
				}
			});
	});
	</script>
<style>
.security {background-image:url(images/password-security.jpg)}
.weak{height:10px; width:30px}
.weak1{height:10px; width:60px}
.Good{height:10px; width:120px}
.Strong{height:10px; width:260px}

</style>
<div id="main-content">
  <div class="container">
    <div class="row-fluid">
      <div class="span12">
        <h2 class="page-title"><?php echo __("Botangle Sign Up")?></h2>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span9 PageLeft-Block">
        <p class="FontStyle20"><?php echo __("Create your Botangle Account")?></p>
        <p><?php echo __("It only takes a few minutes to register with Botangle and you get amazing features! Fill out the information below!")?> </p>
		
		<?php if($default==2){ ?>
        <div class="Signup"> 
          <?php echo $this->Form->create('User',array('class'=>'form-horizontal'));?>
            <div class="control-group">
              <label class="control-label">I am a...:</label>
              <div class="controls">
                
                <?php 
				$default = "2";
			if($this->Session->check("type")){
				if($this->Session->read("type")=='tutor'){
					$default = "2";
				}else if($this->Session->read("type")=='student'){
					$default = "4";
				}
			}
			 
 
			$options = array('2' => 'Tutor','4' => ' Student');
			$attributes = array('legend' => false,'checked' => $default,'value'=>$default,
			'onclick'=>'update(this.value)',
			'label' => array(
        'class' => 'radio inline','style'=>'padding-left:1px;padding-right:10px'));
			echo $this->Form->radio('role_id', $options, $attributes);?>
                </div>
             
              <div class="control-group">
                <label class="control-label" for="postalAddress">Subject:</label>
                <div class="controls">
                <?php echo $this->Form->textarea('subject',array('class'=>'textarea','placeholder'=>'type your subjects','rows'=>3));?>
                  
                  <br>
                  <span class="FontStyle11"><em><?php echo __("Separate Subjects with commas")?></em></span> </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="firstName"><?php echo __("First Name:")?></label>
                <div class="controls">
           <?php echo $this->Form->input('username',array('class'=>'textbox','placeholder'=>"First Name",'label' => false));?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="lastName"><?php echo __("Last Name:")?></label>
                <div class="controls">
                <?php echo $this->Form->input('name',array('class'=>'textbox','placeholder'=>"Last Name",'label' => false));?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputEmail"><?php echo __("Email Address:")?></label>
                <div class="controls">
                 <?php echo $this->Form->input('email',array('class'=>'textbox','placeholder'=>"email@email.com",'label' => false));?>
                
                 
                </div>
              </div>
               <div id="signupTuter">
              <div class="control-group">
                <label class="control-label" for="postalAddress"><?php echo __("Qualification:")?></label>
                <div class="controls">
               <?php echo $this->Form->textarea('qualification',array('class'=>'textarea','placeholder'=>"type your Qualification"));?>
                
                 </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="postalAddress"><?php echo __("Teaching Experience:")?></label>
                <div class="controls">
                <?php echo $this->Form->textarea('teaching_experience',array('class'=>'textarea','placeholder'=>"Teaching Experience"));?>
                 
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="postalAddress"><?php echo __("Extracurricular Interests:")?></label>
                <div class="controls">
                 <?php echo $this->Form->textarea('extracurricular_interests',array('class'=>'textarea','placeholder'=>"Extracurricular Interests"));?>
                 
                </div>
              </div>
			  <div class="control-group">
                <label class="control-label" for="inputEmail"><?php echo __("Other experience:")?></label>
                <div class="controls">
                 <?php echo $this->Form->input('other_experience',array('class'=>'textbox','placeholder'=>"English with a Concentration in Theater",'label' => false));?>
                
                 
                </div>
              </div>
			  <div class="control-group">
                <label class="control-label" for="inputEmail"><?php echo __("University:")?></label>
                <div class="controls">
                 <?php echo $this->Form->input('university',array('class'=>'textbox','placeholder'=>"Barnard/University, Class of 2013",'label' => false));?>
                
                 
                </div>
              </div>
			   <div class="control-group">
                <label class="control-label" for="postalAddress"><?php echo __("Expertise in (Subject)")?>:</label>
                <div class="controls">
                 <?php echo $this->Form->textarea('expertise',array('class'=>'textarea','placeholder'=>"Top Subjects"));?>
                 
                </div>
              </div>
              </div>
              
              <p><strong><?php echo __("Account Information:")?></strong></p>
              <div class="control-group">
                <label class="control-label" for="inputPassword"><?php echo __("Password:")?></label>
                <div class="controls">
                <?php echo $this->Form->input('password',array('class'=>'textbox','placeholder'=>"Password",'label' => false));?></div>
                <div class="controls">
                <div class="password-security" id="result" style="width:269px; height:10px;">
					<div class="security"></div>
                  <?php echo __("Level of Security")?></div>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="confirmPassword"><?php echo __("Confirm Password:")?></label>
                <div class="controls">
                  <?php echo $this->Form->input('verify_password',array('type'=>'password','class'=>'textbox','placeholder'=>"Confirm Password",'label' => false));?>
                 </div>
              </div>
              
            </div>
            <div class="control-group">
              <div class="controls">
                <label class="checkbox">
                  
				  <?php echo $this->Form->checkbox('terms', array('hiddenField' => false));?>
                  <?php echo __("I agree with Botangle's <a href='#'>Terms of Use and Privacy Policy.</a>")?>.</label>
              </div>
            </div>
            <div class="control-group form-actions">
            <?php 
			echo $this->Form->button('Create My Account', array('type' => 'submit','class'=>'btn btn-primary')); 
			echo $this->Form->button('Reset', array('type' => 'reset','class'=>'btn btn-reset'));?>
		
            </div>
         <?php echo $this->Form->end();?>
        </div>
        <? } else if($default==3){ ?>
		  <div class="Signup">
         
         <?php echo $this->Form->create('User',array('class'=>'form-horizontal'));?>
            <div class="control-group">
              <label class="control-label"><?php echo __("I am a...:")?></label>
              <div class="controls">
                <?php 
				$default = "2";
			if($this->Session->check("type")){
				if($this->Session->read("type")=='tutor'){
					$default = "2";
				}else if($this->Session->read("type")=='student'){
					$default = "3";
				}
			}
			 
 
			$options = array('2' => 'Tutor','3' => ' Student');
			$attributes = array('legend' => false,'checked' => $default,'value'=>$default,
			'onclick'=>'update(this.value)',
			'label' => array(
        'class' => 'radio inline','style'=>'padding-left:1px;padding-right:10px'));
			echo $this->Form->radio('role_id', $options, $attributes);?>
              </div>
               <div class="control-group">
                <label class="control-label" for="inputEmail"><?php echo __("Email Address:")?></label>
                <div class="controls">
                   <?php echo $this->Form->input('email',array('class'=>'textbox','placeholder'=>"email@email.com",'label' => false));?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="firstName"><?php echo __("First Name:")?></label>
                <div class="controls">
                  <?php echo $this->Form->input('username',array('class'=>'textbox','placeholder'=>"First Name",'label' => false));?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="lastName"><?php echo __("Last Name:")?></label>
                <div class="controls">
                 <?php echo $this->Form->input('name',array('class'=>'textbox','placeholder'=>"Last Name",'label' => false));?>
                </div>
              </div>
             
           
              <p><strong><?php echo __("Account Information:")?></strong></p>
              <div class="control-group">
                <label class="control-label" for="inputPassword"><?php echo __("Password:")?></label>
                <div class="controls">
                  <?php echo $this->Form->input('password',array('class'=>'textbox','placeholder'=>"Password",'label' => false));?>
                </div>
                <div class="controls">
                <div class="password-security" id="result" style="width:269px; height:10px;">
					<div class="security"></div>
                  <?php echo __("Level of Security")?></div>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="confirmPassword"><?php echo __("Confirm Password:")?></label>
                <div class="controls">
                   <?php echo $this->Form->input('verify_password',array('type'=>'password','class'=>'textbox','placeholder'=>"Confirm Password",'label' => false));?>
                </div>
              </div>
            </div>
            <div class="control-group">
              <div class="controls">
               <label class="checkbox">
                  
				  <?php echo $this->Form->checkbox('terms', array('hiddenField' => false));?>
                  <?php echo __("I agree with Botangle's <a href='#'>Terms of Use and Privacy Policy.</a>.")?></label>
              </div>
            </div>
            <div class="control-group form-actions">
              <?php 
			echo $this->Form->button('Create My Account', array('type' => 'submit','class'=>'btn btn-primary')); 
			echo $this->Form->button('Reset', array('type' => 'reset','class'=>'btn btn-reset'));?>
            </div>
         <?php echo $this->Form->end();?>
        </div>
      
	  
		
		<? } ?>
      </div>
      <div class="span3 PageRight-Block">
       <p class="FontStyle20"><?php echo __("Already a member?")?> <?php echo __("Sign In here") ?></p>
        <p><?php echo __("Click here to sign In in the Botangle !")?> </p><br>
<br>
<?php 
echo $this->Html->link(__("Sign In"), array('action'=> 'login'), array( 'class' => 'btn btn-primary'))
/*
<button type="submit" class="btn btn-primary">Sign In</button> */
?>
      </div>
    </div>
    
       	<?php  	echo $this->element('getintouch'); ?>
				
    </div>
  <!-- @end .container --> 
</div>

 <?php 
  echo $this->Html->scriptBlock(
    'var $j = jQuery.noConflict();
	function update(value){
	var type= "tutor";
		if(value==2){
			type="tutor";
		}else if(value==4){
			type="student"
		}
		location.href= "'.$this->webroot.'registration/"+type;
	};
	jQuery(document).ready(function(){ 
		 jQuery("#UserPassword").keyup(function(){
		 
			jQuery(".security").addClass(checkStrength(jQuery("#UserPassword").val()))
		})
		function checkStrength(password){
			var strength = 0
			if (password.length < 6) {
				return "weak";			
			}
			if (password.length > 7) strength += 1
			if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))  strength += 1
			if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))  strength += 1
			if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  strength += 1
			if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
			if (strength < 2 ){
				return "weak1"
			}
			else if (strength == 2 ){
				return "Good"
			}
			else{
				return "Strong";
			}
		}
	})
	',
    array('inline' => false)
);
 
  