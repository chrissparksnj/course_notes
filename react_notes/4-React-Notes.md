---
title: 4-React-Notes
tags: [react]
created: '2019-02-09T03:19:56.950Z'
modified: '2019-02-09T04:15:31.172Z'
---

# 4-React-Notes

## Webpack
* Code splitting: Split up code into diffrenet chunks, and load as needed
* Minification: Remove whitespace, linebreaks, lengthy vars
* Feature Flagging: Send code to environments for testing
* Hot Module Replacements: Watches for updated source code. Updates modules as needed. 


### Webpack loaders
* Loader is a function that handles the transforms we want to put in our code
* Put loaders into webpack.config.js file
* Full list of loaders: https://webpack.js.org/

### Ingredients
* Pull instructions into its own stateless function and create a module in a seperate file

```javascript
const Instructions = ({ title, steps }) =>
  <section className='instructions'>
    <h2>{title}</h2>
    {steps.map( (s,i) => <p key={i}>{s}</p>)}
   </section>
   
 module.exports = Instructions
```


### Single Ingredient Item
```javascript

const Ingredient = ({ amount, measurement, name }) =>
  <li>
    <span className="amount">{amount}</span>
    <span className="measurement">{measurement}</span>
    <span className="name">{name}</span>
  </li>
  
 module.exports = Ingredient
```
### Component that returns array of single ingredient components
```javascript
import Ingredient from "./Ingredient"

const IngredientList = ({list}) => 
  <ul className='ingredients'>
    {list.map((ing, i) => 
        <Ingredient key={i} {...ing})
     }
     </ul>
    
    module.exports = IngredientsList
```

### Putting components together
```javascript
import IngredientsList from "./IngredientsList"
import Instructions from "./Instructions"

const Recipe = ({ name, ingredients, steps }) =>
  <section id={name.toLowerCase().replace(/ /g, '-')}>
      <h1>{name}</h1>
      <IngredientsList list={ingredients} />
      <Instructions title="cooking instructions" steps={steps}/>
  </section>
  
  module.exports = Recipe
```
### Final Menu component
* main.js
```javascript
import React from 'react'
import {render} from 'react-dom'
import Menu from './components/Menu'
import data from './data/recipes'
window.React = React

render(
  <Menu recipes={data}/>
  document.getElementById("react-container")
  )
  
```

# Installing webpack
`$ sudo npm install -g webpack`
`$ npm install babel-loader babel-preset-es2015 babel-preset-react babel-preset-stage-0`
`$ npm install react react-dom`



# webpack.config.js
```javascript
module.exports = {
  entry: "./main.js",   // Main file. Will build dependency tree based on imports
  output: {
    path: "dist/assets",
    filename: "bundle.js"  // Output final packaged JS file to ./dist/assets/bundle.js
  },
  module:{
    loaders: [    // incorporating the Babel loader
      {
          test:/\.js$/,  // run loader on all imports
          exclude: /(node_modules)/, // except those found in node_modules folder
          loader:['babel'],              
          query: {
            presets: ['es2015', 'react']
          }
      }
    ]
  }
}
```
 ### Running webpack
 
`$ webpack`


### Loading the bundle
```html
<title>React Flux Recipes</title>
<body>
  <div id='react-container'>
  <script src='/assets/bundle.js'>
</body>
```
