<?php echo render('header.php'); ?>

<?php echo \Form::open(array('action' => 'account/register' , 'class' => 'form-stacked__')); ?>

<div id="sign_up2">
    <div class="container">
        <div class="row login">
            <div class="span7 signin_box">
                <div class="box">
                    <div class="box_cont">
                        <div class="form">
							<h4>Register</h4>
								
                            	<?php echo \Form::input('first_name', \Session::get('first_name', \Input::post('first_name', '')), array('placeholder'=>'first_name')); ?>
								<?php if ($val->error('first_name')): ?>
									<div class="alert-message error" style="color:red">
										<?php echo $val->error('first_name')->get_message('insert-value'); ?>
									</div>
								<?php endif; ?>
								<br/>

								<?php echo \Form::input('last_name', \Session::get('last_name', \Input::post('last_name', '')), array('placeholder'=>'last_name')); ?>
								<?php if ($val->error('last_name')): ?>
									<div class="alert-message error" style="color:red">
										<?php echo $val->error('last_name')->get_message('insert-value'); ?>
									</div>
								<?php endif; ?>
								<br/>

								<?php echo \Form::input('email', \Session::get('email', \Input::post('email', '')),array('placeholder'=>'email')); ?>
								<?php if ($val->error('email')): ?>
									<div class="alert-message error" style="color:red">
										<?php echo $val->error('email')->get_message('invalid-email-address'); ?>
									</div>
								<?php endif; ?>
								<br/>

								<?php echo \Form::password('password','',array('placeholder'=>'choose-a-password')); ?>
								<?php if ($val->error('password')): ?>
									<div class="alert-message error" style="color:red">
										<?php echo $val->error('password')->get_message('insert-value'); ?>
									</div>
								<?php endif; ?>
								<br/>

								<?php echo \Form::password('password1','',array('placeholder'=>'repeat-password')); ?>
								<?php if ($val->error('password1')): ?>
									<div class="alert-message error" style="color:red">
										<?php echo $val->error('password1')->get_message('insert-same-password'); ?>
									</div>
								<?php endif; ?>
								<br/><br/>
								
								<?php echo \Form::submit('account/register', 'Register', array('class'=>'btn btn-primary')); ?>
								<br/><br/>
                                <div class="forgot">
									<?php echo  \Html::anchor('account/login', 'Sign-in' , array()); ?>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo \Form::close(); ?>

<?php echo render('footer.php'); ?>