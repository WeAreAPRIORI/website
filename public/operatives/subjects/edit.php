<?php 

  require_once('../../../private/initialize.php'); 

  if(!isset($_GET['id'])){
    redirect_to(url_for('/operatives/subjects/index.php'));
  }


  $id = $_GET['id'];

  if(is_post_request()){

  $subject = [];
  $subject['id'] = $id;
  $subject['menu_name'] = $_POST['menu_name'] ?? '';
  $subject['position'] = $_POST['position'] ?? '';
  $subject['visible'] = $_POST['visible'] ?? '';

  $result = update_subject($subject);
  if($result === true) {
    redirect_to(url_for('/operatives/subjects/show.php?id=' . $id));
  } else {
    $errors = $result;
    //var_dump($errors);
    }

  } else{
    $subject = find_subject_by_id($id);
  }
    $subject_set = find_all_subjects();
    $subject_count = mysqli_num_rows($subject_set);
    mysqli_free_result($subject_set);
  
?>
<?php $header_title = 'Edit Subject'; ?>
<?php $page_type = 'Edit Subject'; ?>
<?php $page_title = 'Revolutionary Subjects'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/operatives/subjects/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject edit">
    <h1>Edit Subject</h1>

    <?php echo display_errors($errors); ?>
    <form action="<?php echo url_for('/operatives/subjects/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($subject['menu_name']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
            <select name="position">
                <?php
                  for($i=1; $i <= $subject_count; $i++) {
                    echo "<option value=\"{$i}\"";
                    if($subject["position"] == $i) {
                      echo " selected";
                    }
                    echo ">{$i}</option>";
                  }
                ?>
            </select>       
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1" <?php if($subject['visible']=="1"){echo " checked";} ?> />
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Subject" />
      </div>
    </form>

  </div>

</div>
<?php include(SHARED_PATH . '/footer.php'); ?>