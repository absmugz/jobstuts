<?php

$this->load->view('header');

if ($details) {
	?>
	
	<h2><?php echo $details['title']; ?> <cite><?php echo $details['type']; ?></cite></h2>
	
	<p class="miscinfo">
		<?php
		if ($details['url']) { ?>
			<strong>Company:</strong> <a href="<?php echo $details['url']; ?>"><?php echo $details['company']; ?></a><br />
			<?php
		}
		else { ?>
			<strong>Company:</strong> <?php echo $details['company']; ?><br />
			<?php
		}
		?>
		<strong>Location:</strong> <?php echo $details['location']; ?>
	</p>
	
	<div class="maininfo">
		<p><?php echo nl2br($details['body']); ?></p>
		<p>&nbsp;</p>
		<p>To apply, please contact us at <a href="mailto:<?php echo $details['email']; ?>"><?php echo $details['email']; ?>.</p>
	</div>	
	
	<?php
}

else {
	
	echo '<p>Listing not found.</p>';
	
}

$this->load->view('sidebar');
$this->load->view('footer');

# End of file /views/details.php