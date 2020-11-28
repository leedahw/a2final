//~~~~~~~~~~~~~~~table js~~~~~~~~~~~~~~~~//
let tableTIle = document.getElementById("tableTitle");
tableTitle.innerHTML="Monthly Visitors";

let tds= document.getElementsByTagName("td");
let ths = document.getElementsByTagName("th");

let months = ["April","May","June","July","August","September"];
let visitors = [16,80,36,44,7,8];

for (i=0; i<visitors.length; i++){
tds[i].innerHTML=visitors[i];

}

for(i=0;i<months.length;i++){
    ths[i].innerHTML=months[i];
}