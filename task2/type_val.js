const sel = document.querySelector('select[name="type_val"]')
const elements = ["button", "input"]

sel.onchange = e => {
    let val = e.target.value;
    document.querySelectorAll(elements).forEach(
        item => {
            let name = item.getAttribute("name")
            if(val == 'all') item.parentElement.style.display = "block"
            else{
                if(name.split("_")[1] == val){
                    item.parentElement.style.display = "block";
                }else{
                    item.parentElement.style.display = "none";
                }
            }
        }
    )

}