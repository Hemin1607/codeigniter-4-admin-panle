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
	          <form action="<?php echo base_url('/admin/about/savedata');?>" method="post" class="form-horizontal" enctype="multipart/form-data" name="usermanagementform">
	            <div class="control-group">
	              <label class="control-label">Title :</label>
	              <div class="controls">
					<input type="text" class="span11" name="title" value="<?= $formData['title']  ?  $formData['title'] : "" ;?>" placeholder="Title" />
					<span class="help-inline error"><?=   $validation->getError('title') ?></span>
	              </div>
	            </div>
	            <div class="control-group">
	              <label class="control-label">Description :</label>
	              <div class="controls">
					<div class="span11"> <textarea id="about_description" name="description"  placeholder="Last name" ><?= $formData['description']  ?  $formData['description'] : "write.." ;?></textarea ></div>
					<span class="help-inline error"><?=   $validation->getError('description') ?></span>
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
    CKEDITOR.replace( 'about_description' );
</script>
