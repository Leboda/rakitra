<div class="row">
    <div class="col-xs-12 col-md-12 col-sm-12">
        <div class="logo">
            <a href="javascript:void(0);">Authentification / Inscription</b></a>
            <small>Eglise ou Administrateur ?</small>
             
        </div>

        <div class="card">
            <div class="header">
                <h2>Avez-vous un compte ? Si non inscrivez-vous</h2>
            </div>
            <div class="body">
                <div>
                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                        <li role="presentation" class="active"><a href="#authentification" data-toggle="tab">Autnetification</a></li>
                        <li role="presentation"><a href="#inscription" data-toggle="tab">Inscription</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active in active" id="authentification">

                            <div id="infoMessage"><?php echo $message;?></div>
                            <div class="demo-settings">
                                <h4>Authentification</h4>
                                <?php echo form_open("user-login");?>
                                  <input type="hidden" name="form-auth-choice" value="2">
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
                        <div role="tabpanel" class="tab-pane fade" id="inscription">
                          <h4>Inscription</h4>
                          <div class="msg">Veuillez remplir cette formulaire pour vous inscrire.</div>
                          <div id="infoMessage" class="font-bold col-pink"><?php echo $message;?></div>
                          <?php echo form_open("user-login");?> 
                            <input type="hidden" name="form-auth-choice" value="1">
                            <h2 class="card-inside-title">Nomination de l'eglise</h2>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">account_balance</i>
                                        </span>
                                        <div class="form-line">
                                            <?php echo form_input($name);?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h2 class="card-inside-title">Adresse de l'eglise</h2>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">spellcheck</i>
                                        </span>
                                        <div class="form-line">
                                            <?php echo form_input($adresse);?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h2 class="card-inside-title">Contacts et identificatiant de l'accès</h2>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="input-group">                                      
                                        <span class="input-group-addon">
                                            <i class="material-icons">email</i>
                                        </span>
                                        <div class="form-line">
                                            <?php echo form_input($email);?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">perm_device_information</i>
                                        </span>
                                        <div class="form-line">
                                            <?php echo form_input($phone);?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <h2 class="card-inside-title">Mot de passe d'accés</h2>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="input-group">                                  
                                        <span class="input-group-addon">
                                            <i class="material-icons">lock</i>
                                        </span>
                                        <div class="form-line">
                                            <?php echo form_input($password_subscribe);?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">check</i>
                                        </span>
                                        <div class="form-line">
                                            <?php echo form_input($password_confirm);?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <h2 class="card-inside-title">Description de l'eglise</h2>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" name="description" placeholder="Une petite description de l'eglise"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row text-center">
                              <div class="col-xs-3">
                              </div>
                              <div class="col-xs-4">
                                <input type="submit" name="submit" value="S'inscrire" class="btn btn-block bg-pink waves-effect">
                              </div>
                              <div class="col-xs-3">
                              </div>
                            </div>

                          <?php echo form_close();?>
                         
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

   