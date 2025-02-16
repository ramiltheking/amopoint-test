const _token = document.querySelector(`meta[name="csrf-token"]`).getAttribute('content');


document.addEventListener("DOMContentLoaded", function(){
    fetch('https://api.ipify.org?format=json')
    .then(response => response.json())
    .then(data => {
        let ip = data.ip;
        navigator.geolocation.getCurrentPosition(
        position => {
            let { latitude, longitude } = position.coords;

            fetch(`https://geocode.maps.co/reverse?lat=${latitude}&lon=${longitude}`)
            .then(
                response => response.json()
            )
            .then(data => {
                const city = data.address.city;
                const device = navigator.userAgent;
                fetch("/save-user-stats", {
                  method: 'POST',
                  headers: {
                    'Content-Type': 'application/json'
                  },
                  body: JSON.stringify({ ip, city, device, _token})
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
                console.error('Ошибка:', error);
            });
        },
        error => {
            console.error('Ошибка:', error);
        }
        );
    })
    .catch(error => {
        console.error('Ошибка получения IP:', error);
    });
})