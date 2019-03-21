
####  React elements are a description for the DOM, and how it should look like.
```js
var dish = React.createElement("h1", null, "Baked Salmon")
```
* h1: type of element we wish to create
* 'Baked Salmon' - the elements children
* null - the objects properties.



#### Attributes are passed into the props argument. 
```js
var list = React.createElement("ul", {"id":"example"}, 
     React.createElement("li", null, "Facebook"),
     React.createElement("li", null, "Twittter"),
     React.createElement("li", null, "Reddit")
   )

var list = React.createElement("section", {id:"baked-salmon"}, 
    React.createElement("h1", null, "Baked Salmon"),
    React.createElement("ul", {"className":"ingredients"},
    React.createElement("li", null, "1lb Salmon"),
    React.createElement("li", null, "1 cup Pine Nuts"),
    React.createElement("li", null, "2 cups Butter Lettuce")
   )
 )
```
#### pass in a list and use map to make reusable compenents.  
```js
var items = [
    "1 cup of cheese",
    "1/2 cup of milk",
    "1lb of beef"
 ]

React.createElement("ul", {"className":"ingredients"}, 
     items.map(item => React.createElement("li", null, item))
   )

```


#### `React.createClass()`
    * initially, this was the only way to create a component.
    * components allow to build reusable UI items with dynamic data.

```js
const IngList = React.createClass({
    displayName:"IngList",
    render(){
        return React.createElement("ul", {"className":"ingredients"}, 
        React.createElement("li", null, "1 lb Salmon"),
        React.createElement("li", null, "1 cup Pine Nuts"),
        React.createElement("li", null, "2 cup Butter Lettuce")
      )
    }
   })
var  list = React.createElement(IngList, null, null)
ReactDOM.render(list, document.getElementById('root')) 
```


##### Using `.map()` with `.createClass()`

```js
const items_list = ['1 cup of nuts', '2 cups of butter', '3 bags of popcorn']

const IngList2 = React.createClass({
    displayName: "ingredientsList",
    render(){
	return React.createElement("ul", {className:"ingredients"}, 
	this.props.items_list.map((ing,i) => React.createElement("li", { key:i }, ing))
       )
      }
     }
    )
 
ReactDOM.render(
	React.createElement(IngList2, {items_list}, null), 
	document.getElementById("react-container")
)
```


#### Using `React.createclass()` as an object and adding a custom function.
* the function `renderListItem()` creates a li item foreach element in the `ingredients` array.

```js
const items = ['1 cup of nuts', '2 cups of butter', '3 bags of popcorn']

const Ingredients = React.createClass({
    displayName:"ingredients",
    renderListItem(ing, i){
	return React.createElement("li", {key:i}, ing)
    },
    render(){
        return React.createElement(
	    "ul", 
	    {className:"ingredients"}, 
	    this.props.items.map(this.renderListItem)
	  )
	}
    })

ReactDOM.render(
	React.createElement(Ingredients, {items}, null), 
	document.getElementById('react-container')
)
```

## Stateless functional components.
* they are functions, not objects, so they ***dont*** have a `this` scope.
* the default method of creating components. 
* when stateless functional components aren't enough, fall back on `React.createClass()`
* *stateless functional components* are functions that take in properties and return a DOM.
* *SFC* should take in props, and return DOM.

#### This is a regular function.
```js
const items = ["1 cup of nuts", "2 cups of butter", "3 bags of popcorn"]

const IngredientsList = props =>
    React.createElement(
        "ul",
        {className:"ingredients"},
        props.items.map((ing,i) => React.createElement("li", {key:i}, ing))
    )
ReactDOM.render(
    React.createElement(IngredientsList, {items}, null),
    document.getElementById("react-container")
)

``` 

#### Using object destructuring to avoid using repetitive dot notaion. `this.props.items`
* stateless functional components are *faster* than createClass or ES6 class syntax.
```js
const IngredientsList = ({items}) =>
    React.createElement("ul", {className:"ingredients"},
        items.map((ing, i) = React.createElement("li", {key:i}, ing)
    ))

ReactDOM.render(
    React.createElement(IngredientsList, {items}, null), 
    document.getElementById("react-container")
)
```

### Factories
* Factories are used for common HTML and SVG elements.
* Are a alternative to `React.createElement()`.

```js
// null = props, "Baked Salmon" = children
React.DOM.h1(null, "Baked Salmon")` // creates a heading element.


// using a DOM factory to create a unordered list.
React.DOM.ul(
	{"className":"ingredients"}, 
	React.DOM.li(null, "1lb Salmon"),
	React.DOM.li(null, "1 cup Pine Nuts"),
	React.DOM.li(null, "2 cups Lettuce")
)

//using .map() with factories.

var items =  ['item1', 'item2', 'item3']

var list = React.DOM.ul(
		{className:"ingredients"},
		items.map((ing,key) => React.DOM.li({key}, ing)
	)
)

ReactDOM.render(list, document.getElementById("react-container"))

```






