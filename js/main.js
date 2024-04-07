let displayValue = document.querySelectorAll(".data");

displayValue.forEach(displayValue=>{
    let pname = displayValue.getAttribute("data-val");
    let range = pname.length;
    let fpname;
    if (range <= 20)
    {
        var result = pname;
        console.log(result);
        document.getElementById("pp").innerHTML=result;
    }
    else if(range => 20)
    {
        fpname = pname.slice(0,21);
        var result = fpname+"...";
        console.log(result);
        document.getElementById("pp").innerHTML=result;
    }
});