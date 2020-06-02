<?php 
$header = "Subscriber";
include 'inc/header.php'; ?>
<?php include 'inc/checklogin.php'; ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="page-title">
              <div class="title_left">
                <h3>Subscriber</h3>
              </div>

              <!-- <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div> -->
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List of Subscribers</h2>
                    <!-- <ul class="nav navbar-right panel_toolbox">
                      <a href="javascript:;" class="btn btn-primary" onclick="addSubscriber();">Add Subscriber</a>
                    </ul> -->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <th>S.N</th>                            
                        <th>Email</th>                    
                      </thead>
                      <tbody>
                        <?php 
                          $Subscriber = new subscriber();
                          $subscribers = $Subscriber->getAllSubscriber();
                          // debugger($subscribers,true);
                          if ($subscribers) {
                            foreach ($subscribers as $key => $subscriber) {
                        ?>
                        <tr>
                          <td><?php echo $key+1; ?></td>        
                          <td><?php echo $subscriber->email; ?></td>                          
                        </tr>
                        <?php
                            }
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
  <?php include 'inc/footer.php'; ?>
  <script src="assets/js/datatable.js"></script>
