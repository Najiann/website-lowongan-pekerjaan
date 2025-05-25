<?php
session_start(); 
session_unset(); 
session_destroy(); 
?>

<script>
    if (confirm('Apakah Anda yakin ingin logout?')) {
        alert('Anda telah logout!');
        window.location.href = 'login.php';
    } else {
        window.history.back(); 
    }

    
    history.pushState(null, null, 'login.php');
    window.addEventListener('popstate', function () {
        history.pushState(null, null, 'login.php');
    });
</script>
