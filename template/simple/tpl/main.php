<?php require_once 'header.php'; ?>

<div class="row">
    <div class="col-12">
        <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-register-tab" data-bs-toggle="tab" href="#nav-register" role="tab">
                    <i class="fas fa-user-plus me-2"></i><?php elang('register'); ?>
                </a>
                <a class="nav-item nav-link" id="nav-serverinfo-tab" data-bs-toggle="tab" href="#nav-serverinfo" role="tab">
                    <i class="fas fa-server me-2"></i><?php elang('server_info'); ?>
                </a>
                <a class="nav-item nav-link" id="nav-howtoconnect-tab" data-bs-toggle="tab" href="#nav-howtoconnect" role="tab">
                    <i class="fas fa-info-circle me-2"></i><?php elang('how_to_connect'); ?>
                </a>
                <?php if(!empty(get_config('supported_langs'))) { ?>
                <a class="nav-item nav-link" id="nav-language-tab" data-bs-toggle="modal" data-bs-target="#lang-modal">
                    <i class="fas fa-globe me-2"></i><?php elang('change_lang_head'); ?>
                </a>
                <?php } ?>
            </div>
        </nav>
        
        <div class="tab-content py-4" id="nav-tabContent">
            <!-- Registration Tab -->
            <div class="tab-pane fade show active" id="nav-register" role="tabpanel">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h4 class="card-title text-center mb-4">
                                    <i class="fas fa-user-plus text-primary me-2"></i>
                                    Create Account
                                </h4>
                                
                                <form action="" method="post">
                                    <?php error_msg(); success_msg(); ?>
                                    
                                    <div class="mb-3">
                                        <label for="username" class="form-label">
                                            <i class="fas fa-user me-2"></i><?php elang('username'); ?>
                                        </label>
                                        <input type="text" class="form-control" id="username" name="username" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="email" class="form-label">
                                            <i class="fas fa-envelope me-2"></i><?php elang('email'); ?>
                                        </label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="password" class="form-label">
                                            <i class="fas fa-lock me-2"></i><?php elang('password'); ?>
                                        </label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label for="repassword" class="form-label">
                                            <i class="fas fa-lock me-2"></i><?php elang('retype_password'); ?>
                                        </label>
                                        <input type="password" class="form-control" id="repassword" name="repassword" required>
                                    </div>
                                    
                                    <input name="submit" type="hidden" value="register">
                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="fas fa-user-plus me-2"></i><?php elang('register'); ?>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="server-info">
                            <h5><i class="fas fa-server me-2"></i><?php elang('server_info'); ?></h5>
                            <div class="row">
                                <div class="col-6">
                                    <strong><?php elang('realmlist'); ?>:</strong><br>
                                    <code><?php echo get_config('realmlist'); ?></code>
                                </div>
                                <div class="col-6">
                                    <strong><?php elang('game_version'); ?>:</strong><br>
                                    <code><?php echo get_config('game_version'); ?></code>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <h6 class="text-muted mb-3">Quick Tips:</h6>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check text-success me-2"></i>Username must be unique</li>
                                <li><i class="fas fa-check text-success me-2"></i>Use a valid email address</li>
                                <li><i class="fas fa-check text-success me-2"></i>Password: 4-16 characters</li>
                                <li><i class="fas fa-check text-success me-2"></i>Keep your credentials safe</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Server Info Tab -->
            <div class="tab-pane fade" id="nav-serverinfo" role="tabpanel">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="card-title text-center mb-4">
                            <i class="fas fa-server text-primary me-2"></i>
                            Server Information
                        </h4>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <strong><?php elang('realmlist'); ?>:</strong><br>
                                    <code class="fs-6"><?php echo get_config('realmlist'); ?></code>
                                </div>
                                <div class="mb-3">
                                    <strong><?php elang('game_version'); ?>:</strong><br>
                                    <code class="fs-6"><?php echo get_config('game_version'); ?></code>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <strong>Note:</strong> Make sure to set your realmlist to the server address above before connecting.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- How to Connect Tab -->
            <div class="tab-pane fade" id="nav-howtoconnect" role="tabpanel">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="card-title text-center mb-4">
                            <i class="fas fa-info-circle text-primary me-2"></i>
                            How to Connect
                        </h4>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Step 1: Download Client</h6>
                                <p>Download the appropriate game client version for our server.</p>
                                
                                <h6>Step 2: Set Realmlist</h6>
                                <p>Navigate to your game directory and edit the <code>realmlist.wtf</code> file:</p>
                                <pre><code>set realmlist <?php echo get_config('realmlist'); ?></code></pre>
                                
                                <h6>Step 3: Create Account</h6>
                                <p>Use the registration form above to create your account.</p>
                                
                                <h6>Step 4: Connect</h6>
                                <p>Launch the game and log in with your credentials!</p>
                            </div>
                            <div class="col-md-6">
                                <div class="alert alert-warning">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <strong>Important:</strong> Make sure you're using the correct game version to avoid compatibility issues.
                                </div>
                                
                                <div class="alert alert-success">
                                    <i class="fas fa-check-circle me-2"></i>
                                    <strong>Ready to play?</strong> Once you've created your account, you can immediately start playing!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Language Modal -->
<?php if(!empty(get_config('supported_langs'))) { ?>
<div class="modal fade" id="lang-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-globe me-2"></i><?php elang('change_lang_head'); ?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="row">
                        <?php foreach(get_config('supported_langs') as $lang_code => $lang_name) { ?>
                        <div class="col-6 mb-2">
                            <button type="submit" name="langchangever" value="1" class="btn btn-outline-primary w-100">
                                <input type="hidden" name="langchange" value="<?php echo $lang_code; ?>">
                                <?php echo $lang_name; ?>
                            </button>
                        </div>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php require_once 'footer.php'; ?>
