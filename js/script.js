function clickChecked() {
    let checkMeOut = document.getElementById('check-me-out')
    let idPelanggan = document.getElementById('id_pelanggan')
    if(checkMeOut.checked) 
    {
        idPelanggan.type = 'text'
    }
    else
    {
        idPelanggan.type = 'password'
    }
}

function logout(){
    fetch('../service/logout.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ logout: true })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return window.open('../pages/index.php', '_self')
    })
    .catch(error => {
        console.error('Error executing PHP function:', error);
    });
}

function goToLogin() {
    window.open('../pages/login.php','_self')
}

