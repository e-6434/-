// array of objects to store existing user data
var existingUsers = [
	{
		user: "chrisbrody",
		pass: "password1"
	},
	{
		user: "mattbrody",
		pass: "password2"
	},
	{
		user: "sambrody",
		pass: "password3"
	}
]

// function to determine if the user exists and the password matchs that user, function fires on user clicking button line 28 index.html
function login() {
	// store the tag with id="sign" in var username
	var username = document.getElementById("username")
	// store the tag with id="sign" in var password
	var password = document.getElementById("password")
	// store the tag with id="results" in var results
	var results = document.getElementById('results')

	// confirm the element exists and then what value the user submits
	console.log(username, password, results)
	console.log("username value is: " + username.value)
	console.log("password value is: " + password.value)
	
	// loop through existing users array one item at a time 
	for(i = 0; i < existingUsers.length; i = i + 1) {
		// check each user as you loop through the array of objects
		console.log(existingUsers[i])
		if(username.value === existingUsers[i].user && password.value === existingUsers[i].pass) {
			// check to see if the IF statement code block executed
			console.log("if statement ran, so we have a match!")
			// change class of results to let the user know it worked 
			results.className = 'success'
			// update the text of the results element to display a success message
			results.textContent = "Welcome " + username.value + " to my simple User registration App. Enjoy!"
			// stop the function from running any further cause we got a match!!!
			return
		} 
	}
	
	// run failure if username and password didn't match
	console.log("no match was found :/")
	// change class of results to let the user know it failed
	results.className = 'failure'
	// update the text of the results element to display a failure message
	results.textContent = "username or password don't match"
}


// register button
function register() {
	// store the tag with id="sign" in var username
	var newUser = document.getElementById("newUser").value
	// store the tag with id="sign" in var password
	var newPassword = document.getElementById("newPassword").value
	// store the tag with id="results2" in var results
	var results2 = document.getElementById('results2')

	// confirm the element exists and then what value the user submits
	console.log(username, password, results)
	console.log("username value is: " + newUser)
	console.log("password value is: " + newPassword)

	// loop through existing users array one item at a time 
	for(i = 0; i < existingUsers.length; i = i + 1) {
		// check each user as you loop through the array of objects
		console.log(existingUsers[i])

		if(newUser === existingUsers[i].user){
			console.log("existing username")
			// change class of results to let the user know its taken
			results2.className = 'failure'
			// update the text of the results element to display a failure message
			results2.textContent = "Sorry but " + newUser + " already exist, please try a different username."
			return
		}
		if(newUser.length === 0){
			alert("Please fill in username and password.")
			return
		}
		if(newPassword.length < 8) {
			alert("Password must be 8 or more characters.")
			return
		}
		if(newUser !== existingUsers[i].user) {
			console.log(existingUsers)
			results2.className = 'success'
			results2.textContent = "Congratulations! " + newUser + " you are now registered."
			existingUsers.push({user: newUser, pass: newPassword})
			return
		}
	}	
}