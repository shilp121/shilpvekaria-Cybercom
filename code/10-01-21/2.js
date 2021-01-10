
var John_1 = 89;
var John_2 = 120;
var John_3 = 103;
var Mike_1 =116;
var Mike_2 = 94;
var Mike_3 = 123;

John_Tean_avg = (John_1+John_2+John_3)/3;
Mike_Team_avg = (Mike_1+Mike_2+Mike_3)/3;

if (John_Tean_avg>Mike_Team_avg){
	console.log("John team wins")
}

else if(John_Tean_avg<Mike_Team_avg) {
	console.log("Mike Team win")

}

else {
	console.log("Game Draw")
}