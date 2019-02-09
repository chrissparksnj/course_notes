---
title: 2-React-Notes
created: '2019-02-02T06:12:39.576Z'
modified: '2019-02-09T07:11:24.955Z'
tags: [Import-e4d1, react]
deleted: true
---

# 2-React-Notes

*React is library for creating views*
*React DOM is lobrary used to render UI*
*Javascript must be loaded after React has been loaded*

```html
<script src="https://fb.me/react-15.1.0.js"></script>
<script src="https://fb.me/react-dom-15.1.0.js"></script>
```

*Creating a React Element*
* baked salmon is a child of h1
* null is the properties of element

```javascript
React.createElement("h1", null, "Baked Salmon")
```

*Element attributes can be described with properties*
```javascript
React.createElement("h1", 
  {id: "recipe-0", "data-type":"title"},
  "Baked Salmon"
  )
  
  <h1 data-reactroot id="recipe-0" data-type="title">Baked Salmon</h1>
```
### What is a React Element?
```javascript
{ $$typeof: Symbol(react.element),
  type: 'h1',
  key: null,
  ref: null,
  props: 
   { id: 'recipe-0',
     'data-type': 'title',
     children: 'Baked Salmon' },
  _owner: null,
  _store: {} }
  ```
 * type: type of html or svg element to create
 * props: represents data and child elements required to construct a DOM
  
  
*Creating a list with Pure React*
```javascript
React.createElement(
  "ul",
  null,
  React.createElement("li", null, "1 lb Salmon"),
  React.createElement("li", null, "1 cup Pine Nuts"),
  React.createElement("li", null, "1 Yellow Squash")
)
```
*Same list with map*

```javascript
var items = [
  "1 lb Salmon",
  "1 cup Pine Nuts",
  "2 cups Butter Lettuce"
]


const list = React.createElement("ul",
    { className: "ingredients" }, 
      items.map( (ing, i) => React.createElement("li", {"key":i}, ing) )
 )
```

### React.createclass()
  
  ```javascript

      items =[
        "Game Of Thrones",
        "Mad Men",
        "Breaking Bad",
        "The Sopranos"
    ]

 const favorite_tv_shows = React.createClass({
          displayName: "favorite_tv_shows",
          render(){
                return React.createElement("ul", 
                            {className: "tv"}, 
                            this.props.items.map( (ing, i) => 
                                React.createElement("li", {key: i},ing)))}
                              })
      ReactDOM.render(
            React.createElement(favorite_tv_shows, {items}, null),
            document.getElementById("root")
      )

  ```
  
### Using self-contained classes
 ```javascript
const items = ["Wrenches", "Ratchets", "Sockets"]
const snapon = React.createClass({
    displayName: "Snapon",
    renderListItem(tool, i){
        return React.createElement("li", {key: i, className:'tool'}, tool)
    },
    render(){
        return React.createElement("ul", {className:"tools"}, this.props.items.map(this.renderListItem))
    }
})

ReactDOM.render(
   React.createElement(snapon, {items}, null),document.getElementById("root"))
 ```
### Stateless Functional Components
  * They are functions, so they dont have *this*
  * They are functions that take in properties, and return a DOM
  
  ```javascript
    let items = ["Wrench", "Ratchet","Drill"]

    const tools = props => 
        React.createElement("ul", {className:"tools"}, 
                props.items.map( (ing, i) => 
                    React.createElement("li", {key:i}, ing)
                    )
                )


    ReactDOM.render(
            React.createElement(tools, {items}, null), 
            document.getElementById("root")
            )
 ```
 
### Create Factory
* First argument is for the properties
* Second argument is for the children
* Abstracts object instantiation away

```javascript
React.DOM.h1(null, "Baked Salmon")

```
*Using map with factories*
```javascript
var list = React.DOM.ul(
  {className:"ingredients"},
  items.map( (ing, key) => React.DOM.li({key}, ing )
 )
)

```
### Using components with factories
```javascript
 const { render } = ReactDOM

let items = ["Wrench","Ratchet","Drill"]

const toolList = ({items}) => 
     React.createElement('ul', null, items.map((tool, i) => 
          React.createElement("li", {key:i}, tool)))

render(toolList({items}), document.getElementById("root"))

```
