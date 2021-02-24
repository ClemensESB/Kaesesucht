document.addEventListener('DOMContentLoaded', function(){
	var btnSubmit = document.getElementById('signupbutton');
	var inputEmail = document.getElementById('email');
	var inputPassword = document.getElementById('password');
	var inputPassword1 = document.getElementById('password1');


	if(btnSubmit)
	{
		btnSubmit.addEventListener('click', function() {
			var valid = true;
			const emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
			const passRegex = /^(?=.*?[A-Z].*?)(?=.*?[a-z].*?)(?=.*[0-9].*?).{8,}$/m;

			if(!inputEmail || !inputEmail.value.match(emailRegex))
			{
				valid = false;
			}
			if(!inputPassword || !inputPassword1 || !(inputPassword.value.match(passRegex) && inputPassword.value == inputPassword1.value))
			{
				valid = false;
			}

			if(valid == false)
			{
				event.preventDefault();
				event.stopPropagation();
			}

			return valid;

		});
	}

	



	if(inputEmail)
	{
		inputEmail.addEventListener('keyup',function () {
			const emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
			var str = this.value;

			if(str.match(emailRegex))
			{
				inputEmail.style.border = '2px solid green';
			}
			else
			{
				inputEmail.style.border = '2px solid red';
			}
		});
	}

	if(inputPassword)
	{
		inputPassword.addEventListener('keyup',function()
		{
			var regex1 = /^(?=.*?[A-Z].*?)(?=.*?[a-z].*?)(?=.*[0-9].*?).{4,}$/m;
			var regex2 = /^(?=.*?[A-Z].*?)(?=.*?[a-z].*?[a-z])(?=.*[0-9].*?[0-9])(?=.*?[^\w\s].*?).{6,}$/m;
			var regex3 = /^(?=.*?[A-Z].*?[A-Z])(?=.*?[a-z].*?[a-z])(?=.*[0-9].*?[0-9])(?=.*?[^\w\s].*?[^\w\s]).{8,}$/m;
			var str = this.value;
			if(str.match(regex3))
			{
				inputPassword.style.border = '2px solid green';
			}
			else if(str.match(regex2))
			{
				inputPassword.style.border = '2px solid blue';
			}
			else if(str.match(regex1))
			{
				inputPassword.style.border = '2px solid yellow';
			}
			else
			{
				inputPassword.style.border = '2px solid red';
			}

		});

	}

	if(inputPassword1){
		inputPassword1.addEventListener('keyup',function(){
			var str = this.value;
			var str2 = inputPassword.value;

			if(str == str2)
			{
				inputPassword1.style.border = '2px solid green';
			}
			else
			{
				inputPassword1.style.border = '2px solid red';

			}
		});
	}
});