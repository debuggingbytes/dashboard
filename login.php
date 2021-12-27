<?php
if (isset($_SESSION['username'])) {
  header('location: index.php');
} else {
  $error = null;
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DebuggingBytes | Dashboard Login</title>
    <!-- CSS Information -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link href="files/admin.css" rel="stylesheet">
    <link rel="stylesheet" href="./files/login.css">
  </head>

  <body class='bg-gradient-info'>
    <main>
      <section>
        <div class="container p-2">
          <div class="row justify-content-center align-items-center d-flex vh100">
            <div class="col-md login-box text-center shadow-lg">
              <img src="http://www.debuggingbytes.com/files/images/db-full-logo.png" alt="DebuggingBytes admin dashboard login" class="img-fluid w-50 py-3 mb-5">
              <div class="card-header bg-info text-white text-fw-500 text-center">Login Required</div>
              <div class="card-body shadow-lg" id="loginbox">
                <?php echo $error; ?>
                <form method="POST" action="./includes/login.inc.php">
                  <div class="mb-1 form-floating">
                    <input type='text' class='form-control' name='userid' placeholder='Username/Email'>
                    <label for="user">Username:</label>
                  </div>
                  <div class="mb-1 form-floating">
                    <input required class='form-control' type='password' name='password' placeholder='password'>
                    <label for="pwd">Password</label>
                  </div>
                  <div class="text-center">
                    <input type='submit' name='loginUser' value='Login' class='btn btn-info'>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </body>

  </html>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!--
<script>
	$(function(){
		$('form').on("submit", function(e){
			
			e.preventDefault;
			$.ajax({
				url: "./includes/login.inc.php",
				type: "POST",
				data: $('forms').serialize(),
				success: function() {
					$('#loginbox').html("Logging in")
				}

			})
		})
	})
</script>-->
<?php
}
?>