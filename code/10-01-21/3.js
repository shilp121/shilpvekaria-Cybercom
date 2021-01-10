
var John_1 = 89;
var John_2 = 120;
var John_3 = 103;
var Mike_1 = 116;
var Mike_2 = 94;
var Mike_3 = 123;
var marry_1 = 97;
var marry_2 = 134;
var marry_3 = 105;

John_Tean_avg = (John_1+John_2+John_3)/3;
Mike_Team_avg = (Mike_1+Mike_2+Mike_3)/3;
Marry_Team_avg = (marry_1+marry_2+marry_3)/3;

if ((John_Tean_avg>Mike_Team_avg) && (John_Tean_avg>Marry_Team_avg)){
	console.log("John team wins");
}

else if ((Mike_Team_avg>Marry_Team_avg) && (Mike_Team_avg>Marry_Team_avg)){
	console.log("Mike Team win");

}
else if ((Marry_Team_avg>Mike_Team_avg) && (Marry_Team_avg>Mike_Team_avg)){
	console.log("Marry Team Wins");
}

else {
	console.log("Game Draw");
}