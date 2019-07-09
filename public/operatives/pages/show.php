<?php require_once('../../../private/initialize.php'); ?>
<?php $page_title = 'Show Subject'; ?>
<?php $header_title = 'APRIORI :: FIELD/WORK '; ?>
<?php $page_type = 'Pr0Ject PAges '; ?>


<?php
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$id = $_GET['id'] ?? '1'; // PHP > 7.0
$page = find_page_by_id($id);
?>

<?php include(SHARED_PATH . '/header.php'); ?><br />
<?php include(SHARED_PATH . '/menu.php'); ?>

<div class="row show_research">
  <div class="col-1 left-eight_show_research"><br /><br />
    <div class="left-eight-subcat">
    	<h2 style="color:#fff"><?php echo $page_type ?></h2>

  	</div>
  	 <br /><br /><br />
  	 <img src="http://localhost/~margarethahaughwout/apriori/public/images/mugwortslide.gif" width="130" />
  </div>

  	<div class="col-11 show_research_main">
    <div class="attributes">
    	<h1 class="page_show_header">Pr0jECT TITLE:: <?php echo h($page['menu_name']); ?>
    	</h1>
	  <dl>
		<?php $subject = find_subject_by_id($page['subject_id']); ?>
	    <dt>Kingdom/Subject</dt>
	    <dd><?php echo h($subject['menu_name']); ?></dd>
	  </dl>

	  <dl>
	    <dt>Project LEAD</dt>
	    <dd></dd>
	  </dl>
	  <dl>
	    <dt>SITE</dt>
	    <dd></dd>
	  </dl>
	  <dl>
	    <dt>Date of Entry</dt>
	    <dd></dd>
	  </dl>
	    <dl>
        <dt>Duration</dt>
        <dd></dd>
      </dl>
      </dl>
	    <dl>
        <dt>Contacts</dt>
        <dd></dd>
      </dl>
      </dl>
	  <dl>
        <dt>Precedents</dt>
        <dd></dd>
      </dl>
      <dl>
        <dt>Links</dt>
        <dd></dd>
      </dl>
      <dl>
        <dt>Initial:Field:Notes</dt>
        <dd>test<?php echo h($page['content']); ?></dd>
      </dl>
      <dl>
        <dt>Annotations</dt>
        <dd></dd>
      </dl>
      <dl>
        <dt>Links</dt>
        <dd></dd>
      </dl>
      <img src="http://localhost/~margarethahaughwout/apriori/public/images/mugwort-wastespace.jpg" width="700" />
	</div>
	</div>

	</div>

  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>

