    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Simple form validation
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const password = document.getElementById('password');
    const repassword = document.getElementById('repassword');
    
    form.addEventListener('submit', function(e) {
        if (password.value !== repassword.value) {
            e.preventDefault();
            alert('Passwords do not match!');
            return false;
        }
        
        if (password.value.length < 4 || password.value.length > 16) {
            e.preventDefault();
            alert('Password must be between 4 and 16 characters!');
            return false;
        }
    });
});
</script>

</body>
</html>
