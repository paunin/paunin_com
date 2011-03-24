<div class="form">
<style type="text/css">
input{
    border: 1px solid gray;
    
}  
input.error{
    color: red;
    border: red solid 1px;    
    
   
}
</style>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'exists-exists-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля со звёздочкой обязательны</p>
	<p class="note">Count должен делиться на 3</p>
	<?php //echo $form->errorSummary($items); ?>
                                     
<table>                                   
<tr><th><?php echo $form->labelEx($items[0],'name'); ?></th><th> <?php echo $form->labelEx($items[0],'price'); ?></th><th><?php echo $form->labelEx($items[0],'count'); ?></th><th><?php echo $form->labelEx($items[0],'descr'); ?></th><th></th></tr>
<?php foreach($items as $i=>$item): ?>
<tr>               
    <td><?php echo $form->textField($item,"[$i]name"); ?><!--br /><?php echo $form->error($item,"name"); ?>--></td>
    <td><?php echo $form->textField($item,"[$i]price"); ?><!--br /><?php echo $form->error($item,"price"); ?>--></td>
    <td><?php echo $form->textField($item,"[$i]count"); ?><!--br /><?php echo $form->error($item,"count"); ?>--></td>
    <td><?php echo $form->textField($item,"[$i]descr"); ?><!--br /><?php echo $form->error($item,"descr"); ?>--></td>        
    <td><?php echo $form->hiddenField($item,"[$i]id"); ?>
        <?php echo CHtml::submitButton('Submit',array('name'=>"Exists[$i][del]",'value'=>'-')); ?>
    </td>
        
</tr>
<?php endforeach; ?>
</table>
	<div class="row buttons">                           
		<?php echo CHtml::submitButton('Submit',array('name'=>"save",'value'=>'save')); ?>
        <?php echo CHtml::submitButton('Submit',array('name'=>"add",'value'=>'+')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->