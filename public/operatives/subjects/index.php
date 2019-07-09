<?php $header_title = 'A PRIORI :: FIELD/WORK '; ?>
<?php $page_type = 'SUBJECTS '; ?>
<?php $page_title = 'Revolutionary Subjects'; ?>

<?php require_once('../../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<?php
	$subject_set = find_all_subjects();
?>
 

<div class="row">
  <div class="col-1 rev_ecologies"><br /><br />
    <div class="rev_ecologies-subcat">

    <h2><?php echo $page_title ?></h2>
  </div>
</div>

  <div class="col-8">
    <?php include(SHARED_PATH . '/menu.php'); ?>
  
    <div class="subjects listing">

    <div class="actions">
      <a class="action" href="<?php echo url_for('/operatives/subjects/new.php') ?>">Create New Subject</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>ID</th>
        <th>Position</th>
        <th>Visible</th>
  	    <th>Name</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php while ($subject = mysqli_fetch_assoc($subject_set)) { ?>
        <tr>
          <td><?php echo h($subject['id']); ?></td>
          <td><?php echo h($subject['position']); ?></td>
          <td><?php echo $subject['visible'] == 1 ? 'true' : 'false'; ?></td>
    	    <td><?php echo h($subject['menu_name']); ?></td>
          <td><a class="action" href="<?php echo url_for('/operatives/subjects/show.php?id=' . h(u($subject['id']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/operatives/subjects/edit.php?id=' . h(u($subject['id']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/operatives/subjects/delete.php?id=' . h(u($subject['id']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

  	<?php 
  		mysqli_free_result($subject_set);
  	?>

  </div>
</div>


<div class="col-3 typology">
  
</div>

</div>


</div>




 <?php include(SHARED_PATH . '/footer.php'); ?>