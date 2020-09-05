<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="container">
	<h1>Welcome to Registor!</h1>

	<div id="body">

	  <form action="/action_page.php">
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6">
						    <label for="Name">Profile Created For:</label>
			</div>
		        <div class="col-sm-6">

				  <select name="profileCreatedFor" id="profileCreatedFor">
				    <option value="myself">Myself</option>
				    <option value="son">Son</option>
				    <option value="daughter">Daughter</option>
				    <option value="brother">Brother</option>
   				    <option value="sister">Sister</option>
				    <option value="relative">Relative</option>
				    <option value="friend">Friend</option>
				  </select>
	                </div>

                </div>
		 <div class="form-group">
			<div class="row">
				<div class="col-sm-6">
						    <label for="Name">Full Name:</label>
			 </div>
		        <div class="col-sm-6">
		    <input type="Name" class="form-control" id="Name">
	               </div>

                </div>

		<div class="form-group">
			<div class="row">
				<div class="col-sm-6">
		    	  		<label for="Name">Gender:</label>
				</div>
				<div class="col-sm-6">
					  <input type="radio" id="male" name="gender" value="male">
					  <label for="male">Male</label><br>
					  <input type="radio" id="female" name="gender" value="female">
					  <label for="female">Female</label><br>
					  <input type="radio" id="other" name="gender" value="other">
					  <label for="other">Other</label>
				 </div>

		 	</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6">
		    	  		 <label for="email">Email address:</label>

				</div>
				<div class="col-sm-6">
					 <input type="email" class="form-control" id="email">			 
				 </div>

		 	</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6">

		    			 <label for="pwd">Password:</label>

				</div>
				<div class="col-sm-6">

		   			 <input type="password" class="form-control" id="pwd">		 
				 </div>

		 	</div>
		</div>

		<div class="form-group">
			<div class="row">
				<div class="col-sm-6">
						    <label for="Name">Date of Birth:</label>
			</div>
		        <div class="col-sm-6">

				  <select name="dateofBirth1" id="dateofBirth1">
				    <option value="">Date</option>
				  </select>
				 <select name="dateofBirth2" id="dateofBirth2">
				    <option value="January">January</option>
				    <option value="February">February</option>
				    <option value="March">March</option>
   				    <option value="sister">April</option>
				    <option value="relative">May</option>
				    <option value="friend">June</option>
	    			    <option value="July">July</option>
				    <option value="August">August</option>
				    <option value="September">September</option>
				    <option value="October">October</option>
   				    <option value="November">November</option>
				    <option value="December">December</option>
				  </select>
				  <select name="dateofBirth3" id="dateofBirth3">
				    <option value="">Year</option>
				    
				  </select>

	                </div>

                </div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6">

		    			 <label for="PhoneNumber">Phone Number:</label>

				</div>
				<div class="col-sm-6">

		   			 <input type="Number" class="form-control" id="phoneNumber">		 
				 </div>

		 	</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6">

		    			 <label for="maritalStatus">Marital Status:</label>

				</div>
				<div class="col-sm-6">

			   		<select name="maritalStatus" id="maritalStatus">
					    <option value="NeverMarried">Never Married</option>
					    <option value="Widowed">Widowed</option>
					    <option value="Divorced">Divorced</option>
	   				    <option value="Awaitingdivorce">Awaiting divorce</option>
					</select>	 
				 </div>

		 	</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6">

		    			 <label for="motherTongue">Mother Tongue:</label>

				</div>
				<div class="col-sm-6">

			   		<select name="motherTongue" id="motherTongue">
					    <option value="Tamil">Tamil</option>
					    <option value="Malayalam">Malayalam</option>
					    <option value="Telugu">Telugu</option>
	   				    <option value="Kannda">Kannda</option>
					</select>	 
				 </div>

		 	</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6">

		    			 <label for="religion">Religion:</label>

				</div>
				<div class="col-sm-6">

			   		<select name="religion" id="religion">
					    <option value="Hindu">Hindu</option>
					    <option value="Christian">Christian</option>
					    <option value="Muslim">Muslim</option>
					</select>	 
				 </div>

		 	</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6">

		    			 <label for="caste">Caste:</label>

				</div>
				<div class="col-sm-6">

			   		<select name="caste" id="caste">
					    <option value="Pillai">Pillai</option>
					    <option value="Mudaliyar">Mudaliyar</option>
					    <option value="Gounder">Gounder</option>
					</select>	 
				 </div>

		 	</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6">

		    			 <label for="subCaste">Sub Caste:</label>

				</div>
				<div class="col-sm-6">
		    			<input type="subCaste" class="form-control" id="subCaste">	
			 	</div>

		 	</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6">

		    			 <label for="gothram">Gothram:</label>

				</div>
				<div class="col-sm-6">
		    			<input type="gothram" class="form-control" id="gothram">	
			 	</div>

		 	</div>
		</div>
	        <div class="form-group">
			<div class="row">
				<div class="col-sm-6">

		    			 <label for="height">Height:</label>

				</div>
				<div class="col-sm-6">

			   		<select name="height" id="height">
					    <option value="">Height</option>
					    
					</select>	 
				 </div>

		 	</div>
		</div>
      	        <div class="form-group">
			<div class="row">
				<div class="col-sm-6">

		    			 <label for="weight">Weight:</label>

				</div>
				<div class="col-sm-6">

			   		<select name="weight" id="weight">
					    <option value="weight">Weight</option>
					    
					</select>	 
				 </div>

		 	</div>
		</div>
	        <div class="form-group">
			<div class="row">
				<div class="col-sm-6">

		    			 <label for="bodyType">Body Type:</label>

				</div>
				<div class="col-sm-6">

			   		<select name="bodyType" id="bodyType">
					    <option value="slim">Slim</option>
					    <option value="athletic">Athletic</option>
					    <option value="heavy">Heavy</option>
					    <option value="average">Average</option>					    
					    <option value="weight">Weight</option>

					</select>	 
				 </div>

		 	</div>
		</div>

      		<div class="form-group">
			<div class="row">
				<div class="col-sm-6">

		    			 <label for="complexion">Complexion:</label>

				</div>
				<div class="col-sm-6">

			   		<select name="complexion" id="complexion">
					    <option value="veryFair">Very Fair</option>
					    <option value="fair">Fair</option>
					    <option value="wheatish">Wheatish</option>
					    <option value="wheatishBrown">Wheatish Brown</option>					    
					    <option value="dark">Dark</option>

					</select>	 
				 </div>

		 	</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6">

		    			 <label for="anyDisability">Any Disability:</label>

				</div>
				<div class="col-sm-6">

			   		<select name="anyDisability" id="anyDisability">
					    <option value="normal">Normal</option>
					    <option value="fair">Physically Challenged</option>
					</select>	 
				 </div>

		 	</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-12 text-center">

		    			 <label for="horoscopesInformation">Horoscopes Information:</label>

				</div>
			
		 	</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6">

		    			 <label for="zodiac">Zodiac:</label>

				</div>
				<div class="col-sm-6">

			   		<select name="zodiac" id="zodiac">
					    <option value="aries">Aries / மேஷம்</option>
					    <option value="taurus">Taurus / ரிஷபம்</option>
					    <option value="gemini">Gemini / மிதுனம்</option>
					    <option value="cancer">Cancer / கடகம்</option>
					    <option value="leo">Leo / சிம்மம்</option>
	   				    <option value="virgo">Virgo / கன்னி</option>
					    <option value="libra">Libra / துலாம்</option>
					    <option value="scorpio">Scorpio / விருச்சிகம்</option>
		    			    <option value="sagittarius">Sagittarius / தனுசு</option>
					    <option value="capricorn">Capricorn / மகரம்</option>
					    <option value="aquarius">Aquarius / கும்பம்</option>
					    <option value="pisces">Pisces / மீனம்</option>
	   				  
					</select>	 
				 </div>

		 	</div>
		</div>

		<div class="form-group">
			<div class="row">
				<div class="col-sm-6">

		    			 <label for="star">Star:</label>

				</div>
				<div class="col-sm-6">

			   		<select name="star" id="star">
				            <option value="aries">Aries / மேஷம்</option>
					    <option value="taurus">Taurus / ரிஷபம்</option>
					    <option value="gemini">Gemini / மிதுனம்</option>
					    <option value="cancer">Cancer / கடகம்</option>
					    <option value="leo">Leo / சிம்மம்</option>
	   				    <option value="virgo">Virgo / கன்னி</option>
					    <option value="libra">Libra / துலாம்</option>
					    <option value="scorpio">Scorpio / விருச்சிகம்</option>
		    			    <option value="sagittarius">Sagittarius / தனுசு</option>
					    <option value="capricorn">Capricorn / மகரம்</option>
					    <option value="aquarius">Aquarius / கும்பம்</option>
					    <option value="pisces">Pisces / மீனம்</option>
					    
					</select>	 
				 </div>

		 	</div>
		</div>
	        <div class="form-group">
			<div class="row">
				<div class="col-sm-6">

		    			 <label for="havingDosham">Having Dosham:</label>

				</div>
				<div class="col-sm-6">

			   		<select name="havingDosham" id="havingDosham">
					    <option value="No">No</option>
					    <option value="Yes">Yes</option>
					    <option value="don'tKnow">Don't Know</option>
					</select>	 
				 </div>

		 	</div>
		</div>
	        <div class="form-group">
			<div class="row">
				<div class="col-sm-12 text-center">

		    			 <label for="LocationInformation">Location Information:</label>

				</div>
			
		 	</div>
		</div>
  		<div class="form-group">
			<div class="row">
				<div class="col-sm-6">

		    			 <label for="countryLivingin">Country Living in:</label>

				</div>
				<div class="col-sm-6">

			   		<select name="countryLivingin" id="countryLivingin">
					    <option value="india">India</option>
					    <option value="singapore">Singapore</option>

					</select>	 
				 </div>

		 	</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6">

		    			 <label for="countryLivingin">State Living in:</label>

				</div>
				<div class="col-sm-6">
			   		<select name="stateLivingin" id="stateLivingin">
					    <option value="tamilnadu">Tamilnadu</option>
					    <option value="kerala">Kerala</option>

					</select>	 
				 </div>

		 	</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6">

		    			 <label for="countryLivingin">City Living in:</label>

				</div>
				<div class="col-sm-6">
			   		<select name="cityLivingin" id="cityLivingin">
					    <option value="chennai">Chennai</option>
					    <option value="thiruvarur">Thiruvarur</option>

					</select>	 
				 </div>

		 	</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-12 text-center">

		    			 <label for="lifestyleinformation">Lifestyle Information:</label>

				</div>
			
		 	</div>
		</div>
  		<div class="form-group">
			<div class="row">
				<div class="col-sm-6">

		    			 <label for="eatingHabits">Eating Habits:</label>

				</div>
				<div class="col-sm-6">

			   		<select name="eatingHabits" id="eatingHabits">
					    <option value="vegetarian">Vegetarian</option>
					    <option value="nonVegetarian">Non Vegetarian</option>
					    <option value="eggetarian">Eggetarian</option>

					</select>	 
				 </div>

		 	</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6">

		    			 <label for="drinkingHabits">Drinking Habits:</label>

				</div>
				<div class="col-sm-6">
			   		<select name="drinkingHabits" id="drinkingHabits">
					    <option value="no">NO</option>
					    <option value="yes">Yes</option>
					    <option value="drinksSocially">Drinks Socially</option>

					</select>	 
				 </div>

		 	</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6">

		    			 <label for="smokingHabits">Smoking Habits:</label>

				</div>
				<div class="col-sm-6">
			   		<select name="smokingHabits" id="smokingHabits">
					    <option value="no">NO</option>
					    <option value="yes">Yes</option>
					    <option value="occasionally">Occasionally</option>

					</select>	 
				 </div>

		 	</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-12 text-center">

		    			   <button type="submit" class="btn btn-primary">Submit</button>  		 
				 </div>

		 	</div>
		</div>


</form> 



<script>

for (i = 0; i <30; i++) {
$("#dateofBirth1").append("<option value=\""+(i+1)+"\">"+(i+1)+"</option>")
}


for (j = 2002; j >1950; j--) {
$("#dateofBirth3").append("<option value=\""+(j)+"\">"+(j)+"</option>")
}
for (k = 137; k <215; k++) {
$("#height").append("<option value=\""+(k+1)+"\">"+(k+1)+"  cms</option>")
}
for (l = 40; l <150; l++) {
$("#weight").append("<option value=\""+(l+1)+"\">"+(l+1)+"  </option>")
}
</script>
</div>
	


