<div id="main-wrapper">
    <div class="row">
		<div id="form"></div>
		<div id="table"></div>
	</div>
</div>
<?php 
Yii::app() -> clientScript -> registerCoreScript('jquery', CClientScript::POS_BEGIN);?>
<script>
$(document).ready(function(){
    $("#form").load('<?php echo Yii::app()->request->baseUrl;?>/page/create');
    $("#table").load('<?php echo Yii::app()->request->baseUrl;?>/page/table');
});
</script>