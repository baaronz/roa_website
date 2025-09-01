<?php require_once 'header.php'; ?>

<div class="row h-100">
    <div class="col-12 d-flex flex-column">
        <nav class="flex-shrink-0">
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-register-tab" data-bs-toggle="tab" href="#nav-register" role="tab">
                    <i class="fas fa-user-plus me-1"></i><?php elang('register'); ?>
                </a>
                <a class="nav-item nav-link" id="nav-serverinfo-tab" data-bs-toggle="tab" href="#nav-serverinfo" role="tab">
                    <i class="fas fa-server me-1"></i><?php elang('server_info'); ?>
                </a>
                <a class="nav-item nav-link" id="nav-howtoconnect-tab" data-bs-toggle="tab" href="#nav-howtoconnect" role="tab">
                    <i class="fas fa-info-circle me-1"></i><?php elang('how_to_connect'); ?>
                </a>
            </div>
        </nav>
        
        <div class="tab-content flex-grow-1" id="nav-tabContent">
            <!-- Registration Tab -->
            <div class="tab-pane fade show active h-100" id="nav-register" role="tabpanel">
                <div class="row h-100">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title text-center mb-3">
                                    <i class="fas fa-user-plus text-primary me-2"></i>
                                    Create Account
                                </h4>
                                
                                <form action="" method="post" class="flex-grow-1 d-flex flex-column">
                                    <?php error_msg(); success_msg(); ?>
                                    
                                    <div class="mb-2">
                                        <label for="username" class="form-label">
                                            <i class="fas fa-user me-1"></i><?php elang('username'); ?>
                                        </label>
                                        <input type="text" class="form-control" id="username" name="username" required>
                                    </div>
                                    
                                    <div class="mb-2">
                                        <label for="email" class="form-label">
                                            <i class="fas fa-envelope me-1"></i><?php elang('email'); ?>
                                        </label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    
                                    <div class="mb-2">
                                        <label for="password" class="form-label">
                                            <i class="fas fa-lock me-1"></i><?php elang('password'); ?>
                                        </label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="repassword" class="form-label">
                                            <i class="fas fa-lock me-1"></i><?php elang('retype_password'); ?>
                                        </label>
                                        <input type="password" class="form-control" id="repassword" name="repassword" required>
                                    </div>
                                    
                                    <input name="submit" type="hidden" value="register">
                                    <button type="submit" class="btn btn-primary w-100 mt-auto">
                                        <i class="fas fa-user-plus me-2"></i><?php elang('register'); ?>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Server Info Tab -->
            <div class="tab-pane fade h-100" id="nav-serverinfo" role="tabpanel">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h4 class="card-title text-center mb-3">
                            <i class="fas fa-server text-primary me-2"></i>
                            Server Information
                        </h4>
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <strong><?php elang('realmlist'); ?>:</strong><br>
                                    <code class="fs-6"><?php echo get_config('realmlist'); ?></code>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <strong><?php elang('game_version'); ?>:</strong><br>
                                    <code class="fs-6"><?php echo get_config('game_version'); ?></code>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- How to Connect Tab -->
            <div class="tab-pane fade h-100" id="nav-howtoconnect" role="tabpanel">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h4 class="card-title text-center mb-3">
                            <i class="fas fa-info-circle text-primary me-2"></i>
                            How to Connect
                        </h4>
                        
                        <div class="row">
                            <div class="col-12">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'footer.php'; ?>
