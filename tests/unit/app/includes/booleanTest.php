<?php
use PHPUnit\Framework\TestCase;
include "app/includes/boolean.php";
include "app/includes/api_fetch.php";

/**
 * booleanTest
 * 
 */
class booleanTest extends TestCase
{
    public function testTryWithAnInteger1()
    {
        
        //Passing 1 to Yes function expecting 1 back.
        $i = 1;
        $yesno = yes($i);
        $this->assertEquals(1, $yesno );
    }
    public function testTryWithAnInteger0()
    {
        
        //Passing 0 to Yes function expecting 0 back.
        $i = 0;
        $yesno = yes($i);
        $this->assertEquals(0, $yesno );
    }
    public function testTryWithAnFloat1()
    {
        
        //Passing 1.00000 to Yes function expecting 1 back.
        $i = 1.00000;
        $yesno = yes($i);
        $this->assertEquals(1, $yesno );
    }
    public function testTryWithAnInvalidFloat()
    {
        
        //Passing 1.0011 to Yes function expecting 1 back.
        $i = 1.0011;
        $yesno = yes($i);
        $this->assertEquals(1, $yesno );
    }
    public function testTryWithAFloat0()
    {
        
        //Passing 0.0000000 to Yes function expecting 0 back.
        $i = 0.0000000;
        $yesno = yes($i);
        $this->assertEquals(0, $yesno );
    }
    public function testTryWithAString1()
    {   
        //Trying a string
        $yesno = yes("1");
        $this->assertEquals(1, $yesno );
    }
    public function testTryWithAString0()
    {   
        //Trying a string
        $yesno = yes("0");
        //Expecting numeric 0 as this function yes evaluates strings conversion
        $this->assertEquals(0, $yesno );
    }

    public function testTryWithAnArray1()
    {

        $arr = array(1);
        $yesno = yes($arr[0]);

        $this->assertEquals(1, $yesno);
    }
    public function testTryWithAnArray0()
    {

        $arr = array(0);
        $yesno = yes($arr[0]);

        $this->assertEquals(0, $yesno);
    }

