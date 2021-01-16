//Calculate Tip given on the Total Bill

//Varaible Declared
var billBeforeTip = [124,48,268]; 
var billAfterTip =[];
var tipAmt = [];

//Calculate Tip
function tipCal(amt){
	
	if(amt<50){
		return amt*(20/100);
	}

	else if(amt>50 && amt<200){
			return amt*(15/100);
	}

	else{
		return amt*(10/100);
	}
	
}
//Loop over the the array of bill amount
for (i = 0; i<billBeforeTip.length; i++){

	tipAmt[i] = tipCal(billBeforeTip[i]);
	billAfterTip[i] = tipAmt[i]+billBeforeTip[i];
	console.log([i]+' : total tip '+ tipAmt[i]);
}
//print Tip amt with total amt to be paid
console.log('Bill Before Tip '+billBeforeTip.toString());
console.log('Bill After Tip '+billAfterTip.toString());

