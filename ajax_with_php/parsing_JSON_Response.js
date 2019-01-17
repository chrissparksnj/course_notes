<script>
function replaceText(){
	var xhr = new XMLHttpRequest();
	var target = document.getElementById('location');
	xhr.open("GET", "req.php", true);
	xhr.onreadystatechange = function(){
		if(xhr.readyState == 2){target.innerHTML = "Loading...";}
		if(xhr.readyState == 4 && xhr.status == 200){
			var json = JSON.parse(xhr.responseText);
			target.innerHTML = json[0];}
		}
	xhr.send();}
var button = document.getElementById('ajax-button');
button.addEventListener('click', replaceText);
//----------------------------------------------------------------------
function replaceText(){
	var xhr = new XMLHttpRequest();
	var target = document.getElementById('location');
	xhr.open("GET", "req.php", true);
	xhr.onreadystatechange = function(){
		if(xhr.readyState == 2){target.innerHTML = "Loading...";}
		if(xhr.readyState == 4 && xhr.status == 200){
			var json = JSON.parse(xhr.responseText);  //<<------ var json = JSON.parse(xhr.responseText);
			target.innerHTML = json.last_name;}       //<-------  json.name = "Smith"
		}
	xhr.send();}
var button = document.getElementById('ajax-button');
button.addEventListener('click', replaceText);


