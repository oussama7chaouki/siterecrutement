<?php
//index.php
require('userid1.php');
?>
<style>
  .close{
    text-decoration: none;
  }
</style>
  <br />
  <div class="container">
   <div class="row">
     <br />
     <div class="d-grid gap-2 col-10 mx-auto my-4" style="margin:0 auto; float:none;">
      <span id="success_message"></span>
      <form method="post" id="programmer_form1">
       <div class="form-group">
       <?php
                            $stmt = $con->query("SELECT * FROM languages where user_id='$user_id'");
                            $stmt->execute();
                            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            // Get the total number of contacts, this is so we can determine whether there should be a next and previous button
                                foreach($data as $language)
                                {
                                    ?>
                                    <div class="passedlanguages d-none">
<?= $language['language'] ?>
                                </div>
                                    <?php
                                }
                            ?>   
        <label>Enter your language</label>
        <input type="text" name="language" id="language" class="form-control" />
       </div>
       <div class="form-group d-grid gap-2 col-5 mx-auto my-4">
        <input type="submit" name="submit" id="submit" class="btn btn-info" value="Save languages" />
       </div>
      </form>
     </div>
    </div>
   </div>
  </div>


