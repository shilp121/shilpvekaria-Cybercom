
var john = {
	name :"Jonh",
	mass : 88,
	height : 6.5,
	bmi_john : function(){
		return this.mass /(this.height*this.height);
	}
}

var mark = {
	name : "mark",
	mass : 70,
	height : 5.5,
	bmi_mark : function(){
		 return this.mass /(this.height*this.height);
	}
}

if(john.bmi_john>mark.bmi_mark){
	console.log(john.name +" has more bmi than mark");
}

else if (mark.bmi_mark>john.bmi_john){
	console.log(mark.name +"has more bmi than john");
}

else{
	console.log("both has same BMI");
}
