<div id="data"></div>
<?php 
Yii::app() -> clientScript -> registerCoreScript('jquery', CClientScript::POS_BEGIN);?>
<script>
$(document).ready(function(){
$('#data').load('<?php echo Yii::app()->request->baseUrl;?>/Category/admintable');
});
</script>