<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableAjaxValidation'=>false,
)); 
?>

<?php if(isset($_POST['login'])):
    echo $form->errorSummary($model);
endif; ?>
<table width="100%" cellspacing="10">
    <tbody>
        <tr>
            <td  align="right" width="40%"><?php echo $form->labelEx($model,'login'); ?></td>
            <td><?php echo $form->textField($model,'login'); ?></td>
        </tr>
        <tr>
            <td  align="right"><?php echo $form->labelEx($model,'password'); ?></td>
            <td><?php echo $form->passwordField($model,'password'); ?> </td>
        </tr>
        <tr>
            <td align="center" >         
            </td>
            <td>                            
                <?php echo CHtml::submitButton('Авторизоваться'); ?>
            </td>
        </tr>
    </tbody>
</table>

<?php $this->endWidget(); ?>
<!-- form -->
