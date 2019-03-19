function date(){
var dt = new Date();
var m;
var d;
var y;

if(dt.getMonth() < 9){
 m = "0" + (dt.getMonth()+1);
}else {
m =  (dt.getMonth()+1);
}

if(dt.getDate() < 10){
 d = "0" + dt.getDate();
}else {
 d =  dt.getDate();
}

 y = dt.getFullYear();

document.getElementById('t').value = y + "-" + m + "-" + d;
document.getElementById('t2').value = y + "-" + m + "-" + d;
document.getElementById('t3').value = y + "-" + m + "-" + d;
document.getElementById('t4').value = y + "-" + m + "-" + d;
}