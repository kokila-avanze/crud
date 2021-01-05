<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <title>Task</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">Tasks</h1>
    <hr>
     <div class="container">
        <div class="row">
            <div class="col-sm-12" id="message2"></div>
            <div class="col-sm-12" style="padding-bottom: 5px;">
                <button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#createModel">
                    <span class="glyphicon glyphicon-plus"></span>&emsp;Create Task
                </button>
            </div>
        </div>
        <table class="table table-striped" style="border: 1px solid black;">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Language known</th>

                    <th>Qualification</th>
                    <th>Email</th>
                    <th>File_Upload</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php foreach($tasks as $task): ?>
                    <tr id="tsk_<?= $task->id ?>">
                        <td class="task_name"><?= $task->name ?></td>
                        <td class="task_desc"><?= $task->description ?></td>
                        <td class="task_language"><?= $task->language_known ?></td>
                        

                        <td class="task_quali"><?= $task->qualification ?></td>
                        <td class="task_email"><?= $task->email ?></td>
                        <td class="task_file"><?= $task->file_upload ?></td>
    


                        <td>
                            <button class="btn btn-primary edit_task" data-id="<?= $task->id ?>" data-toggle='modal' data-target='#editModel'>Edit</button>
                            <button class="btn btn-danger delete_task" data-id="<?= $task->id ?>" data-toggle="modal" data-target="#deleteModel">x</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="col-xs-12 text-center h3" id="table_status"><?= count($tasks) > 0 ? '' : 'No Tasks' ?></div>
    </div>

<!-- Create Task Modal -->
<div class="modal fade" id="createModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">
                    Create Task
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form role="form" id="taskForm">
                <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Task Name"/>
                </div>
                <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Task Description"></textarea>
                </div>
                    
                <div class="form-group pt-2">
                    <label>Languages known</label><br>
                    <input type="checkbox" name="java" value="java" id="java" >
                    <label for="java">JAVA</label>
                    <input type="checkbox" name="c" value="c" id="c">
                    <label for="c">C</label>
                    <input type="checkbox" name="html" value="html" id="c">
                    <label for="html">HTML</label>
                </div>
                    <div class="form-group pt-4">
                        <label>Qualification</label>
                         <select id="quali" name="quali" class="form-control">
                            <option value="BE">BE</option>
                            <option value="MCA">MCA</option>
                            <option value="Bsc">Bsc</option>
                            <option value="Msc">Msc</option>
                        </select>
                    <div class="form-group pt-4">
                        <label>Email</label>
                        <input type="Email" name="email" id="email" value="" class="form-control">
                        
                    </div>
                    <div class="form-group pt-4">
                         <label>File Upload</label>
                         <input type="file" name="file" id="file" value="" class="form-control">
                     </div>    
                
              
             </div>  
                </form>
                <div id="message1">
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Close
                </button>
                <button type="button" id="create_task" class="btn btn-success">
                    Create Task
                </button>
            </div>
        </div>
    </div>
</div>  

<!-- Edit Task Modal -->
<div class="modal fade" id="editModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">
                    Edit Task
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form role="form" id="editTaskForm">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="m_task_name" name="name" placeholder="Task Name"/>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="m_task_description" name="description" placeholder="Task Description"></textarea>
                    </div>
                    <div class = "form-group pt-2">
                    
                <div class="form-group pt-2">
                    <label>Languages known</label><br>
                    <input type="checkbox" name="java" value="java" >
                    <label for="java">JAVA</label>
                    <input type="checkbox" name="c" value="c">
                    <label for="c">C</label>
                    <input type="checkbox" name="html" value="html">
                    <label for="html">HTML</label>
                </div>
                    <div class="form-group pt-4">
                        <label>Qualification</label>
                         <select id="m_task_quali" name="quali" class="form-control">
                            <option value="BE">BE</option>
                            <option value="MCA">MCA</option>
                            <option value="Bsc">Bsc</option>
                            <option value="Msc">Msc</option>
                        </select>
                    <div class="form-group pt-4">
                        <label>Email</label>
                        <input type="Email" name="email" id="m_task_email" value="" class="form-control">
                        
                    </div>
                    <div class="form-group pt-4">
                         <label>File Upload</label>
                         <input type="file" name="file" id="m_task_file" value="" class="form-control">
                     </div>   
                     <input id="searchMapInput" class="mapControls" type="text" placeholder="Enter a location"> 
                     <div id="map"></div>
                <section class="showcase">


  <div class="container">
  <div class="row">       
    <div class="col-md-12 gedf-main">
      <?php if(!empty($msg)) { 
        echo $msg;
      } ?>
      <form method="post">
        <div class="row"> 
          <label class="control-label" style="padding-left: 18px;">Enter captcha code:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" name="captcha" />
          </div>
          <div class="col-sm-3 text-left">
            <button type="submit" name="submit" class="btn btn-primary btn-md" value="submit">Submit</button>
          </div>
        </div>
      </form>
      <form>
      <div>
      <p id="captcha-img"><?php echo $captchaImg; ?></p>
      <p>Can't read the image? click <a href="javascript:void(0);" class="refresh-captcha">here</a> to refresh.</p></div></form>
    </div>       
  </div>
  </div>
