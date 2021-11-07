
let url = "http://localhost/info2180-lab5/world.php?country=";


(function(window,document,undefined){
    window.onload = init;
    var xtml = new XMLHttpRequest();
    var country;

    function init(){
        var btn = document.getElementById("lookup");
        var btnc = document.getElementById("lookupc");
        var outp = document.getElementById("result");
        console.log(btn.value);
        let response;
        let responsearr;
        btn.addEventListener("click",function(event){
            let cname = document.getElementById("country");
            let citieslk = "&context=";
            event.preventDefault();
            xtml.onreadystatechange = function(){
                if(xtml.readyState = XMLHttpRequest.DONE){
                    if(xtml.status = 200){
                        response = xtml.responseText;
                        
                    }else{
                        alert('There was a problem with the request.');
                    }
                }
            }
            xtml.open('GET', url + cname.value + citieslk,false);
            console.log(url + cname.value + citieslk);
            xtml.send();
            $("#result").html(response);
        })

        btnc.addEventListener("click",function(event){
            let cname = document.getElementById("country");
            let citieslk = "&context=cities";
            event.preventDefault();
            xtml.onreadystatechange = function(){
                if(xtml.readyState = XMLHttpRequest.DONE){
                    if(xtml.status = 200){
                        response = xtml.responseText;
                        
                    }else{
                        alert('There was a problem with the request.');
                    }
                }
            }
            xtml.open('GET', url + cname.value + citieslk,false);
            console.log(url + cname.value + citieslk);
            xtml.send();
            $("#result").html(response);
        })

    }
})(window,document,undefined)