<div class="forma">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'content-content-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'prior'); ?>
		<?php echo $form->textField($model,'prior'); ?>
		<?php echo $form->error($model,'prior'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'abr'); ?>
		<?php echo $form->textField($model,'abr'); ?>
		<?php echo $form->error($model,'abr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'en_name'); ?>
		<?php echo $form->textField($model,'en_name'); ?>
		<?php echo $form->error($model,'en_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ru_name'); ?>
		<?php echo $form->textField($model,'ru_name'); ?>
		<?php echo $form->error($model,'ru_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'en_text'); ?>
		<?php echo $form->textArea($model,'en_text',array('class'=>'big_tiny','rows'=>'7','cols'=>'10')); ?>
		<?php echo $form->error($model,'en_text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ru_text'); ?>
		<?php echo $form->textArea($model,'ru_text',array('class'=>'big_tiny','rows'=>'7','cols'=>'10')); ?>
		<?php echo $form->error($model,'ru_text'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->