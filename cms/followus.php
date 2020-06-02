<?php 
$header = "FollowUs";
include 'inc/header.php'; ?>
<?php include 'inc/checklogin.php'; ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <?php flashMessage(); ?>
            <div class="page-title">
              <div class="title_left">
                <h3>FollowUs</h3>
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
                    <h2>List of Follow Us Links</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <a href="javascript:;" class="btn btn-primary" onclick="addFollowus();">Add FollowUs</a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <th>S.N</th>
                        <th>Followus Name</th>
                        <th>Icon-Name</th>
                        <th>URL</th>
                      </thead>
                      <tbody>
                        <?php 
                          $Followus = new followus();
                          $Followsus = $Followus->getAllFollowus();
                          // debugger($Categories);
                          if ($Followsus) {
                            foreach ($Followsus as $key => $followus) {
                        ?>
                        <tr>
                          <td><?php echo $key+1; ?></td>
                          <td><?php echo $followus->followusname; ?></td>
                          <td><?php echo $followus->icon; ?></td>
                          <td><?php echo $followus->url; ?></td>                          
                          <td>
                            <a href="javascript:;" class="btn btn-info" onclick="editFollowus(this);" data-followus_info='<?php echo(json_encode($followus)) ?>'>
                              <i class="fa fa-pencil"></i>
                            </a>
                            <a href="process/followus?id=<?php echo($followus->id) ?>&amp;act=<?php echo substr(md5("Delete-Followus-".$followus->id.$_SESSION['token']), 3,15) ?>" class="btn btn-danger">
                              <i class="fa fa-trash"></i>
                            </a>
                          </td>
                        </tr>
                        <?php
                            }
                          }
                        ?>
                      </tbody>
                    </table>

                    <div class="modal fade" tabindex="-1" role="dialog">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="title">Add Followus</h4>
                          </div>
                          <form action="process/followus" method="post">
                            
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="">Followus Name</label>
                                <input type="text" class="form-control" placeholder="Followus Name" name="followusname" id="followusname">
                              </div>
                              <div class="form-group">
                                <label for="">Followus Icon</label>
                                <input type="text" class="form-control" placeholder="Followus Icon" name="icon" id="icon">
                              </div>
                              <div class="form-group">
                                <label for="">Followus URL</label>
                                <input type="text" class="form-control" placeholder="Followus URL" name="url" id="url">
                              </div>                              
                            </div>

                            <div class="modal-footer">
                              <input type="hidden" id="id" name="id">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>

                          </form>

                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
  <?php include 'inc/footer.php'; ?>
  <script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>
  <script src="assets/js/datatable.js"></script>
  <script type="text/javascript">
    function addFollowus(){
      $('#title').html('Add Followus');
      $('#followusname').val("");
      $('#icon').val("");
      $('#url').val("");      
      $('#id').removeAttr('value');
      showModal();
    }

    function editFollowus(element){
      var followus_info = $(element).data('followus_info');
      if (typeof(followus_info) != 'object') {
        followus_info=JSON.parse(followus_info);
      }
      console.log(followus_info);
      $('#title').html('Edit Followus');
      $('#followusname').val(followus_info.followusname);
      $('#icon').val(followus_info.icon);
      $('#url').val(followus_info.url);
      $('#id').val(followus_info.id);
      showModal();
    }

    function showModal(){
      $('.modal').modal();
    }
  </script>
