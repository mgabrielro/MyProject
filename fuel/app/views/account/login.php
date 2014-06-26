<?php echo render('header.php'); ?>

<?php echo Form::open(array('action' => 'account/login', 'class' => 'form-stacked__',)); ?>

	<div id="sign_in1">
        <div class="container">
            <div class="row">
                <div class="span12 header">
                    <h4>Login</h4>
                </div>
                <div class="span12 footer">      	
					<?php echo \Form::input('email', Input::post('email', ''),array('placeholder'=>'email', 'style' => 'width:200px;')); ?>
					<?php if ($val->error('email')): ?>
						<div class="alert-message error" style="color:red">
							<?php echo $val->error('email')->get_message('insert-email'); ?>
						</div>
					<?php endif; ?>
					
					<?php echo \Form::password('password','',array('placeholder'=>'password') ); ?>
                    <?php if ($val->error('password')): ?>
						<div class="alert-message error" style="color:red"><?php echo $val->error('password')->get_message('enter-current-password'); ?></div>
					<?php endif; ?>

                    <?php echo \Form::submit('account/login', 'Login', array('class' => 'btn btn-primary')); ?>
                </div>
                <br />
                <div class="proof">
                    <div class="dosnt">
						<?php echo \Html::anchor('account/register', 'Register', array('class' => '')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php echo Form::close(); ?>

<?php echo render('footer.php'); ?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$("a.connectlink").click(function(){
			alert("Dieses Feature is noch nicht aktiv.");
			return false;
		});
	});
</script>