        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple password validation
        document.addEventListener('DOMContentLoaded', function() {
            const password = document.getElementById('password');
            const repassword = document.getElementById('repassword');
            
            function validatePassword() {
                if (password.value !== repassword.value) {
                    repassword.setCustomValidity('Passwords do not match');
                } else {
                    repassword.setCustomValidity('');
                }
            }
            
            password.addEventListener('change', validatePassword);
            repassword.addEventListener('keyup', validatePassword);
        });
    </script>
</body>
</html>
