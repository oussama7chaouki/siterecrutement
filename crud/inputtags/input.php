<?php
//index.php
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
      <form method="post" id="programmer_form">
       <div class="form-group">
       <?php
                            $stmt = $con->query("SELECT * FROM skills where user_id='3'");
                            $stmt->execute();
                            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            // Get the total number of contacts, this is so we can determine whether there should be a next and previous button
                                foreach($data as $skill)
                                {
                                    ?>
                                    <div class="passedskills d-none">
<?= $skill['skill'] ?>
                                </div>
                                    <?php
                                }
                            ?>   
        <label>Enter your Skill</label>
        <input type="text" name="skill" id="skill" class="form-control" />
       </div>
       <div class="form-group d-grid gap-2 col-5 mx-auto my-4">
        <input type="submit" name="submit" id="submit" class="btn btn-info" value="Save Skills" />
       </div>
      </form>
     </div>
    </div>
   </div>
  </div>


