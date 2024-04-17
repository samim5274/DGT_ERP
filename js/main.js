let displayValue = document.querySelectorAll(".data");
let displayValue2 = document.querySelectorAll(".data2");

var div = document.getElementById('content');

displayValue2.forEach(displayValue2=>{
    const images = displayValue2.getAttribute("data-val");
    const oImg = document.createElement("img");
    oImg.setAttribute('src', 'P_Pic/'+images);
    oImg.setAttribute('alt', 'na');
    oImg.setAttribute('height', '100px');
    oImg.setAttribute('width', '100px');
    document.body.appendChild(oImg);
});

displayValue.forEach(displayValue=>{
    const pname = displayValue.getAttribute("data-val");
    const range = pname.length;
    let fpname;

    const p = document.createElement("p");    

    if (range <= 20)
    {
        const result = pname;
        // console.log(result);
        p.innerHTML = result;
        div.append(p);
    }
    else if(range => 20)
    {
        fpname = pname.slice(0,21);
        const result = fpname+"...";
        // console.log(result);
        p.innerHTML = result;
        div.append(p);
    }
});