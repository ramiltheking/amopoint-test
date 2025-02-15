const form = document.querySelector('form');
const path = "/amo-test/task1/";

const status_ = document.querySelector(".status")

form.onsubmit = async e => {
    e.preventDefault();
    let separator_ = document.querySelector('.separator').value;
    let file = document.querySelector('#file');
    if(file.files.length > 0 && separator_){
        let formData = new FormData(form);
        
        const response = await fetch(document.location.origin+path+'upload.php', {
            method: 'POST',
            body: formData
        }).then(
            resp => resp.text()
        ).then(
            text => {
                status_.classList.add("success")
                document.querySelector("#output").innerHTML = `<br><b>Результат: </b><br>${text}`;
            }
        ).catch(
            err => {
                status_.classList.add("danger")
            }
        );

    }else{
        alert("Заполнены не все поля формы")
    }
}



