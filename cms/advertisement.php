<?php 
$header = "Advertisement";
include 'inc/header.php'; ?>
<?php include 'inc/checklogin.php'; ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <?php flashMessage(); ?>
            <div class="page-title">
              <div class="title_left">
                <h3>Advertisement</h3>
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
                    <h2>List of Advertisements</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <a href="javascript:;" class="btn btn-primary" onclick="addAdvertisement();">Add Advertisement</a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <th>S.N</th>
                        <th>Image</th>
                        <th>URL</th> 
                        <th>Type</th>                  
                        <th>Action</th>
                      </thead>
                      <tbody>
                        <?php 
                          $Advertisement = new advertisement();
                          $Advertisements = $Advertisement->getAllAdvertisement();
                          // debugger($Advertisements);
                          if ($Advertisements) {
                            foreach ($Advertisements as $key => $advertisement) {
                        ?>
                        <tr>
                          <td><?php echo $key+1; ?></td>
                          <?php 
                            if (isset($advertisement->image) && !empty($advertisement->image) && file_exists(UPLOAD_PATH."advertisement/".$advertisement->image)) {
                              $thumbnail = UPLOAD_URL.'advertisement/'.$advertisement->image;                           
                            }else{
                              $thumbnail = UPLOAD_URL.'noimg.jpg';
                            }
                          ?>
                          <td><img src="<?php echo($thumbnail) ?>" alt="" style="width: 300px;height: auto;"></td>
                          <td><?php echo $advertisement->url; ?></td>                        
                          <td><?php echo $advertisement->type; ?></td>                          
                          <td>
                            <a href="javascript:;" class="btn btn-info" onclick="editAdvertisement(this);" data-advertisement_info='<?php echo(json_encode($advertisement)) ?>'>
                              <i class="fa fa-pencil"></i>
                            </a>
                            <a href="process/advertisement?id=<?php echo($advertisement->id) ?>&amp;act=<?php echo substr(md5("Delete-Advertisement-".$advertisement->id.$_SESSION['token']), 3,15) ?>" class="btn btn-danger">
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
                            <h4 class="modal-title" id="title">Add Advertisement</h4>
                          </div>
                          <form action="process/advertisement" method="post" enctype="multipart/form-data">
                            
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="">Advertisement URL</label>
                                <input type="text" class="form-control" placeholder="Advertisement Name" name="url" id="url">
                              </div>
                              <div class="form-group">
                                <label for="">Type</label>
                                <select class="form-control" name="type">
                                  <option value="" selected="selected" disabled="disabled">--SELECT TYPE--</option>
                                  <option value="wide">Wide</option>
                                  <option value="simple">Simple</option>
                                </select>
                              </div>
                              <div class="form-group ">
                                <label for="">Advertisement Image</label>
                                <input type="file" name="image" id="image" accept="image/*">
                              </div>
                              <?php 
                                if (isset($advertisement_info->image) && !empty($advertisement_info->image) && file_exists(UPLOAD_PATH."blog/".$advertisement_info->image)) {
                                  $thumbnail = UPLOAD_URL.'advertisement/'.$advertisement_info->image;                           
                                }else{
                                  $thumbnail = UPLOAD_URL.'noimg.jpg';
                                }
                              ?>
                             <div class="form-group col-md-8">
                               <img src="<?php echo($thumbnail) ?>" id="thumbnail" style="width: 300px;height: auto;">
                             </div>


                            </div>
                            <br>
                            <div class="modal-footer">
                              <input type="hidden" name="old_img" id="old_img" value="<?php echo (isset($advertisement_info->image) && !empty($advertisement_info->image))?$advertisement_info->image:"" ?>">
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
    function addAdvertisement(){
      $('#title').html('Add Advertisement');
      $('#url').val("");
      $('#id').removeAttr('value');
      showModal();
    }

    function editAdvertisement(element){
      var advertisement_info = $(element).data('advertisement_info');
      if (typeof(advertisement_info) != 'object') {
        advertisement_info=JSON.parse(advertisement_info);
      }
      console.log(advertisement_info);
      $('#title').html('Edit Advertisement');
      $('#url').val(advertisement_info.url);
      $('#type').val(advertisement_info.type);
      $('#id').val(advertisement_info.id);
      showModal();      
    }

    function showModal(data=""){
      ckeditor(data);
      $('.modal').modal();
    }

    function ckeditor(data=""){
      $('.ck').remove();
      ClassicEditor
      .create( document.querySelector( '#description' ) )
      .then( editor => {
          editor.setData(data);
      } )
      .catch( error => {
          console.error( error );
      } );
    }

    document.getElementById("image").onchange = function () {
        var reader = new FileReader();

        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            document.getElementById("thumbnail").src = e.target.result;
        };

        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    };
  </script>
