<?php if ($this->session->flashdata('flash_message')) : ?>
<div class="alert alert-info" role="alert"><?php echo $this->session->flashdata('flash_message');?></div>
<?php endif; ?>

<div class="row">
	<div class="col-lg-6 col-lg-offset-3">
		<div class="blog-post">
			<?php foreach ($query->result() as $row) : ?>
			<h2 class="text-center"><?php echo $row->job_title; ?></h2>
			<br/>
			<p class="blog-post-meta">Posted by <?php echo $row->job_advertiser_name . ' on ' . $row->job_created_at; ?></p>
			<div class="table-responsive"> 
				<table class="table table-hover">
					<tr>
						<td><b>Start Date:</b></td>
						<td><?php echo $row->job_start_date; ?></td>
						<td><b>Contact Name:</b></td>
						<td><?php echo $row->job_advertiser_name ; ?>
						</td>
					</tr>
					<tr>
						<td><b>Location:</b></td>
						<td><?php echo $row->loc_name; ?></td>
						<td><b>Contact Phone:</b></td>
						<td><?php echo $row->job_advertiser_phone ; ?></td>
					</tr>
					<tr>
						<td><b>Type:</b></td>
						<td><?php echo $row->type_name; ?></td>
						<td><b>Contact Email:</b></td>
						<td><?php echo $row->job_advertiser_email; ?></td>
					</tr>
				</table>
			</div>
			<blockquote><p><?php echo $row->job_desc; ?><p></blockquote>
			<?php endforeach ; ?>
		</div>
	</div>
</div>
<h3 class="text-center"><?php echo $this->lang->line('apply_instruction_1') . $job_title ;?></h3>
<div class="row">
	<div class="col-lg-6 col-lg-offset-3">
	<?php echo form_open('jobs/apply','role="form" class="form"'); ?>
	<div class="form-group">
		<?php echo form_error('app_name'); ?>
		<label for="app_name"><?php echo $this->lang->line('app_name');?></label>
		<?php echo form_input($app_name); ?>
	</div>
	<div class="form-group">
		<?php echo form_error('app_email'); ?>
		<label for="app_email"><?php echo $this->lang->line('app_email');?></label>
		<?php echo form_input($app_email); ?>
	</div>
	<div class="form-group">
		<?php echo form_error('app_phone'); ?>
		<label for="app_phone"><?php echo $this->lang->line('app_phone');?></label>
		<?php echo form_input($app_phone); ?>
	</div>
	<div class="form-group">
		<?php echo form_error('app_cover_note'); ?>
		<label for="app_cover_note"><?php echo $this->lang->line('app_cover_note');?></label>
		<?php echo form_textarea($app_cover_note); ?>
	</div>
	<input type="hidden" name="job_id" value="<?php echo $this->uri->segment(3); ?>" />
	<div class="form-group">
		<button type="submit" class="btn btn-default"><?php echo $this->lang->line('common_form_elements_go');?></button> or <?php echo anchor('jobs',$this->lang->line('common_form_elements_cancel'));?>
	</div>
	<?php echo form_close(); ?>
	</div>
</div>