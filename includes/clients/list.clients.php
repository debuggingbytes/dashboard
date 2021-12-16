<?php
$lastObj = new lastOrders();

$pullOrders = $lastObj->pullOrders();
?>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Latest Clients</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Website Type</th>
            <th>Received</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Name</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Website Type</th>
            <th>Received</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
          foreach ($pullOrders as $order) {
          ?>
            <tr>
              <td><?php echo $order['id']; ?></td>
              <!-- Add link to client page  -->
              <td><a href='#'><?php echo $order['full_name']; ?></a></td>
              <td><?php echo $order['email']; ?></td>
              <td><?php echo $order['phone']; ?></td>
              <td><?php echo $order['website_type']; ?></td>
              <td><?php echo $order['order_sent']; ?></td>

            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>