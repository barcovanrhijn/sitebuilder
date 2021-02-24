<?php 
global $testimonials;
$testimonials = array();


function testimonialItem(&$obj,$pr,$i){

        //Data
        $Text = $obj->{$pr . "text" . $i};
        $Name = $obj->{$pr . "name" . $i};
        $Area = $obj->{$pr . "area" . $i};
        $ProfilePic="";
        if ($i != 1){$itemClass="";}else{$itemClass = "Active";} //active for slide which displays first
 

         $ti = "";
            // if (!empty($ProfilePic)){
            //     $testimonialIdentityArea='
            //     <div class="row">
            //     <div class="col-sm-2">
            //     <img src="' . $ProfilePic . ' " class="img-responsive" style="width: 80px">
            //     </div>
            //     <div class="col-sm-10">
            //     <h4 class="testimonial_name" style="color: #0aaa7a;font-size:12;"><strong>' .$Name . '</strong></h4>
            //     <p class="testimonial_area" style="color: #0aaa7a;font-size:12;"><span>' . $Area . '</span><br>
            //     </p>
            //     </div>
            //     </div>
            //     ';
            // }else{
                $testimonialIdentityArea='
                    <div class="col-sm-10 pull-right">
                            <h4 class="testimonial_name text-right" style="color: #0aaa7a;font-size:12;"><strong>' . $Name . '</strong></h4>
                            <p class="testimonial_area text-right" style="color: #0aaa7a;font-size:12;"><span>' . $Area . '</span><br>
                            </p>
                        </div>
                    </div>
                ';
            // }

            $html='
                <div class="carousel-item '. $itemClass .'" data-interval="2000">
                <div class="row" style="padding: 20px">
                <div style=""><i class="fa fa-quote-left testimonial_fa" aria-hidden="true"></i></div>
                <p class="testimonial_quote" style="margin: 15px;">' . $Text . '</p><br>
                
                    ' . $testimonialIdentityArea . '
                
            </div>
            </div>
            ';
        return $html;
}


function testimonials(&$obj,$pr){
     global $testimonials; 
     //Generate Testimonial items
   for ($i=1; $i<3; $i++){
        //static $testimonial_items;
        if (!isset($obj->{$pr . "text" . $i})){break;}
        $ti = testimonialItem($obj,$pr,$i);
        array_push($testimonials,$ti);
  }
    
     $testimonial_items = array_shift($testimonials);
    //Data
    $id = "testimonial";
    $header = 'What our Customers Say';


    $html =' 
        <div class="col-sm-6">
            <h2><strong>'. $header .'</strong></h2>
            <div class="seprator" style="border-bottom: solid #0aaa7a 3px;width: 112px;margin: 7px 0 10px 0"></div>
            <div id="'. $id .'" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                ' . $testimonial_items . '
            </div>
            </div>
        <!-- <div class="controls testimonial_control pull-right">
                <a class="left fa fa-chevron-left btn btn-default testimonial_btn" href="#'. $id .'"
                data-slide="prev"></a>

                <a class="right fa fa-chevron-right btn btn-default testimonial_btn" href="#'. $id .'"
                data-slide="next"></a>
            </div>-->
        </div>
        </div>';
    //unset($testimonial_items);
    return $html;

}