var a;
function pass(){
    if(a == 1){
        document.getElementById('password').type='password';
        document.getElementById('pass-icon').src='icons/eye-close.png';
        a=0;
    }else{
        document.getElementById('password').type='text';
        document.getElementById('pass-icon').src='icons/eye-open.png';
        a=1;
    }
}