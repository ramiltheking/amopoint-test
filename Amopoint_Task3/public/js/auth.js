const _token = document.querySelector(`meta[name="csrf-token"]`).getAttribute('content');

document.querySelector('form').addEventListener('submit', e => {
    e.preventDefault(); 

    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    fetch('/login', { 
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ email, password, _token })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Ошибка авторизации'); 
        }
        return response.json(); 
    })
    .then(data => {
        console.log('Успешная авторизация:', data);
        window.location.href = '/dashboard'; 
    })
    .catch(error => {
        console.error('Ошибка:', error);
        alert("Проверьте введенные данные");
    });
});