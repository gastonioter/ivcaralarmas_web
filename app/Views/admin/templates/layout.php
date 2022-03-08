<?php 

echo view('admin/templates/header');
echo view('admin/templates/aside');
echo view('admin/templates/headbar');

?>   
<div ui-view="" class="app-body" id="view">
	<?= $this->renderSection('content') ?>
</div>
<?php 
echo view('admin/templates/footer');
?>