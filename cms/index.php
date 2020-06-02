<?php 
$header = "Home";
include 'inc/header.php'; ?>
<?php include 'inc/checklogin.php'; ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Dashboard</h3>
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
                    <h2>New Messages</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                     <thead>
                       <th>S.N</th>
                       <th>ID</th>                        
                       <th>Email</th>
                       <th>Subject</th>
                       <th>Message</th>
                       <th>Date</th>                       
                     </thead>
                     <tbody>
                       <?php 
                         $Contact = new contact();
                         $contacts = $Contact->getAllContactWithLimit(0,3);
                         // debugger($contacts,true);
                         if ($contacts) {
                           foreach ($contacts as $key => $contact) {
                       ?>
                       <tr>
                         <td><?php echo $key+1; ?></td>
                         <td><?php echo $contact->id; ?></td>
                         <td><?php echo $contact->email; ?></td>
                         <td><?php echo $contact->subject; ?></td>
                         <td><?php echo html_entity_decode($contact->message); ?></td>
                         <td><?php echo date("M d, Y h:i:s a",strtotime($contact->created_date)); ?></td>                         
                       </tr>
                       <?php
                           }
                         }
                       ?>                       
                     </tbody>
                    </table>
                    <a class="btn btn-success text-center" href="contact">Respond to Messages</a>
                      
                    </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
  <?php include 'inc/footer.php'; ?>
       
