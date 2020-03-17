(function (win, doc) {
    'use strict';

    //Delete
    function confirmDel(event){
        var x = document.getElementsByTagName("H3")[0].getAttribute("class"); 
        //document.getElementById("demo").innerHTML = x;


        event.preventDefault();
        //console.log(event.target.parentNode.href);
        let token=doc.getElementsByName("_token")[0].value;
        if(confirm("Deseja mesmo apagar?")){
            let ajax=new XMLHttpRequest();
            ajax.open("DELETE", event.target.parentNode.href);
            console.log(event.target.parentNode.href);
            ajax.setRequestHeader('X-CSRF-TOKEN',token);
            ajax.onreadystatechange=function(){
                //location.reload();
                win.location.href=x;
                if(ajax.readyState === 4 && ajax.status === 200){
                    //console.log('Deu certo');
                    win.location.href="ingressos";
                }
            };
            ajax.send();

        }else{
            return false;
        }
    }
    if(doc.querySelector('.js-del')){
        let btn=doc.querySelectorAll('.js-del');
        for(let i=0; i < btn.length; i++){
            btn[i].addEventListener('click', confirmDel, false);
        }
    }
    
})(window,document);