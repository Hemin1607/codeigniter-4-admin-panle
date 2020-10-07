
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
	          <form action="<?php echo base_url('/admin/education/savedata');?>" method="post" class="form-horizontal" enctype="multipart/form-data" name="usermanagementform">
	            <div class="control-group">
	              <label class="control-label">Title :</label>
	              <div class="controls">
					<input type="text" class="span11" name="title" value="<?= $formData['title']  ?  $formData['title'] : "" ;?>" placeholder="Title" />
					<span class="help-inline error"><?=   $validation->getError('title') ?></span>
	              </div>
				</div>
				<div class="control-group">
	              <label class="control-label">School / University :</label>
	              <div class="controls">
					<input type="text" class="span11" name="school_university" value="<?= $formData['school_university']  ?  $formData['school_university'] : "" ;?>" placeholder="School / University" />
					<span class="help-inline error"><?=   $validation->getError('school_university') ?></span>
	              </div>
				</div>
				<div class="control-group">
	              <label class="control-label">Passing Year/Month :</label>
	              <div class="controls">
					<input type="text" class="span11" name="passing_year" value="<?= $formData['passing_year']  ?  $formData['passing_year'] : "" ;?>" placeholder="Passing Year/Month" />
					<span class="help-inline error"><?=   $validation->getError('passing_year') ?></span>
	              </div>
				</div>

				<div class="control-group">
	              <label class="control-label">Description :</label>
	              <div class="controls">
				  <div class="span11"> <textarea  id="education_description" name="description"  placeholder="Description" ><?= $formData['description']  ?  $formData['description'] : "" ;?></textarea></div>
					<span class="help-inline error"><?=   $validation->getError('description') ?></span>
	              </div>
				</div>

				<div class="control-group">
	              <label class="control-label">Address :</label>
	              <div class="controls">
				   <textarea class="span11"  id="" name="address"  placeholder="address" ><?= $formData['address']  ?  $formData['address'] : "Address" ;?></textarea>
					<span class="help-inline error"><?=   $validation->getError('address') ?></span>
	              </div>
				</div>
				
				<div class="control-group">
	              <label class="control-label">Grade / Percentage :</label>
	              <div class="controls">
					<input type="text"  class="span11" name="grade_percentage" value="<?= $formData['grade_percentage']  ?  $formData['grade_percentage'] : "" ;?>" placeholder="Grade / Percentage" />
					<span class="help-inline error"><?=   $validation->getError('grade_percentage') ?></span>
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
<script>
    CKEDITOR.replace( 'education_description' );
</script>
