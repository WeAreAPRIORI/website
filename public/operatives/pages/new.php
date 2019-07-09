<?php

require_once('../../../private/initialize.php');

if(is_post_request()) {

  $page = [];
  $page['subject_id'] = $_POST['subject_id'] ?? '';
  $page['menu_name'] = $_POST['menu_name'] ?? '';
  $page['position'] = $_POST['position'] ?? '';
  $page['visible'] = $_POST['visible'] ?? '';
  $page['content'] = $_POST['content'] ?? '';

  $result = insert_page($page);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/operatives/pages/show.php?id=' . $new_id));
  } else {
    $errors = $result;
  }

} else {

  $page = [];
  $page['subject_id'] = '';
  $page['menu_name'] = '';
  $page['position'] = '';
  $page['visible'] = '';
  $page['content'] = '';

}

$page_set = find_all_pages();
$page_count = mysqli_num_rows($page_set) + 1;
mysqli_free_result($page_set);

?>

<?php $header_title = 'Research Pages'; ?>
<?php $page_type = 'Revolutionary Ecologies '; ?>
<?php $page_title = 'Standard 1nquiry F0RM'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php include(SHARED_PATH . '/menu.php'); ?>


  <div class="row">
  <div class="col-1 left-eight"><br /><br />
    <div class="left-eight-subcat">
    	<h2 style="color:#EE00EE"><?php echo $page_type ?></h2>
  	</div>
  </div>

   
  <div class="col-8 show_research_main" style="padding-left:50px;background-color: #00C78C;">

  	<div class="page_title standard_inquiry">
    	<h1><?php echo $page_title ?></h1></div>
     <?php echo display_errors($errors); ?>
     <form action="<?php echo url_for('/operatives/pages/new.php') ?>" method="post">

    <table>
  	  <tr>
        <th style="width:300px;"></th>
        <th ></th>
      </tr>
      <tr>
      	<td>Project LEAD </td>
      	<td><input type="text" name="project_lead" value="" size="35" /></td>
      </tr>
      <tr>
      	<td>PROJECT TITLE
(research q) </td>
      	<td><input type="text" size="55" name="menu_name" value="<?php echo h($page['menu_name']); ?>" /></td>
      </tr>
      <tr>
      	<td>sIte :</td>
      	<td><input type="text" size="45" name="site" value="" /></td>
      </tr>
      <tr>
      	<td>Date :</td>
      	<td><input type="date" name="date" value="" /></td>
      </tr>
      <tr>
      	<td>Duration :</td>
      	<td><input type="text" name="duration" value="" /></td>
      </tr>
      <tr>
      	<td>SubJECT :</td>
      	<td >
      		
      		<select class="select-css" style="width:200px;" class="custom-select" name="subject_id">
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
      	
      </td>
      </tr>
      <tr>
      	<td>CONTACTS :</td>
      	<td><input type="email" name="email" value="" /></td>
      </tr>
      <tr>
      	<td>PRECEDENTS 
