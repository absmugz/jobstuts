</div><!-- #content -->

<div id="sidebar">

    <p class="addlisting"><a href="<?php echo site_url('jobs/add'); ?>">Add a Listing</a></p>
    <h2>Categories</h2>
    <ul>
        <li><a href="<?php echo site_url('jobs/listings'); ?>"><span>&raquo;</span> All</a></li>
        <!-- Categories will go here -->

        <?php
        if ($categories) {
            foreach ($categories as $row) {
                $segments = array('jobs', 'listings', $row['id']);
                ?>
                <li><a href="<?php echo site_url($segments); ?>"><span>&raquo;</span> <?php echo $row['name']; ?></a></li>
                <?php
            }
        }
        ?> 
    </ul>

</div><!-- #sidebar --> 