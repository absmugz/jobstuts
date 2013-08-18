<?php

$this->load->view('header');

echo '<h2>Add a Listing</h2>';

$category_options = array();
foreach ($categories as $row) {
	$category_options[$row['id']] = $row['name'];
}

$type_options = array(
	'Full Time' => 'Full Time',
	'Part Time' => 'Part Time',
	'Freelance' => 'Freelance'
);

echo validation_errors('<p class="error">','</p>');
echo form_open('jobs/submit');
?>
<fieldset>
	<legend>Job Details</legend>
	<p>Title: <input type="text" name="title" size="50" value="<?php echo set_value('title'); ?>" /></p>
	<p>Category: <?php echo form_dropdown('category', $category_options); ?></p>
	<p><textarea name="body" rows="15" cols="75"><?php echo set_value('body'); ?></textarea></p>
	<p>Type: <?php echo form_dropdown('type', $type_options); ?></p>
	<p>Location: <input type="text" name="location" size="50" value="<?php echo set_value('location'); ?>" /></p>
</fieldset>
<fieldset>
	<legend>Your Details</legend>
	<p>Your/Company Name: <input type="text" name="company" size="50" value="<?php echo set_value('company'); ?>" /></p>
	<p>URL: <input type="text" name="url" size="50" value="<?php echo set_value('url'); ?>" /></p>
	<p>Email: <input type="text" name="email" size="50" value="<?php echo set_value('email'); ?>" /></p>
</fieldset>
<input type="submit" value="Submit Listing" />
</form>

<?php
$this->load->view('sidebar');
$this->load->view('footer');

# End of file /views/add.php