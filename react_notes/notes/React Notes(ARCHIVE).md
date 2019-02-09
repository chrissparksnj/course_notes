---
tags: [Import-e4d1]
title: React Notes(ARCHIVE)
created: '2019-02-09T06:42:14.808Z'
modified: '2019-02-09T07:06:17.376Z'
---

# React Notes(ARCHIVE)

### ECMA standards: 
	- Stages 0 (new proposals) 
	- Stage 4 (finished proposals) 

### Constants 
*old way*
```javascript
var pizza = true
pizza = false
console.log(pizza) //false
```
*new way*
```javascript
const pizza = true
pizza = false
Error: Uncaught TypeError... 
```

### Let
*old way*
> lexical scope in Javascript means that a variable defined outside a function can be accessible inside another function defined after the variable declaration. 
``` javascript
var topic = "Javascript"
if (topic) {
    var topic = "React"
    console.log("block ", topic) // block React
}
console.log('global ', topic) // global react
```

*new way*

> let keyword scopes variable to any code black. using let protecs the value of the global variable
```javascript
var topic = "JavaScript"
if (topic) {
    let topic = "React"
    console.log("block ", topic) // React
}
console.log('global ', topic) // Javascript
```
*old way*
> i is global, so every time i is referenced, it will reference global number
```javascript
for (var i = 0; i < 5; i++){

    var new_div = document.createElement('div')

    new_div.className = purple

    new_div.onclick = function(){ alert("This is box # " + i) }  // Every box comes back as "This is box # 5

    constainer.appendChild(new_div)
}
```

*new way*
> let allows global scope of i to be blocked off, allowing i to be the dynamic representation

```javascript
for ( let i = 0; i < 5; i++) {
    var new_div = document.createElement('div')
    new_div.className = purple
    new_div.onclick = function(){ alert("This is box #") } // This is box 1, This is box 2
    constainer.append(new_div)
}
```

### Template Strings
*Old Way*
> Must use concatination to join strings
``` javascript
console.log(lastName + ", " + firstName + " " + middleName)
```

*New Way*
> Template Strings: **note** *they honor whitespace* **note** *html is rendered*
``` javascript
console.log(`${firstname}, ${lastname}, ${middlename}`)

var template_string = 
` Hello ${firstName}, 
	Thanks for ordering ${qty} tickets to ${event}.
	${qty} x $${price} = $${qty*price} to ${event}
`

document.body.innerHTML = `
	<h1>${article.title}</h1>
	${article.body}
	<footer>${layout.footer}</footer>
