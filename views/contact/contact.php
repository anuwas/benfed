<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Contact */
/* @var $form yii\widgets\ActiveForm */
?>
<section id="contact">
      <div class="container">
       <div class="row">
          <div class="col-lg-12 col-md-12"> 
          </div>
       </div>
       <div class="row">
       
       
        
         <div class="col-lg-6 col-md-6 col-sm-6">
           <div class="contact_address wow fadeInRight">
             <h3>Address</h3>
             <div class="address_group">
             
             <p><strong>The West Bengal State Co-operative Marketing Federation Ltd.</strong></p>
               <p>Southend Conclave, 3rd Floor,<br>1582 Rajdanga Main Road,<br> Kolkata - 700 107.</p><br>
               <p><strong>Phone:</strong> +91 33 2441 4366/67 </p><br>
               <p><strong>Fax:</strong> +91 33 2441-4372</p><br>
               <p><strong>Email:</strong> info@benfed.org</p>
               <!--<p class="brnch-id"><strong>Branch Email Ids :</strong> gma@benfed.org ,gmb@benfed.org , caao@benfed.org ,ridfcell@benfed.org , managerfertiliser@benfed.org ,managermarketing@benfed.org , managerinputs@benfed.org , manageraccounts@benfed.org , engineeringmechanical@benfed.org , engineeringcivil@benfed.org , consultantcivil@benfed.org , eshan@benfed.org , kgd@benfed.org , pankajdas@benfed.org , bgangopadhyay@benfed.org ,himadridas@benfed.org ,krishnendusingha@benfed.org ,mchatterjee@benfed.org ,barundas@benfed.org , personnelcell@benfed.org ,hoogly@benfed.org ,uttar24pgs@benfed.org ,dakshin24pgs@benfed.org ,coochbehar@benfed.org , malda@benfed.org , uttardinajpur@benfed.org ,dakshindinajpur@benfed.org , burdwan@benfed.org , purbamedinipur@benfed.org , paschimmedinipur@benfed.org , howrah@benfed.org , birbhum@benfed.org , jalpaiguri@benfed.org , siliguri@benfed.org , bankura@benfed.org , murshidabad@benfed.org ,nadia@benfed.org , purulia@benfed.org , tallyconsultant@benfed.org , subhraj@benfed.org , mmm@benfed.org , subhasisroy@benfed.org , bmodak@benfed.org ,dyms@benfed.org , md@benfed.org , debkumar@benfed.org ,  sanjaymula@benfed.org .</p>-->
          </div>
             
           </div>
         </div>
         
          <div class="col-lg-6 col-md-6 col-sm-6">
           <div class="contact_form wow fadeInLeft">
           <div style="color: red">
              <?php 
              if (isset($_REQUEST['status'])){
              	if($_REQUEST['status']=="success"){
              		echo 'Successfully Send';
              	}else{
              		echo 'Not Send, Please try again';
              	}
              }?>
</div>

    <?php $form = ActiveForm::begin(['options' => ['class' => 'submitphoto_form' ]]); ?>

    

   <input type="text" class="form-control " placeholder="Your name" id="contact-contact_name"  name="Contact[contact_name]">

    <input type="text" class="form-control " placeholder="Phone" id="contact-phone" name="Contact[phone]">

    <input type="mail" class="form-control " placeholder="Email address" id="contact-email"  name="Contact[email]">  

    <input type="text" class="form-control " placeholder="Subject" id="contact-subject"  name="Contact[subject]" >
    
    <select  class="form-control" required="true" id="contact-districtemail_id"  name="Contact[districtemail_id]">
                        <option>Select Branch</option>
                         <?php foreach ($districtemail as $values){?>
                         <option value="<?php echo $values->districtemail_id;?>"><?php echo $values->district_name;?></option>
                         <?php } ?>
                    </select>

    <textarea class="form-control" cols="30" rows="1" placeholder="What would you like to tell us" id="contact-message"  name="Contact[message]"></textarea>

    <input type="submit" value="Submit" class="wpcf7-submit">

    <?php ActiveForm::end(); ?>


           </div>
         </div> 
       </div>
      </div>
    </section>
    <!--=========== END CONTACT SECTION ================-->

    <!--=========== BEGIN GOOGLE MAP SECTION ================-->
    <section id="">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d117885.3760197289!2d88.3425251!3d22.58217!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1ea157d44f68e7ae!2sThe+West+Bengal+State+Co-operative+Marketing+Federation+Ltd.!5e0!3m2!1sen!2sin!4v1481102102855" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
    </section>