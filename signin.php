<?php 
    include_once "header.php";
?>

    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>LOG IN</h3>
                        
                        <form class="requires-validation" novalidate action="includes/signin.inc.php" method="post">

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="uid" placeholder="E-mail Address or User Name" required>
                                 <div class="valid-feedback">valid!</div>
                                 <div class="invalid-feedback">Email field cannot be blank!</div>
                            </div>
                            

                            <div class="col-md-12">
                              <input class="form-control" type="password" name="password" placeholder="Password" required>
                               <div class="valid-feedback">Password field is valid!</div>
                               <div class="invalid-feedback">Password field cannot be blank!</div>
                           </div>

                            <div class="form-button mt-3">
                                <button id="submit" type="submit" class="btn btn-primary">Log in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


?>


<?php 
  include_once "footer.php";
?>