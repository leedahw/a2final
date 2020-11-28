let submitDataEl = document.querySelectorAll("#submit-data")[0];
let form = document.querySelectorAll("#form")[0];
let name = document.querySelectorAll("#name")[0];
let emailAddress = document.querySelectorAll("#emailAddress")[0];
let interests = document.querySelectorAll("#interests")[0];
let userRole = document.querySelectorAll("#userRole")[0];
let message = document.querySelectorAll("#message")[0];

submitDataEl.addEventListener("click", submitDataEv, false);

function submitDataEv(event){
    event.preventDefault();
    console.log(name.value); //see if function is working ;)

    var xhr = new XMLHttpRequest(); 
    xhr.onreadystatechange = function(e){     
        console.log(xhr.readyState);     
        if(xhr.readyState === 4){        
            console.log("CHECK DB TABLE");// modify or populate html elements based on response.
           } 
        //DOM manipulation
        form.remove();
        message.innerHTML="THANK YOU!!";
        submitDataEl.removeEventListener("click", submitDataEv, false);



    };
    var requestData = `name=${name.value} & emailAddress=${emailAddress.value} & userRole=${userRole.value}`;
    xhr.open("POST", "process-contact-form.php", true); 
    //true means it is asynchronous 
    // Send variables through the url
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(requestData);
}


function showDataEv(event){
    console.log("let's show data");
    var xhr = new XMLHttpRequest(); 
xhr.onreadystatechange = function(e){     
	console.log(xhr.readyState);     
	if(xhr.readyState === 4){        
        console.log(xhr.responseText);// modify or populate html elements 
        //based on responseText = string    
        //convert string to native object for DOM maniuplation
        var response = JSON.parse(xhr.responseText); 
        console.log(response);
        //console.log(response[i].name); //name is column Name

        //DOM MANIPULATION
        let responseDataEl= document.querySelectorAll("#submission-data");
        for (var i=0; i<response.length; i++){
            //create elements
        let columnNames = ["name","emailAddress", "interests", "userRole"];
        let pTag = document.createElement("p");

        let submission = document.createTextNode(response[i].columnNames[i]);
        pTag.appendChild(submission); //<p>submission data</p>

        //show in html page
        responseDataEl.appendChild(pTag);

        }
    }
}
    
    xhr.open("GET", "contact-form.php", true); //true=asynchronus
    xhr.send();
}