:</td>
      	<td><input type="text" name="precedentts" value="" /></td>
      	<tr>
      	<td>LINKS :</td>
      	<td><input type="url" name="links" value="" /></td>
      </tr>
      <tr>
      	<td>Project LEAD inital FIELD:NOTES :</td>
      	<td><textarea name="content" cols="60" rows="20"><?php echo h($page['content']); ?></textarea></td>
      </tr>

      <tr>
      	<td>Ann0tat1ons :</td>
      	<td><textarea name="annotations" cols="50" rows="7"></textarea></td>
      </tr>

      <tr>
      	<td>make research visible? :) :</td>
      	<td>
      		<input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1" <?php if($page['visible']=="1"){echo " checked";} ?>  />
      	</td>
      </tr>
      <tr>
      	<td>position</td>
      	<td><select name="position">
            <?php
              for($i=1; $i <= $page_count; $i++) {
                echo "<option value=\"{$i}\"";
                if($page["position"] == $i) {
                  echo " selected";
                }
                echo ">{$i}</option>";
              }
            ?>
          </select></td>
      
  </table>

	<table>
		<tr>
			<td>Select image to upload:</td>
			<td><input class="buttonName" type="file" name="imgfileToUpload" id="imgfileToUpload"></td>
    		<td><button class="buttonName" type="submit" value="Upload Image" name="submit">SUBMIT</button></td>
    	</tr>
	</table>

	<table>
		<tr>
			<td>Select files to upload:</td>
			<td><input class="buttonName" type="file" name="filefileToUpload" id="filefileToUpload"></td>
    		<td><button class="buttonName" type="submit" value="Upload Image" name="submit">SUBMIT</button></td>
    	</tr>
	</table>


	<div id="operations">
        <button class="buttonName2" type="submit" value="Create Page">Submit ReSearch Page</button>
        <!-- <input type="submit" value="Create Subject" /> -->
      </div>
   </form>
	</div>
  <div class="col-s-3 lists" style="background-color:#EE00EE; color:#fff; border:solid 1px #00C78C; font-size:13px">
	
	::DNLD RESEARCH FORMS AS PDFs::<br />
		<a target="new" href="http://www.weareapriori.net/forms/animalFINDINGS.pdf">animal-related: FINDINGS.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/animalOBJECTIVES.pdf">animal-related: OBJECTIVES.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/animalPROCEDURE.pdf">animal-related: PROCEDURE.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/animalSTANDARD.pdf">animal-related: STANDARD.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/animalWORKSCITED.pdf">animal-related: WORKS CITED.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/machine-plant-animalFINDINGS.pdf">machine-plant-animal-related: FINDINGS.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/machine-plant-animalOBJECTIVES.pdf">machine-plant-animal-related: OBJECTIVES.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/machine-plant-animalPROCEDURE.pdf">amachine-plant-animal-related: PROCEDURE.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/machine-plant-animalSTANDARD.pdf">machine-plant-animal-related: STANDARD.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/machine-plant-animalWORKSCITED.pdf">machine-plant-animal-related: WORKS CITED.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/machineanimalFINDINGS.pdf">machine-animal-related: FINDINGS.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/machineanimalOBJECTIVES.pdf">machine-animal-related: OBJECTIVES.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/machineanimalPROCEDURE.pdf">machine-animal-related: PROCEDURE.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/machineanimalSTANDARD.pdf">machine-animal-related: STANDARD.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/machineanimalWORKSCITED.pdf">machine-animal-related: WORKS CITED.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/machineFINDINGS.pdf">machine related: FINDINGS.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/machineOBJECTIVES.pdf">machine related: OBJECTIVES.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/machinePROCEDURE.pdf">machine related: PROCEDURE.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/machineSTANDARD.pdf">machine related: STANDARD.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/machineWORKSCITED.pdf">machine related: WORKS CITED.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/machineplantFINDINGS.pdf">machine-plant related: FINDINGS.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/machineplantOBJECTIVES.pdf">machine-plant related: OBJECTIVES.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/machineplantPROCEDURE.pdf">machine-plant related: PROCEDURE.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/machineplantSTANDARD.pdf">machine-plant related: STANDARD.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/machineplantWORKSCITED.pdf">machine-plant related: WORKS CITED.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/plantanimalFINDINGS.pdf">plant-animal related: FINDINGS.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/plantanimalOBJECTIVES.pdf">plant-animal related: OBJECTIVES.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/plantanimalPROCEDURE.pdf">plant-animal related: PROCEDURE.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/plantanimalSTANDARD.pdf">plant-animal related: STANDARD.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/plantanimalWORKSCITED.pdf">plant-animal related: WORKS CITED.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/plantFINDINGS.pdf">plant related: FINDINGS.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/plantOBJECTIVES.pdf">plant related: OBJECTIVES.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/plantPROCEDURE.pdf">plant related: PROCEDURE.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/plantSTANDARD.pdf">plant related: STANDARD.pdf</a><br />
		<a target="new" href="http://www.weareapriori.net/forms/plantWORKSCITED.pdf">plant related: WORKS CITED.pdf</a>
</div>
</div>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>