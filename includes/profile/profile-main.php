<div class="card-body" style='min-height: 65vh;'>
  <div class='row d-flex activity-feed'>
    <!-- Profile Settings Side -->
    <div class='col-md-6'>
      <div class="row p-2">
        <!-- Profile Picture -->
        <!-- Fix the stupid modal button for image upload -->
        <div class="col-md position-relative">
          <img class="img-profile img-fluid rounded-circle" style='max-width: 45%; min-width: 30%;' src="files/images/undraw_profile.svg">
          <div class="position-absolute profileImg">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              <i class="far fa-edit"></i>
            </button>
          </div>
        </div>
      </div>
      <div class="row pl-2 d-flex">
        <div class="col-md">
          Total Projects
        </div>
        <div class="col-md">
          400
        </div>
      </div>
      <div class="row pl-2 d-flex">
        <div class="col-md">
          Open Tickets
        </div>
        <div class="col-md">
          4
        </div>
      </div>
      <div class="row pl-2 d-flex">
        <div class="col-md">
          Total Tickets
        </div>
        <div class="col-md">
          400
        </div>
      </div>
    </div>
    <div class="col-md">
      <!-- Profile Image -->
      <div class="row">
        <div class="col-md form-group">
          <!-- Button trigger modal -->

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Change profile image</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="">
                    <input type="file" name="profile" id="">
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Timer Refresh -->
      <div class="row">
        <div class="col-md">
          <form action="" id='alertTimer'>
            <label for='refreshAlerts'>Notification Refresh Timer</label>
            <select class='form-control' id='refreshAlerts'>
              <option>5 Minutes</option>
              <option>10 Minutes</option>
              <option>15 Minutes</option>
              <option>30 Minutes</option>
            </select>
          </form>
        </div>
      </div>
      <!-- Change Password -->
      <!-- Add show/hide functionality? -->
      <div class="row mt-2">
        <div class="col-md form-group">
          <form action="" id='password'>
            <label for='changePwd'>Change Password</label>
            <input type='password' class='form-control' name='curPassword' placeholder="Current Password">
        </div>
        <div class="col-md form-group">
          <label>&nbsp;</label>
          <input type='password' class='form-control' name='curPassword' placeholder="New Password">
        </div>
        <div class="col-md text-right">
          <label for="btn">&nbsp;</label>
          <button class='btn btn-info form-control'>Change</button>
          </form>
        </div>
      </div>
      <div class="row">

      </div>
      <!-- Logout Button -->
      <div class="row">
        <div class="col-md text-center">
          <button class="btn btn-danger">Logout</button>
        </div>
      </div>
    </div>
  </div>

</div>