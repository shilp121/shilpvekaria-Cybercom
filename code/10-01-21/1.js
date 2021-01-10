var mark_h = 5;
var mark_m = 60;

var john_h = 6;
var john_m = 70;

var bmi_mark = mark_m/(mark_h^2);
var bmi_john = john_m/(john_h^2);
console.log(bmi_mark); 
console.log(bmi_john);

console.log('Is Marks BMI Higer than John?'+ Boolean(bmi_mark>bmi_john))