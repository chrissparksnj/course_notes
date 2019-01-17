<?php
$categories = [
  [
    'id' => 1, 'name' => 'Bittrex', 'subcategories' => [
      ['id' => 1, 'name' => 'Bitcoin'],
      ['id' => 2, 'name' => 'Ethereum'],
      ['id' => 3, 'name' => 'Litcoin'],
      ['id' => 4, 'name' => 'Ripple'],
      ['id' => 5, 'name' => 'Neo'],
      ['id' => 6, 'name' => 'BitcoinCash'],
      ['id' => 7, 'name' => 'Potcoin']
    ]
  ],
  [
    'id' => 2, 'name' => 'Poloniex', 'subcategories' => [
      ['id' => 1, 'name' => 'Bitcoin'],
      ['id' => 2, 'name' => 'Ethereum'],
      ['id' => 3, 'name' => 'Litcoin'],
      ['id' => 4, 'name' => 'Ripple'],
      ['id' => 5, 'name' => 'Neo'],
      ['id' => 6, 'name' => 'BitcoinCash'],
      ['id' => 7, 'name' => 'Potcoin']
    ]
  ],
  [
    'id' => 3, 'name' => 'Kraken', 'subcategories' => [
      ['id' => 1, 'name' => 'Bitcoin'],
      ['id' => 2, 'name' => 'Ethereum'],
      ['id' => 3, 'name' => 'Litcoin'],
      ['id' => 4, 'name' => 'Ripple'],
      ['id' => 5, 'name' => 'Neo'],
      ['id' => 6, 'name' => 'BitcoinCash'],
      ['id' => 7, 'name' => 'Potcoin']
    ]
  ],
    [
    'id' => 4, 'name' => 'Bitfinex', 'subcategories' => [
      ['id' => 1, 'name' => 'Bitcoin'],
      ['id' => 2, 'name' => 'Ethereum'],
      ['id' => 3, 'name' => 'Litcoin'],
      ['id' => 4, 'name' => 'Ripple'],
      ['id' => 5, 'name' => 'Neo'],
      ['id' => 6, 'name' => 'BitcoinCash'],
      ['id' => 7, 'name' => 'Potcoin']
    ]
  ]
];

  $category_id = isset($_GET['category_id']) ? (int) $_GET['category_id'] : 0;

  foreach($categories as $category) {
    if($category['id'] == $category_id) {

      $subcategories = $category['subcategories'];
      foreach($subcategories as $subcategory){
        echo "<option value=\"{$subcategory['id']}\">";
        echo $subcategory['name'];
        echo "</option>";
      }

    }
  }

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Ajax Category Select</title>
  </head>
<body>


<div id='form'>
  
<p>Which CryptoMarket are you looking for?</p>
<select id='category-select'>
  <option disabled selected>Please select</option>
  <option value='1'>Bittrex</option>
  <option value='2'>Poloniex</option>
  <option value='3'>Kraken</option>
  <option value='4'>Bitfinex</option>
</select>
<select id='subcategory'></select>
</div>
</div>



<script type="text/javascript">
  function updateSubcategories(){
     var cat_select = document.getElementById('category-select');
     var subcat_select = document.getElementById('subcategory');
     // Get index of selected from option drop down
     var cat_id = cat_select.options[cat_select.selectedIndex].value;
     console.log("Cat Id: " + cat_id);

    var url = 'subcategories.php?category_id=' + cat_id;
    console.log(url);
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.onreadystatechange = function(){
      if(xhr.readyState == 4 && xhr.status == 200){
        console.log(xhr.responseText);
        subcat_select.innerHTML = xhr.responseText;
      }

    }
      xhr.send();


 }

    var cat_select = document.getElementById("category-select");

    // Change Event Listener
    cat_select.addEventListener("change", updateSubcategories);






</script>

</body>
</html>
