document.getElementById("button").addEventListener("click", validate_form);


function validate_form(e) {
    e.preventDefault();
    let okm = document.getElementById("okm").value;
    let ckm = document.getElementById("ckm").value;
    let km = ckm -okm;
    if(km <0){
        window.alert("Closing Km must be more than Opening Km");
    }else{
        document.getElementById("ttk").value=km;
    }


    const start = document.querySelector('input[name="intime"]');
    const date = new Date(start.value).toISOString();
    const start1 = document.querySelector('input[name="outtime"]');
    const date1 = new Date(start1.value).toISOString();
    
    const date2 = Date.parse(date);
    const date3 = Date.parse(date1);
    const fdate = Math.ceil((date3 - date2)/3600000);
    document.getElementById("tth").value=fdate;


    const xhr = new XMLHttpRequest();

    xhr.open("POST", "edit.php", true);

    xhr.setRequestHeader("Content-Type", "applicaton/json");

    xhr.onload = ()=>{
        if(xhr.status === 200){
            console.log("Edit Successful");
        }else{
            console.log("Problem occured");
        }
    };

    const myData = {ckm: ckm, outtime: date1, tth: fdate, ttk: km};
    console.log(myData);
    const data = JSON.stringify(myData);
    console.log(data);
    xhr.send(data);
}