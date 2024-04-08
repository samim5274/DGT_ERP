let displayValue = document.querySelectorAll(".data");
var div = document.getElementById('content');
displayValue.forEach(displayValue=>{
    const pname = displayValue.getAttribute("data-val");
    const range = pname.length;
    let fpname;

    const p = document.createElement("p");

    if (range <= 20)
    {
        const result = pname;
        console.log(result);
        p.innerHTML = result;
        div.append(p);
    }
    else if(range => 20)
    {
        fpname = pname.slice(0,21);
        const result = fpname+"...";
        console.log(result);
        p.innerHTML = result;
        div.append(p);
    }
});