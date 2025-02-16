const _token = document.querySelector(`meta[name="csrf-token"]`).getAttribute('content');

document.addEventListener("DOMContentLoaded", function(){
    fetch('https://ipinfo.io/json') 
    .then(response => response.json())
    .then(data => {
        let ip = data.ip;
        let city = data.city || "Неизвестно";
        let device = navigator.userAgent;

        fetch("/save-user-stats", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ ip, city, device, _token })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Данные отправлены:', data);
        })
        .catch(error => {
            console.error('Ошибка отправки данных в обработчик:', error);
        });
    })
    .catch(error => {
        console.error('Ошибка получения данных по IP:', error);
    });
});