    public function testTryWithJsonObject1()
    {
        //Valid Json 1 expecting 1
        $json = '{"boolean": 1}';
        $obj = json_decode($json);
        if (isset($obj->boolean)){
            $yesno = yes($obj->boolean);
            $this->assertEquals(1, $yesno );
        }
    }
    public function testTryWithJsonObject0()
    {
        // Valid Json 0 expecting 0
        $json = '{"boolean": 0}';
        $obj = json_decode($json);
        if (isset($obj->boolean)){
            $yesno = yes($obj->boolean);
            $this->assertEquals(0, $yesno );
        }
    }
    public function testTryWithJsonObjectNoValueCatchError()
    {
        //Invalid Json - expecting error
        $json = '{"boolean": }';
        $obj = json_decode($json);
        if (isset($obj->boolean)){
            $yesno = yes($obj->boolean);
        }
        else 
        {
          //catch undefined/empty/null error
          $yesno = 'error';
            
        }
        $this->assertEquals('error', $yesno );
    }       
    /**
     * testTryInvalidJsonCatchesError
     * 
     * Uses the Yes function to test the boolean value
     * If the value is not yes or no it indicates an error
     * 
     * @return void
     */
    public function testTryInvalidJsonCatchesError()
    {
    $json = '{"errorcode":0,"site_id":"1","ap_active":"1","ap_menu_tab_txt":"","ap_header":"This is the Page Headers","ap_header_bg":"#FFFFFF","ap_header_bg_display":"1","ap_header_btn_txt":"This Text","ap_header_btn_url":"This URL","ap_header_img":"https:\/\/bdmdatafeeds.com\/uploads\/thu_1598446646header_2.png","ap_hero":"1","ap_announcement":"About Announcement","ap_heading_1":"About Page Header 1","ap_img_1":"https:\/\/bdmdatafeeds.com\/uploads\/thu_1598623434george-2.png","ap_img_alt_1":"","ap_img_pos_1":"left","ap_txt_1":"
        The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum<\/strong>\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham. 1233<\/p>","ap_heading_2":"Many Variations","ap_img_2":"https:\/\/bdmdatafeeds.com\/uploads\/thu_1598623529accounting.png","ap_img_alt_2":"","ap_img_pos_2":"right","ap_txt_2":"
        
        There are many variations of passages of Lorem Ipsum available<\/strong>, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.<\/p>\r\n
        
        All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words<\/strong>, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.<\/p>","ap_heading_3":"Long Establshed","ap_img_3":"https:\/\/bdmdatafeeds.com\/uploads\/thu_1598623592whale-watching.png","ap_img_alt_3":"","ap_img_pos_3":"","ap_txt_3":"
        
        It is a long established fact<\/strong> that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.<\/p>\r\n
        
        Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\'<\/strong> will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<\/p>","ap_meta_title":"About Page Meta Title","ap_meta_description":"About Page Meta Description","ap_meta_keywords":"about us, our company"}';
    $obj = json_decode($json);
    if (isset($obj->ap_active))
    {
        $yesno = yes($obj->ap_active);    
    }
    else 
    {
        $yesno = 'error';
        // $yesno = "Error";
        //$error = json_last_error_msg(); returns error message for checking
    }
    $this->assertEquals("error", $yesno );
    }
    public function testTryValidApiJson()
    {
    $json = '{"errorcode":0,"mp_verify":"1","mp_company_name":"Business Direct Media","mp_menu_tab_txt":"Company Name","mp_anouncement":"","mp_announcement_bg_color":"#17A2B8","mp_hero_header":"The Plumbing Guys","mp_hero_header_bg_color":"#17A2B8","mp_hero_header_bg_display":"1","mp_header_img":"https://bdmdatafeeds.com/uploads/thu_1598367458plumbing-header.png","mp_logo":"https://bdmdatafeeds.com/images/plumber-logo.png","mp_hero_logo_width":"17","mp_hero_logo_display":"1","mp_hero":"1","mp_hero_btn_txt":"Get the Personal Touch","mp_hero_btn_url":"https://google.co.za","mp_splash_img":"https://bdmdatafeeds.com/uploads/thu_1599033769plumber-new-taps.png","mp_body_header_1":"Best Team Available","mp_body_1":"We know how important the personal touch is to you and your business. For this reason we have a well trained team","mp_img_1":"https://bdmdatafeeds.com/images/plumber.jpg","mp_img_pos_1":"left","mp_img_alt_txt_1":"plumbing, plumbers, find a plumber","mp_img_1_rounded":"0","mp_img_1_shadow":"0","mp_body_header_2":"Plumbing Services","mp_body_2":"<p>The Plumbing Guys has been servicing the Johannesburg Community since 1971. With the expansion of our new factory and service teams we are now also servicing the Pretoria areas.\u00a0We have lots of experience in our Service Team to fix any plumbing problem, no matter how big or small. We specialize in Industrial applications but also cater for the Commercial and Residential Markets.</p>\r\n<p>Wheter you have a broken pipe at home or you want to install a new solar system for your factory, we have you back. <strong>Call the Plumbing Guys on 012 345 6789</strong></p>","mp_img_2":"https://bdmdatafeeds.com/images/plumber-2.jpg","mp_img_pos_2":"left","mp_img_alt_txt_2":"Plumbing Services","mp_img_2_rounded":"0","mp_img_2_shadow":"1","mp_body_header_3":"Industrial Plumbing Solutions","mp_body_3":"<p>Industrial Plumbing Solutions for your site is at the forefront of our thinking. With more than 10 experienced Industrial plumbers on our team, we can react to your needs and emergencies at any moment. Our Emergency reaction team is always available.</p>\r\n<p>If you are thinking about expanding your operations, then let us help you with your plumbing planning. Our development team has special expertise in the development of Industrial plumbing systems.</p>\r\n<p>We also specialize in energy and water saving systems that can save you thousands of rands per month.</p>","mp_img_3":"https://bdmdatafeeds.com/images/plumber-3.jpg","mp_img_pos_3":"right","mp_img_alt_txt_3":"Industrial Plumbing Solutions","mp_img_3_rounded":"1","mp_img_3_shadow":"2","mp_meta_title":"https://paymenttrack.co.za/contact.php","mp_meta_description":"Plumbing Guys","mp_meta_keywords":"Plumbing Guys where we do plumbing and plumbing repairs better than our Competition"}';
    $obj = json_decode($json);
    $yesno = yes($obj->mp_verify);    

    $this->assertEquals(1, $yesno );
    }
    
}