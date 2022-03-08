<?php 

echo view('users/templates/header');
echo view('users/templates/aside');
echo view('users/templates/headbar');

?>   
<div ui-view="" class="app-body" id="view">
	<?= $this->renderSection('content') ?>
</div>
<?php 
echo view('users/templates/footer');
?>


  
