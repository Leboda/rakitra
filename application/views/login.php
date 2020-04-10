
<div class="logo">
    <a href="javascript:void(0);">Authentification</b></a>
    <small>Eglise ou Administrateur ?</small>
</div>
<div id="infoMessage"><?php echo $message;?></div>
<div class="card">
    <div class="body">
        <?php echo form_open("utilisateur/login");?>
            <div class="msg">Connectez-vous pour démarrer votre session</div>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="material-icons">person</i>
                </span>
                <div class="form-line">
                    <?php echo form_input($identity);?>
                </div>
            </div>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="material-icons">lock</i>
                </span>
                <div class="form-line">
                    <?php echo form_input($password);?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8 p-t-5">
                    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                    <?php echo lang('login_remember_label', 'remember');?>
                </div>
                <div class="col-xs-4">
                    <?php echo form_submit('submit', lang('login_submit_btn'), array('class'=>"btn btn-block bg-pink waves-effect"));?>
                </div>
            </div>
            <div class="row m-t-15 m-b--20">
                <div class="col-xs-6">
                    
                </div>
                <div class="col-xs-6 align-right">
                  <a href="forgot_password"><?php echo lang('login_forgot_password');?></a>
                </div>
            </div>
        <?php echo form_close();?>
    </div>
</div>
   