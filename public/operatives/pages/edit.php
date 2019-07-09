<?php

    require_once('../../../private/initialize.php');

    if(!isset($_GET['id'])) {
      redirect_to(url_for('/operatives/pages/index.php'));
    }
    $id = $_GET['id'];

    if(is_post_request()) {

      // Handle form values sent by new.php

      $page = [];
      $page['id'] = $id;
      $page['subject_id'] = $_POST['subject_id'] ?? '';
      $page['menu_name'] = $_POST['menu_name'] ?? '';
      $page['position'] = $_POST['position'] ?? '';
      $page['visible'] = $_POST['visible'] ?? '';
      $page['content'] = $_POST['content'] ?? '';

      $result = update_page($page);
      if($result === true) {
        redirect_to(url_for('/operatives/pages/show.php?id=' . $id));
      } else {
        $errors = $result;
      }

    } else {

      $page = find_page_by_id($id);

    }

    $page_set = find_all_pages();
    $page_count = mysqli_num_rows($page_set);
    mysqli_free_result($page_set);

?>

<?php $header_title = 'Research Pages'; ?>
<?php $page_type = 'Tracking Revolutionary Ecologies of WOrk'; ?>
<?php $page_title = 'Revolutionary Ecologies'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php include(SHARED_PATH . '/menu.php'); ?>

<div class="row show_research">
  <div class="col-1 left-eight_show_research"><br /><br />
    <div class="left-eight-subcat">
      <h2 style="color:#fff"><?php echo $page_type ?></h2>
    </div>
  </div>

    <div class="col-11 edit_research_main">

  <div class="attributes">
    <h1>Edit Page</h1>
    
    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/operatives/pages/edit.php?id=' . h(u($id))); ?>" method="post">

      <dl>
        <dt>Subject</dt>
         <dd>
          <select name="subject_id">
          <?php
            $subject_set = find_all_subjects();
            while($subject = mysqli_fetch_assoc($subject_set)) {
              echo "<option value=\"" . h($subject['id']) . "\"";
              if($page["subject_id"] == $subject['id']) {
                echo " selected";
              }
              echo ">" . h($subject['menu_name']) . "</option>";
            }
            mysqli_free_result($subject_set);
          ?>
          </select>
        </dd>
      </dl>

      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($page['menu_name']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Position</dt>
        <dd>
            <select name="position">
                <?php
                  for($i=1; $i <= $page_count; $i++) {
                    echo "<option value=\"{$i}\"";
                    if($page["position"] == $i) {
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
          <input type="checkbox" name="visible" value="1" <?php if($page['visible']=="1"){echo " checked";} ?> />
        </dd>
      </dl>
      <dl>
        <dt>Content</dt>
        <dd>
          <textarea name="content" cols="60" rows="10"><?php echo h($page['content']); ?></textarea>
        </dd>
      </dl>
      <div id="editform">
        <button class="buttonName2" type="submit" value="Create Page">Edit ReSearch Page</button>
        <!-- <input type="submit" value="Edit Page" /> -->
      </div>
    </form>


  </div>
</div>
</div>

</div>
<?php include(SHARED_PATH . '/footer.php'); ?>