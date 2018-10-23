function createRequest() {
    var httprequest;
    if(window.XMLHttpRequest){
        httprequest = new XMLHttpRequest();
    }
    return httprequest;
}
function SignUp() {
    var httprequest;
    httprequest = createRequest();
    httprequest.onreadystatechange =  function(){
        if(this.readyState < 4){
            alert('<4');
            }
        if(this.readyState == 4 & this.status == 200){
            alert('==4');
        }

        }
    httprequest.open("POST","../../Actions/Sig_up",true);
    httprequest.send();
}