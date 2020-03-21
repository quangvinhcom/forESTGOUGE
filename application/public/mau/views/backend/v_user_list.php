   <?php $this->load->view('backend/header'); ?>  
   <style>
   .btn-group-lg>.btn, .btn-lg {
    padding: 0px 5px 0px 5px !important;
    font-size: 1.25rem;
    line-height: 1.5;
    border-radius: .3rem;
}
.btn-group-lg>.btn, .btn-lg {
    padding: .1rem 1rem !important;
    font-size: 1.00rem !important;
}
.card-header {
    padding: .30rem 1.25rem !important;
}
.dt-buttons{
    float: right;
}
#example1_filter{
	float: right;
    margin-left: 400px;
}
#example1_length{
	   width: auto;
    float: left;
}
#example1 td 
{
	font-weight:bold;
    text-align: left; 
    vertical-align: middle;
}
#example1 th
{
    text-align: center; 
}
   </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
              <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">CPU Traffic</span>
                <span class="info-box-number">
                  10
                  <small>%</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">760</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">New Members</span>
                <span class="info-box-number">2,000</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">TÀI KHOẢN ĐĂNG NHẬP</h3>
                   <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                  <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add</button> 
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped" style="width:100%;font-size:9pt;">
                <thead>
                <tr>
                  <th>No.#</th>
                  <th>Avatar</th>
                  <th>User Name</th>
                  <th>Level</th>
                  <th>Action</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                <tr>
                  <th>No.#</th>
                  <th>Avatar</th>
                  <th>User Name</th>
                  <th>Level</th>
                   <th>Action</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<div id="userModal" class="modal fade">  
      <div class="modal-dialog">  
           <form method="post" id="user_form" enctype="multipart/form-data">  
                <div class="modal-content">  
                     <div class="modal-header">  
                          <button type="button" class="close" data-dismiss="modal">&times;</button>  
                          <h4 class="modal-title">Add User</h4>  
                     </div>  
                     <div class="modal-body">  
                     <div class="col-md-6">
                     <div class="form-group">
                          <label>Enter User Name</label>  
                          <input type="text" name="user_name" id="user_name" class="form-control" />  
                     </div>
                     </div>
                     <div class="col-md-6">
                     <div class="form-group">
                          <label>Enter Password</label>  
                          <input type="password" name="pass_word" id="pass_word" class="form-control" />  
                     </div>
                     </div>
                     <div class="col-md-6">
                     <div class="form-group">
                          <label>Choose Level</label>  
                          <select name="level_access" id="level_access" class="form-control">  
                          <option value="admin">admin</option>
                          <option value="member">member</option>
                          </select>
                     </div>
                     </div>
                     <div class="col-md-6">
                     <div class="form-group">
                          <label>Select User Image</label>  
                          <input type="file" name="avatar_user" id="avatar_user" />  
                          <span id="user_uploaded_image"></span>  
                     </div>
                     </div>
                     </div>  
                     <div class="modal-footer">  
                           <input type="hidden" name="user_id" id="user_id" />  
                          <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />  
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                     </div>  
                </div>  
           </form>  
      </div>  
 </div>  
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/tablejs/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>public/tablejs/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>public/tablejs/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>public/tablejs/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>public/tablejs/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>public/tablejs/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>public/tablejs/buttons.print.min.js"></script>
 <script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      $('#add_button').click(function(){  
           $('#user_form')[0].reset();  
           $('.modal-title').text("Add User");  
           $('#action').val("Add");  
           $('#user_uploaded_image').html('');  
      });  
      function load_data()
        {
                var dataTable = $('#example1').DataTable({ 
          		'scrollX': true,
				'responsive': true,
				'lengthMenu': [[20, 50, 150, -1], [20, 50, 150, "All"]],
				'dom': 'Blfrtip',
				'buttons': [
					'excel', 'pdf'
				],
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url':'<?php echo base_url(); ?>user_list/fetch_user'
                },
                'columns': [
                { data: 'stt' },
			   { data: 'avatar_user' },
			   { data: 'user_name' },
			    { data: 'level_access' },
                { data: 'action_user' },
                { data: 'edit_user' },
                { data: 'delete_user' },               
            ]
             });  
        }
      load_data();
      $(document).on('submit', '#user_form', function(event){  
           event.preventDefault();  
           var userName = $('#user_name').val();  
           var passWord = $('#pass_word').val();  
           var levelAccess = $('#level_access').val();
           var extension = $('#avatar_user').val().split('.').pop().toLowerCase();  
           if(extension != '')  
           {  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File'"');  
                     $('#avatar_user').val('');  
                     return false;  
                }  
           }       
           if(userName == '' && passWord == '')  
           {  
            alert('Invalid Image File'"');  
           }  
      });  
      $('#example1').on('click', '.updateit', function(){
           var user_id = $(this).attr('id');  
           var action = 'Edit';
           $.ajax({
		   url:'<?php echo base_url(); ?>user_list/fetch_single_user',  
			method:'POST',
			data:{user_id:user_id},
			dataType:'json',
                success:function(data)  
                {  
                     $('#userModal').modal('show');  
                     $('#user_name').val(data.user_name);  
                     $('#pass_word').val(data.pass_word); 
                     $('#level_access').append('<option value='+data.level_access+' selected>'+data.level_access+'</option>');
                     $('.modal-title').text("Edit User");  
                     $('#user_id').val(user_id);  
                     $('#user_uploaded_image').html(data.avatar_user);  
                     $('#action').val("Edit");  
                }  
           })  
      });  
 });  
 </script>  
  <!-- /.content-wrapper -->
 <?php $this->load->view('backend/footer'); ?>