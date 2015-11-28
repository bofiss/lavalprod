<div class="container contcolor continscription">
    <div id="deco_blanc3"></div>
    <div class="col-sm-12 cadre">
        <div class="entete"></div>
        <div class="panel">
            <div class="panel-heading enteteFlou">
                <h1>RESET PASSWORD</h1>
                <div class="cercle">
                    <img
                        src="<?php echo URL ?>img/connexion.png"
                        alt="logo" height="63px" width="71px"
                        style="top: 18px; position: relative; left: 12px" />
                </div>
            </div>
            <div class="panel-body panelCategorie">
                <h1>New Password</h1>
                <form method = "post" class="form-horizontal formConnexion" data-toggle="validator" role="form" action="/user/sendMail">
                    <fieldset>
                       <div class="form-group">
							<input type="password" name="user[password]" data-minlength="6" maxlength="40" class="form-control floating-label" id="inputPassword" placeholder="Password" required>
						</div>

						<div class="form-group">
							<input type="password" name="user[password2]" data-match="#inputPassword" data-minlength="6" maxlength="40" class="form-control floating-label" id="inputPasswordConfirm" placeholder="Confirm password" required>
						</div>
                            <div class="text-right creaCompteDiv">
                                <button type="submit" class="btn btn-sm btn-material-teal-200">Validate</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>