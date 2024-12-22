document.getElementById('clockForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const uniqueId = document.getElementById('uniqueId').value;
    
    fetch('clock.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `uniqueId=${encodeURIComponent(uniqueId)}`
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('message').innerText = data;
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

