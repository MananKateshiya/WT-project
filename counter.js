
function counter1(){
			setInterval(start, 1);
			var a = 0;
			function start(){
				if(a == 300){		

			}else{
				a++;
				document.getElementById('num1').innerHTML = a;
			}
		}	

		setInterval(start2, 1);
		var b = 0;
			function start2(){
				if(b == 225){		

			}else{
				b++;
				document.getElementById('num2').innerHTML = b;
			}
		}	


		setInterval(start3, 1);
		var c = 0;
			function start3(){
				if(c == 102){		

			}else{
				c++;
				document.getElementById('num3').innerHTML = c;
			}
		}	


		setInterval(start4, 1);
		var d = 0;
			function start4(){
				if(d == 7){		

			}else{
				d++;
				document.getElementById('num4').innerHTML = d;
			}
		}	
}