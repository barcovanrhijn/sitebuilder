<?php
// post url submit 
// validation?
// msgbox?
function footerForm(){
 
$html='
<div class="col-sm-12 col-md-6 col-lg-4 my-5 mx-3">
  <h2>Contact Us</h2>
 <form>
  <div class="form-group">
    <label for="contactName">Name</label>
    <input type="text" class="form-control" id="contactName" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="contactEmail">Email</label>
    <input type="text" class="form-control" id="contactEmail" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="contactMessage">Message</label>
    <textarea type="text" class="form-control" id="contactMessage" rows="3" placeholder="Write here..."></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Send</button>
</form>
</div>
';
return $html;
}

?>