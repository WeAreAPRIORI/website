<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/operatives/pages/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

  $result = delete_page($id);
  redirect_to(url_for('/operatives/pages/index.php'));

} else {
  $page = find_page_by_id($id);
}

?>

<?php $header_title = ''; ?>
<?php $page_title = ''; ?>
<?php $page_type = 'Delete Delete Delete'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php include(SHARED_PATH . '/menu.php'); ?>

<div class="row show_research">
  <div class="col-1 left-eight_show_research"><br /><br />
    <div class="left-eight-subcat">
      <h2 style="color:#fff"><?php echo $page_type ?></h2>
    </div>
  </div>

    <div class="col-9 show_research_main">

    <div class="page_delete">

      <h1>Delete Page</h1>
      <p>Are you sure you want to delete this page: 
      "<?php echo h($page['menu_name']); ?>" ??</p>
      <br /><br />
      <form action="<?php echo url_for('/operatives/pages/delete.php?id=' . h(u($page['id']))); ?>" method="post">
        <div>
          <button class="buttonName2" type="submit" value="Create Page">Delete ReSearch Page</button>
        </div>
      </form>
    </div>

</div>
</div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
