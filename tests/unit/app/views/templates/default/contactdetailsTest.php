<?php
include "app/views/templates/default/contactdetails.php";
use PHPUnit\Framework\TestCase;

class ContactDetailsTest extends TestCase{
    
    /**
     * testSupplyingEmptyFieldsReturnsNoHtml
     *  
     * Supply no fields and expect an empty HTML return
     * 
     * @return void
     */
    function testSupplyingEmptyFieldsReturnsNoHtml() {
        //$bizName,$tel1,$tel2,$address,$officehours
        $html = contactDetails('','','','','');
        $this->assertEmpty($html);
    }
    function testSupplyingTel1ReturnsTelephoneBlock() {
        //$bizName,$tel1,$tel2,$address,$officehours
        $html = contactDetails('Test','0812345678','','','');
        $expected = '<p><a href="tel:+27812345678">0812345678</a></p>';
        
        $this->assertEquals($expected,$html);
    }
    function testSupplyingTel2ReturnsTelephoneBlock() {
        //$bizName,$tel1,$tel2,$address,$officehours
        $html = contactDetails('Test','','0214321234','','');
        //$expected = '<p><a href="tel:+27214321234">0214321234</a></p>';
        $expected = '0214321234';

        $this->assertRegExp('/0214321234/', $html);
    }
}
