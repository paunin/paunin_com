
<a class="form_holder" id="BlogCommentHolder" title="Show/Hide form" href="#" onclick="$('.formu').toggleClass('hhh');$('#BlogCommentHolder').hide();return false;"><center><?=Yii::t('main','Send Comment')?></center></a>

    <script type="text/javascript">
        $(document).ready(function(){
           <?php if(!($_POST['BlogComment'])):?> $('#BlogComment').addClass('hhh');<?php else:?>$('#BlogCommentHolder').hide();scrollto('BlogComment');<?php endif;?>
        })
    </script>

<div class="formu" id="BlogComment">
<?php

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'blog-comment-BlogComment-form',
	'enableAjaxValidation'=>true,
)); ?>

	<?php  echo $form->errorSummary($model); ?>
    <div class="row">
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name'); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'mail'); ?>
        <?php echo $form->textField($model,'mail'); ?>
        <?php echo $form->error($model,'mail'); ?>
    </div>



	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('class'=>'tiny','rows'=>'7','cols'=>'10')); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>


     <div class="row">
        <?php $this->widget('application.extensions.recaptcha.EReCaptcha',
                            array(  'model'=>$model, 'attribute'=>'captcha',
                                    'theme'=>'clean', 'language'=>Yii::app()->language,
                                    'publicKey'=>'6Ld0lMkSAAAAAM3cfJreTL2WQqi3Q3C4_UoEUDKr ')) ?>
		<?php echo $form->error($model,'captcha');  ?>
    </div>



	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('main','Send Comment')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