</section>
<script>
  jQuery(document).ready(function(){
    jQuery('a.refresh-captcha').on('click', function(){
      jQuery.get('<?php  base_url().'index.php/crud/refresh'; ?>', function(data) {
        jQuery('p#captcha-img').html(data);
    });
    });
  });
</script>    <!--  <div>
                     <button class="g-recaptcha" 
                        data-sitekey="6LfEPxoaAAAAACwh6E6vkalneDkJ5r5P0fVzLD93" 
                        data-callback='onSubmit' 
                        data-action='submit'>Submit</button></div> -->
                
                    <input type="hidden" id="m_task_id" name="task_id">
                </form>
                <div id="message1">
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Close
                </button>
                <button type="button" id="update_task" class="btn btn-success">
                    Update Task
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Task Modal -->
<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Create Task
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p>Are you sure you want to delete the selected Task?</p>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cancel
                </button>
                <button type="button" id="del_btn" class="btn btn-danger">
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>


<!--<script src="/student/CodeIgniter/assets/bootstrap-5.0.0-beta1-dist/js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="/student/CodeIgniter/assets/bootstrap-5.0.0-beta1-dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDp6w2-Wbg13P6TEUp7kYjWzjYRP_CtHd8&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
   
    <style type="text/css">
      /* Set the size of the div element that contains the map */
      #map {
        height: 400px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
      }
    </style>
    <script>
      // Initialize and add the map
      function initMap() {
        // The location of Uluru
       /* const uluru = { lat: -25.344, lng: 131.036 };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 4,
          center: uluru,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
          position: uluru,
          map: map,
        });*/
        var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 22.3038945, lng: 70.80215989999999},
      zoom: 13
    });
    var input = document.getElementById('searchMapInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
   
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);
  
    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });
  
    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
    
        /* If the place has a geometry, then present it on a map. */
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
        marker.setIcon(({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
        }));
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);
      
        var address = '';
        if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }
      
        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);
        
        /* Location details */
        document.getElementById('location-snap').innerHTML = place.formatted_address;
        document.getElementById('lat-span').innerHTML = place.geometry.location.lat();
        document.getElementById('lon-span').innerHTML = place.geometry.location.lng();
    });

      }
    </script>

  <!--  <script src="https://www.google.com/recaptcha/api.js"></script>
     <script>
      function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute('reCAPTCHA_site_key', {action: 'submit'}).then(function(token) {
              // Add your logic to submit to your backend server here.
          });
        });
      }
  </script> -->
