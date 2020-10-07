<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a  class="tip-bottom"><i class="icon-home"></i> <?= $title; ?> <?= $formData['id']  ? "Edit"  : "Add"?></a></div>
  </div>
  <div class="container-fluid">
	<div class="row-fluid">
	    <div class="span7 cust-center">
	      <div class="widget-box">
	        <div class="widget-title"> <span class="icon "> <i class="icon-user"></i> </span>
	          <h5><?= $title; ?></h5>
	        </div>
	        <div class="widget-content nopadding"  >
	          <form action="<?php echo base_url('/admin/usermanagement/savedata');?>" method="post" class="form-horizontal" enctype="multipart/form-data" name="usermanagementform">
	            <div class="control-group">
	              <label class="control-label">First Name :</label>
	              <div class="controls">
					<input type="text" class="span11" name="firstname" value="<?= $formData['firstname']  ?  $formData['firstname'] : "" ;?>" placeholder="First name" />
					<span class="help-inline error"><?=   $validation->getError('firstname') ?></span>
	              </div>
	            </div>
	            <div class="control-group">
	              <label class="control-label">Last Name :</label>
	              <div class="controls">
					<input type="text" class="span11" name="lastname" value="<?= $formData['lastname']  ? $formData['lastname']  : "";?>" placeholder="Last name" />
					<span class="help-inline error"><?=   $validation->getError('lastname') ?></span>
	              </div>
	            </div>
	            <div class="control-group">
	              <label class="control-label">E-mail :</label>
	              <div class="controls">
					<input type="text" class="span11" name="email" value="<?= $formData['email'] ?  $formData['email'] : "";?>" placeholder="E-mail" />
					<span class="help-inline error"><?=   $validation->getError('email') ?></span>
	              </div>
	            </div>
	            <div class="control-group">
	              <label class="control-label">Password :</label>
	              <div class="controls">
					<input type="password"  class="span11" name="password" value="<?php $formData['password'] ? $formData['password'] : "";?>" placeholder="Enter Password"  />
					<span class="help-inline error"><?=   $validation->getError('password') ?></span>
	              </div>
	            </div>
				<div class="control-group">
					<label class="control-label">Role</label>
					<div class="controls">
						<select class="span11" name="role" value="<?= $formData['role'] ? $formData['role'] : "";?>">
							<option value="Admin">Admin</option>
							<option value="User">User</option>
							<option value="Manager">Manager</option>
						</select>
						<span class="help-inline error"><?=   $validation->getError('role') ?></span>
					</div>
				</div>
	            <div class="control-group">
	              <label class="control-label">File upload input</label>
	              <div class="controls">
	                <input type="file" name="profile-image" id="profile-image" />
	              </div>
	            </div>
				<input type="hidden" name="id" value="<?= $formData['id'] ? $formData['id'] : "";?>" />
	            <div class="form-actions">
	              <button type="submit" class="btn btn-success">Save</button>
	            </div>
	          </form>
	        </div>
	      </div>

	    </div>
		
	</div>
  </div>
</div>
