
<?php
//debug on
ini_set('display_errors', 1);

//$imgPosition takes left or right in lower case.
// TODO cater for cases where heading is empty and img is empty

function contactDetails($bizName,$tel1,$tel2,$address,$officehours){
$tel1_27 = preg_replace('~.*(\d{2})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '+27$1$2$3', $tel1);
$tel2_27 = preg_replace('~.*(\d{2})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '+27$1$2$3', $tel2);

$tel_block1 = "";
$tel_block2 = "";

    //if both telephone numbers supplied
    if (!empty($tel1)){ $tel_block1 = '
      <a href="tel:'. $tel1_27 .'">'. $tel1 . '</a>
      <br>
      ';
    }
    //if only #tel1 supplied 
    if (!empty($tel2)){
      $tel_block2 = '
           <a href="tel:'. $tel2_27 .'">'. $tel2 . '</a>
      ';
    } 
    // if no numbers supplied 
    if (empty($tel1) && empty($tel2)) {
      $tel_card = "";
    }
    else {
      $tel_card = '
      <div class="col-sm-12 col-md-4">
        <div class="card border-0">
          <div class="card-body text-center">
            <i class="fa fa-phone fa-5x mb-3" aria-hidden="true"></i>
            <h4 class="text-uppercase mb-4">call us</h4>
            '. $tel_block1 . '
            '. $tel_block2 . '
          </div>
        </div>
      </div>
      ';
     
    } 



  // contact card supplied
  if (!empty($address)) {
    $address_card = '
  <div class="col-sm-12 col-md-4">
      <div class="card border-0">
        <div class="card-body text-center">
          <i class="fa fa-map-marker fa-5x mb-3" aria-hidden="true"></i>
          <h4 class="text-uppercase mb-4">office location</h4>
          <address>' . $address . '</address>
        </div>
      </div>
  </div>     
    ';
  } 
    // contact card is empty
    else {
      $address_card = "";
    }



    // office hours supplied
    if (!empty($officehours)) {   
      $officehours_card = ' 
      <div class="col-sm-12 col-md-4">
          <div class="card border-0">
              <div class="card-body text-center">
              <i class="fa fa-clock-o fa-5x mb-3" aria-hidden="true"></i>
              <h4 class="text-uppercase mb-4">business hours:</h4>
              <p>' . $officehours . '</p>
              </div>
          </div>
      </div>
      ';
    }
    // office hours empty
    else {
      $address_card = '';
    }



//combine cards
// if all sections are empty return nothing
if (empty($telcard) && empty($address_card) && empty($officehours_card) ){
  $html = "";
}
else {
  $html= $tel_card . $address_card . $officehours_card;
}

  return $html;

};   