<script>

    $(function(){

        /* The following function inserts a new task on click */
        $('#create_task').on('click', function(e){
            e.preventDefault();
            var formData = $("#taskForm").serialize();
            $.ajax({
                type: 'post',
                url: 'crud/create_task',
                data: formData
            }).then(function(res){
                if(res.type == 'success'){
                    appendRow(res.message);
                    $("#message2").html("<div class='alert alert-success' id='success-alert'>Task "+res.message.name+" created Successfully!</div>");
                    $("#taskForm").get(0).reset();
                    $('#createModel').modal('toggle');
                    hideAlert("#success-alert");
                } else{
                    $("#message1").html("<div class='alert alert-danger'>"+res.message+"</div>");
                }
            }, function(){
                alert('Sorry! Some Error Occured');
            })
        });

        $('#tableBody').on('click', '.edit_task', function(e){
            e.preventDefault();
            var rowId = $(this).data('id');
            var name = $('#tsk_'+rowId).find('.task_name').text();
            var desc = $('#tsk_'+rowId).find('.task_desc').text();
            var lang = $('#tsk_'+rowId).find('.task_language').text();
            var email = $('#tsk_'+rowId).find('.task_email').text();
            var quali = $('#tsk_'+rowId).find('.task_quali').text();
            var file = $('#tsk_'+rowId).find('.task_file').text();
            $("#editTaskForm").find('#m_task_id').val(rowId);
            $("#editTaskForm").find('#m_task_name').val(name);
            $("#editTaskForm").find('#m_task_desription').val(desc);
            $("#editTaskForm").find('#m_task_java').val(lang);
            $("#editTaskForm").find('#m_task_email').val(email);
            $("#editTaskForm").find('#m_task_quali').val(quali);
            $("#editTaskForm").find('#m_task_file').val(file);
            

        });

        /* The following function Updates the Selected Task */
        $('#update_task').on('click', function(e){
            e.preventDefault();
            var formData = $("#editTaskForm").serialize();
            $.ajax({
                type: 'post',
                url: 'crud/update_task',
                data: formData
            }).then(function(res){
                if(res.type == 'success'){
                    updateRow(res.message);
                    $("#message2").html("<div class='alert alert-success' id='success-alert'>Task "+res.message.name+" updated Successfully!</div>");
                    $("#editTaskForm").get(0).reset();
                    $('#editModel').modal('toggle');
                    hideAlert("#success-alert");
                } else{
                    $("#message1").html("<div class='alert alert-danger'>"+res.message+"</div>");
                }
            }, function(){
                alert('Sorry! Some Error Occured');
            })
        });



        $('#tableBody').on('click', '.delete_task', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            $('#deleteModel #del_btn').data('id', id);
        });

        $('#del_btn').click(function(e){
            e.preventDefault();
            var id = $(this).data('id');
            $('#deleteModel').modal('toggle');
            $.ajax({
                type: 'post',
                url: 'crud/delete_task',
                data: {'id': id}
            }).then(function(res){
                if(res.type == 'success'){
                    $("#message2").html("<div class='alert alert-success' id='success-alert'>Task deleted Successfully!</div>");
                        $('#tsk_'+id).remove();
                    hideAlert("#success-alert");
                } else{
                    $("#message2").html("<div class='alert alert-danger' id='success-alert'>Cannot Delete the Task!</div>");
                    hideAlert("#success-alert");
                }
            }, function(){
                alert('Sorry! Some Error Occured');
            })
        });

        function appendRow(message){
            $('#tableBody').append([
                "<tr id='tsk_"+message.id+"'>", 
                    "<td class='task_name'>"+message.name+"</td>",
                    "<td class='task_desc'>"+message.description+"</td>",
                    "<td class='task_language'>"+message.language_known+"</td>",
                    "<td class='task_quali'>"+message.qualification+"</td>",
                    "<td class='task_email'>"+message.email+"</td>",
                    "<td class='task_file'>"+message.file_upload+"</td>",




                    "<td>",
                    "<button class='btn btn-primary edit_task' data-id='"+message.id+"' data-toggle='modal' data-target='#editModel'>Edit</button>&nbsp;",
                    "<button class='btn btn-danger delete_task' data-id='"+message.id+"' data-toggle='modal' data-target='#deleteModel'>x</button>",
                    "</td>",
                "</tr>"].join('')
            );
        }       

        function updateRow(message){
            var row = $('#tableBody').find('#tsk_' + message.id);
            row.find('.task_name').text(message.name);
            row.find('.task_desc').text(message.description);
            row.find('.task_language').text(message.language_known);
            row.find('.task_quali').text(message.qualification);
            row.find('.task_email').text(message.email);
            row.find('.task_file').text(message.file_upload);

    
        }

        function hideAlert(id){
                $(id).fadeTo(2000, 500).slideUp(500, function(){
                    $(id).slideUp(500);
                });
        }

        $('#tableBody').bind('DOMSubtreeModified', function(e) {
          if ($("#tableBody > tr").length > 0) {
            $("#table_status").text('');
          } else{
            $("#table_status").text('No Tasks');
          }
        });


    });

</script>
</body>
</html>