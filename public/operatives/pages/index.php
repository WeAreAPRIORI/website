
<?php $page_title = 'Revolutionary Ecologies: '; ?>
<?php $header_title = 'A PRIORI :: FIELD/WORK '; ?>
<?php $page_type = 'PAGES '; ?>
<?php require_once('../../../private/initialize.php'); ?>

<?php
	$page_set = find_all_pages();
?>

<?php include(SHARED_PATH . '/header.php'); ?>
<?php include(SHARED_PATH . '/menu.php'); ?>



<div class="row">
  <div class="col-1 left-eight"><br /><br />
    <div class="left-eight-subcat">
    	<h2><?php echo $page_title ?></h2>
  	</div>
  </div>

   
  <div class="col-8 show_research_main" style="padding-left:50px;">

  	<table>
  	  <tr>
        <th class="bgpinkish">Index</th>
        <th class="bgblack">Kingdom Subjects</th>
       
  	    <th class="bgbrown" style="width:300px">Name</th>
  	
  	    <th class="bggreen">&nbsp;</th>
        <th class="bgpinkish">&nbsp;</th>
  	  </tr>

      <?php while ($page = mysqli_fetch_assoc($page_set)) { ?>
         <tr>
          <td class="bggreen">000<?php echo h($page['id']); ?> </td>
          <td class="bgpinkish"><?php
            $subject_set = find_all_subjects();
            while($subject = mysqli_fetch_assoc($subject_set)) {
              
              if($page["subject_id"] == $subject['id']) {
                echo h($subject['menu_name']);
              }
            }
            mysqli_free_result($subject_set);
          	?></td>
          	<!--<?php echo h($page['position']); ?>
          <td><?php echo $page['visible'] == 1 ? 'true' : 'false'; ?></td>-->
    	    
          	<td class="bggreen"><a class="action" href="<?php echo url_for('/operatives/pages/show.php?id=' . h(u($page['id']))); ?>"><?php echo h($page['menu_name']); ?></a></td>
          	<td class="bgblack"><a class="action edit-delete" href="<?php echo url_for('/operatives/pages/edit.php?id=' . h(u($page['id']))); ?>">Edit</a></td>
          	<td class="bgblack"><a class="action edit-delete" href="<?php echo url_for('/operatives/pages/delete.php?id=' . h(u($page['id']))); ?>">Delete</a></td>
          </tr>
    	  
      <?php } ?>
  	

  	<?php 
  		mysqli_free_result($page_set);
  	?>

	</table>
  <!--close col 8?-->
</div>
<div class="col-s-3" style="background-color:#00C78C; border:solid 1px black; font-size:13px">
	
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



<!-- close row-->
</div>
<script type="text/javascript">
        
 	var imgCount = 4;
    var dir = '../../images/';
    var randomCount = Math.round(Math.random() * (imgCount - 1)) + 1;
    var images = new Array
            images[1] = "Plant-Count.png",
            images[2] = "punchcard.png",
            images[3] = "screenshot2.png";
            images[4] = "flaxpic.png",
            
            
    document.body.style.background = "url(" + images[randomCount] + ")";
    document.body.style.backgroundSize= "800px";
    document.body.style.backgroundRepeat= "no-repeat";

        //----^----for not repeat the background
    </script>


<!--close wrapper?-->
</div>



<?php include(SHARED_PATH . '/footer.php'); ?>