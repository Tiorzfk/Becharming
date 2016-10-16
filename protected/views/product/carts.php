

        <div class="row">
            <div class="col-lg-12">
                <h2></h2>
                <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'tinstrument-form',
    'enableAjaxValidation'=>false,
)); ?>
                <?php
                $label=array();
                $nilai=array();
             foreach($dataProvider->getData() as $i=>$ii)
{
    $label[$i]=$ii['aa'];
    echo $nilai[$i]=(int)$ii['id'];
}
?>
<?php $this->endWidget(); ?>
        </div>

    </div>