---
title: 3-React-Notes
tags: [react]
created: '2019-02-05T00:38:01.820Z'
modified: '2019-02-09T03:18:09.662Z'
---

# 3-React-Notes

### JSX

```javascript
<ul>
{this.props.tools.map((tool, index) => <li key={index}>{tool)</li> )}
</ul>
```

### Babel
```html
// After react libraries loaded
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.29/browser.js"></script>

<script type='text/babel'>


</script>
```


```javascript
        var data = [

            {"name":"Baked Salmon",
            "ingredients":[ 
                {"name":"Salmon", "amount":1, "measurement": "1lb"}, 
                {"name": "Pine Nuts", "amount": 1, "measurement":"1 cup"}
            ],
            "steps": [
                "Preheat the oven to 350 degrees.",
                "Spread the olive oil around a glass baking dish.",
                "Add the salmon, Garlic, and pine nuts to the dish",
                "Bake for 15 minutes.",
                "Add the Butternut Squash and put back in the oven for 30 mins.",
                "Remove from oven and let cool for 15 minutes. Add the lettuce and serve."
                ]
            },
            {"name":"Fish Tacos",
            "ingredients":[
                {"name":"Whitefish", "amount":1, "measurement": "1lb"},
                {"name":"cheese", "amount":1, "measurement": "1 cup"}
            ], 
            "steps":[
                "Cook the fish",
                "Place on hot grill",
                "Top them with lettuce, tomatoes, and cheese"
            ]
         }
        ]
```

### Data requires two components to parse data and one functon to render
* A menu component for listing recipes
* A Recipe component that describes the UI for each recipe
* We will pass our data to the menu component as a property called recipes

```javascript
const Recipe = (props) => (
   ...
)

const Menu = (props) => (
   ...
)

ReactDOM.render(< Menu recipes={data} title="Delicious Recipes"/>, document.getElementById("root"))
```

### Menu component (v1)
```javascript
 const Menu = (props) =>
   <article>
     <header>
        <h1>{props.title}</h1>
     </header>
     <div className='recipes'>
       {props.recipes.map((recipe, i)=> 
         <Recipe key={i} name={recipe.name} ingredients={recipe.ingredients} step={recipe.steps}/>
        )}
     </div>
   </article>
```

### Refactored Recipes Map
```javascript
{
    props.recipes.map((recipe, i)=> <Recipe key={i} {...recipe}/>
)}
```
### Object Destructuring
```javascript
const Menu ({title, recipes}) => (
  <article>
  <header>{title}</header>
    <div className='recipes'>
      {  recipes.map((rec, i) => <Recipe key={i} {...recipe}/>)   }
    </div>
  </article>
)
```

### Recipe's component
```javascript
 const Recipe = ({ name, ingredients, steps }) => 
   <section id={ name.toLowerCase().replace(g\ \, "-") }>
   <h1>{name}</h1>
     <ul className='ingredients'>
       {
          ingredients.map( (ing, i) => <li key={i}>{ing.name}</li> )
       }
     </ul>
     <section className="instructions">
       <h2>Cooking instructions</h2>
       {steps.map( (step, i) => <p key={i}>{step}</p>)}
     </section>
   </section>
   
```
