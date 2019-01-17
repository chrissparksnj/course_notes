<body>
	<div id='form'>
		<p>Which category are you interested in??</p>
		<select id='category-select'>
			<option disabled selected>Please Select</option>
			<option value='1'>Furniture</option>
			<option value='2'>Lighting</option>
			<option value='3'>Accessories</option>
		</select>
		<select id='subcategory-select'></select>
	</div>
---------------------------------------------------------------------------------------------------------------------------
<script>
	function updateSubcategories(){
		var cat_select = document.getElementById('category-select');
		var subcat_select = document.getElementById('subcategory-select');
		var cat_id = cat_select.options[cat_select.selectedIndex].value;
		var url = 'subcategories.php?category_id=' + cat_id;
		var xhr = new XMLHttpRequest();
		xhr.open('GET', url, true);
		xhr.onreadystatechange = function(){
			if(xhr.readyState == 4 && xhr.status == 200){
				subcat_select.innerHTML = xhr.responseText;
				subcat_select.style.display = 'inline';
			}
		} 
		xhr.send();
	}

var cat_select = document.getElementById('category-select');
//Change event listener
cat_select.addEventListener('change', updateSubcategories);
</script>

---------------------------------------------------------------------------------------------------------------------------
<?php

$categories = [
	[ 'id' => 1, 'name' => "Furniture", "subcategories" =>  
	[   ['id' => 1, 'name'=> 'Beds'], 
		  ['id' => 2, 'name'=> 'Benches'],
	    ['id' => 3, 'name'=> 'Cabinets'], 
	    ['id' => 4, 'name'=> 'Chairs'],
	    ['id' => 5, 'name'=> 'Consoles'] ] ], .....


$category_id = isset($_GET['category_id']) ? (int) $_GET['category_id'] : 0;

foreach($categories as $category){
	if($category['id'] == $category_id){
		$subcategories = $category['subcategories'];
		foreach($subcategories as $subcategory){
			echo "<option value =\"{$subcategory['id']}\">";
			echo $subcategory['name'];
			echo "</option>";
		}

	}
}
