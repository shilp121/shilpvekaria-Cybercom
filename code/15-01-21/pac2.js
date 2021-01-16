//Input from user
var num = prompt("enter any number");

var n1= 0;
var n2 =1;
var sum;

for(i=0; i<num; i++){
	console.log(n1);
	sum = n1+n2;
	n1 = n2;
	n2 = sum;
}