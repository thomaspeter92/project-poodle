<?php $title= "contactPage"?>
<?php ob_start(); ?>
<div class="contactPage1">
    <h1><strong>Get in touch</strong></h1>
    <div class="topContent">
        <a href="mailto: petventure@petventure.com">
            <div class="contactPageEmail">
                <div class="circle"><h2><i class="far fa-envelope"></i></h2></div>
                <div class="contactEmail">
                    <h2>EMAIL</h2>
                    <p>petventure@petventure.com</p>
                </div>
            </div>
        </a>
        <div class="contactPageNumber">
            <div class="circle"> <h2><i class="fas fa-phone"></i></h2> </div>
            <div class="phoneNumber">
                <h2>PHONE</h2>
                <p>+82 010 1234 5678</p>
            </div>
        </div>
        <div class="contactPageFax">
            <div class="circle"> <h2><i class="fas fa-fax"></i></h2> </div>
            <div class="faxNumber">
                <h2>FAX</h2>
                <p>+82 010 1234 5678</p>
            </div>
        </div>
    </div>
</div>
<div class="contactMiddle">
    <div class="contactMiddleText">
        <p>LET US KNOW</p>
        <h1>WHAT YOU THINK</h1>
        <p class="contactDivider"></p>
    </div>
    
   
</div>


<div class="contactPageHeadquarters">
    <!-- <h1>HEADQUARTERS : </h1> -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3164.038753844758!2d126.96982341491137!3d37.530583733944795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357ca4068869c845%3A0xd50d67ce84380ab!2swcoding!5e0!3m2!1sen!2skr!4v1604890590704!5m2!1sen!2skr" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>

<?php
$content = ob_get_clean();
require("template.php");
?>