```

### Default Values

> Allows the usage of default values to be passed into functions
```javascript
function logActivity(name="Shane McConkey, activity="skiing"){
	console.log(`${name} loves ${activity}
}
logActivity() // "Shane McConkey loves skiing" 
logActivity("Chris", "eating") // "Chris loves eating"
```

> Function arguments can be default and of type object 
```javascript
var defaultPerson = {
    name: {
	first: "Shane",
	last: "McConkey"
     },
     favActivity: "skiing"
}
```

### Arrow Functions 
> => the arrow points to what should be returned. More than one argument should be wrapped in curly braces
More than one line needs to be wrapped in curly braces

*oldway*
```javascript
var lordify = function(firstname){ return `${firstname} of Cantebury` }
console.log(lordify("Chris"))
```

*new way*
```javascript
var lordify = firstname => `${firstname} of Cantebury`
var lordify = (firstname, land) => `${firstname} of ${land}` 
```

> Arrow functions do not block off "this"
> In Arrow function, this is actually the window
--------------------------
*old way*
```javascript
var tahoe = {
	resorts: ["Kirkwood", "Squaw", "Alpine"]
	print: function(delay=1000){
		setTimeout(function(){
			console.log(this.resorts.join(","))
		}, delay)
	}
}
```

*new way*
```javascript
var tahoe = {
    resorts: ["Kirkwood", "Squaw", "Alpine"],
    print: function(delay=1000){
		setTimeout( () => {
			console.log(this.resorts)
		}, delay)
	}
}

tahoe.print()
```

### Destructuring
> Pulling values out of data

*new way*
```javascript
var sandwich = {
	bread: "Wheat",
	meat: "Tuna", 
	cheese:"Swiss",
	toppings: ["Lettuce", "tomato", "mustard" ]
}

var {bread, meat} = sandwich
console.log(bread, meat) // "Wheat", "Tuna"
```

*new way*
```javascript
var regularPerson = {
	firstname: "Bill",
	lastname: "Wilson"
}
var lordify = ({firstname}) => { console.log(`${firstname} of cantebury`) }
lordify(regularPerson)
```

> pulling first value out of array 
```javascript
var [firstresort] = ["Kirkwood", "Squaw", "Alpine"]
console.log(firstresort) // "Kirkwood"
```
> pull third item out of array
```javascript
var [,,thirdresult] = ["Kirkwood", "Squaw", "Alpine"]
console.log(thirdresult) // Alpine
```


### Object Literal Enhancement
> Opposite of destructuring
> can use functions with Object Literal Enhancement
> no need for function keyword for object methods
```javascript
var name = "Tallac"
var elevation = 9738
var funHike = {name, elevation} // { name: 'Tallac', elevation: 1000 }

var name = "Tallac"
var elevation = 10000
var print = function(){
	console.log(`Mt. ${this.name} is ${this.elevation} feet tall`)
}
var funHike = {name, elevation, print}
funHike.print()
```

*Old Way*
```javascript
const skier = {
	name:name,
	powderYell: function(){
		console.log("AHHHHHHH")
	}
}
```
*New Way*
```javascript
const skier = {
	name: name,
	powderYell(){console.log("AHHHH")}
}
```
### Spread Operator

*The spread operator is three dots (...) that perform several different tasks*
> Combining the contents of arrays
```javascript
var peaks = ["Tallac", "Ralston", "Rose"]
var canyons = ["Ward", "Blackwood"]
var tahoe = [...peaks, ...canyons]
console.log(tahoe.join(", ")) // Tallac, Ralston, Rose, Ward, Blackwood
```

> Getting last item from array

***Old way**: Reverse mutates the array*
```javascript
var peaks = ['Tahoe', 'Ralston', 'Rose']
var [last] = peaks.reverse()
console.log(last) // Rose
console.log(peaks) // [ 'Rose', 'Ralston', 'Tallac' ]
```
***New Way**: make a copy of array, then reverse*
```javascript
var peaks = ['Tahoe', 'Ralston', 'Rose']
var [last] = [...peaks].reverse()
console.log(last)
console.log(peaks) // [ "Tahoe", "Ralston", "Tallac" ]
```

*Can seperate arrays and assign values to local scope*
```javascript
var lakes = [ "Donner", "Marlette", "Fallen Leaf", "Cascade" ]
var [first, ...rest] = lakes
console.log(rest) // "Marlette", "Fallen Leaf", "Cascade"
```

*Using spread operator to collect function arguments*
```javascript
function directions(...args){
  var [start, ...remaining] = args
  var [finish, ...stops] = remaining.reverse()
  console.log(`drive through ${args.length} towns`)
  console.log(`start in ${start}`)
  console.log(`the destination is ${finish} `)
  console.log(`stopping ${stops.length} times in between`)
}

directions(      // drive through 5 towns
  "Truckee",     // start in Truckee
  "Tahoe City",  // finish in Tahoma
  "Sunnyside",   // stopping 3 times
  "Homewood",
  "Tahoma"
) 
```
### Promises
> `then` takes a success callback, and a error callback
```javascript
const getFakeMembers = count => new Promise((resolve, rejects) => {
  const api = `http://api.randomuser.me?results=${count}`
  const request = new XHLHttpRequest()
  request.open("GET", api)
  request.onload = () => (request.status == 200) ? resolve(JSON.parse(request.response) : rejects(Error(request.statusText))
  request.onerror = (err) => rejects(err)
  request.send()
}

getFakeMembers(5).then( 
    members => console.log(members), 
    err => console.error(new Error("Cannot load members")) 
   )
```
