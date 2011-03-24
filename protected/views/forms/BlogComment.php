<a class="form_holder" id="BlogCommentHolder" title="Show/Hide form" href="#" onclick="$('.formu').toggleClass('hhh');$('#BlogCommentHolder').hide();return false;"><center><?=Yii::t('main','Send Comment')?></center></a>
    
    <script type="text/javascript">
        $(document).ready(function(){
           <?php if(!($_POST['BlogComment'])):?> $('#BlogComment').addClass('hhh');<?php else:?>$('#BlogCommentHolder').hide();scrollto('BlogComment');<?php endif;?>
        })
    </script>
    
<div class="formu" id="BlogComment">
<?php 
$updateCaptcha=<<<EOD
function(form,attribute,data,hasError) {
    var i=form.find('.captcha img').first();
                var h=/^.*\?v=/.exec(i.attr('src'));  // will cut off the number part at the end of image src URL (".../v/123456")
    i.attr('src',h+Math.floor(100000*Math.random()));  // creates a new random number to prevent image caching
    return true;

}
EOD;

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'blog-comment-BlogComment-form',
	'enableAjaxValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
        'afterValidateAttribute'=>'js:'.$updateCaptcha,
        'afterValidate'=>'js:'.$updateCaptcha,
    ),

)); ?>

	<p class="note"><?=Yii::t('main','Fields with * are required.')?></p>

	<?php echo $form->errorSummary($model); ?>



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


<table>
    <tr>
        <td>	
            <div class="row">
    		<?php echo $form->labelEx($model,'captcha'); ?>
    		<?php echo $form->textField($model,'captcha'); ?>
    		<?php echo $form->error($model,'captcha'); ?>
            </div>
        </td>
        <td width="130" class="captcha"><?php $this->widget('CCaptcha', array('captchaAction' => 'site/captcha','showRefreshButton' => false,'buttonLabel' =>'++'));?>
        </td>
    </tr>
</table>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('main','Send Comment')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->