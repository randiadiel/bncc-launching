function validateIsName(event){
    if(!event.key.match(/[A-Z|a-z|ü|é|\s]/i) && event.key.length === 1 && event.ctrlKey === false){
       event.preventDefault(); 
    }
};

function validateIsNIM(event){
    if(!event.key.match(/[\d|ü|é]/i) && event.key.length === 1 && event.ctrlKey === false){
        event.preventDefault(); 
     }
     if (event.srcElement.value.length === 10 && event.key.length === 1 && event.ctrlKey === false){
        event.preventDefault();
    }
};

function validateIsPhone(event){
    if(!event.key.match(/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/i) && event.key.length === 1 && event.ctrlKey === false){
        event.preventDefault(); 
     }
    if (event.srcElement.value.length === 13 && event.key.length === 1 && event.ctrlKey === false){
        event.preventDefault();
    }
};

function validateIsEmail(event){
    if(!event.srcElement.value.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i)){
        event.srcElement.style.color = "red";
     }
     else event.srcElement.style.color = "#495057";
};