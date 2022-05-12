<?php
    $output = "";
    $sql = "";
    $noFields = "";
    $mysqli = new mysqli("brighton", "pn163_CI536_Marketplace","CI536_Marketplace","pn163_Marketplace"); //Connect to database
            
            if($mysqli->connect_errno){
                
                //If there is no connections it sends repsonse code 500 and ends
                http_response_code(500);
                exit();

            } else {

                    $sql = 'SELECT price, descript, productName, photo from tProduct '
                         . 'INNER join tProCate on tProduct.productID = tProCate.productID '
                         . 'INNER join tCategory on tProCate.categoryID = tCategory.categoryId '
                         . 'where tCategory.categoryName = "Gardening" ';

                    $result = $mysqli->query($sql);
                    $noRows= $result->num_rows;
                    while($row = $result->fetch_assoc()){                        
                        for($i = 0; $i < $noRows; $i++){
                            $output .= '<li id="item"> <img src= "'. $row["photo"] . '" />'
                                    .  '</br>'
                                    .  '<p id= "name"> '. $row["productName"] . '</p>'
                                    .  '<p id= "description">'. $row["descript"] . '</p>'
                                    .  '<p id= "price"> Price: £ ' . $row["price"] . '</p>'
                                    .  '</li>';
                            break;
                        }
                    }
                                 
            mysqli_close($mysqli);
            
        }
?>
<!DOCTYPE >

<html lang="en"> 

<head>
<meta charset="utf-8"/>

<meta name="viewport" content="width= device-width, initial-scale=1"/>

<title> Gardening products </title>

<script src="https://kit.fontawesome.com/8a181a8ab1.js" crossorigin="anonymous"></script>

<link href="styles.css" rel="stylesheet"/>

<script src= "products.js"> </script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">

</head>


<body>


<header> 

<div class="nav">

	<div class="logo">
		<a href="index.html"> Home </a>
	</div>
	
	
	
	
	<div class="menu">
		<ul>
			<li class="sell">
			<a href= ""> Sell </a>
			</li>

			<li class="basket">
			<i class="fa-solid fa-basket-shopping"></i>
			<span id='cartCount'> 2 </span>
			</li>

			<li class="profile">
			<img src="images/profile.png" />
			
			<div class="account-menu">
				<a href="">Account </a>
				<a href=""> Orders  </a>
				<a href=""> Inventory </a>
				<a href=""> Sales </a>
				<a href=""> Log out </a>
			</div>
			
			</li>
			
		</ul>
	</div>
	
	
	<div class="clear1"> </div>
	
	<div class="search">

		<input type="text" class="search-input" placeholder= "search an item" > 
		
		<button type="submit" class="search-button">
		<i class="fa-solid fa-magnifying-glass"></i>
		</button>
	</div>
	
	<div class="clear2"> </div>
	
	
</div>

</header>


<main>


<p class = "nav2"> 
 <a href = "index.html"> Home </a> &#8680; Gardening
</p>


<div id= "filter-sort">

<span id= "filter"> <i class="fa-solid fa-filter"></i> Filters </span>

<div id="sort"> 
	<form action="/action_page.php" id="sort-form">
		<select name="Sort">
			<option value="" disabled selected hidden>Sort </option>
			<option value="best-match">Best match</option>
			<option value="date-added">Date added</option>
			<option value="lowest-price">Lowest price</option>
			<option value="highest-price">Highest price</option>
		</select>
	</form>
</div>

	
</div>

<div class="clear"> </div>

<br>

<div id="filters">
  
  <span class="closebtn">&times;</span>
  
	  <form action="/action_page.php" id="filter-form">
	  
		  <p class="filter-name">Type:</p>
		  
		  <div class="filter">
		  
			  <div class="input">
			  <input type="radio" id="seeds" name="type" value="Seeds">
			  <label for="seeds">Seeds</label><br>  
			  </div>
			  
			  <div class="input">
			  <input type="radio" id="flowers" name="type" value="Flowers">
			  <label for="flowers">Flowers</label><br>
			  </div>
			  
			  <div class="input">
			  <input type="radio" id="pots" name="type" value="Pots">
			  <label for="pots">Pots</label><br>  
			  </div>
			  
			  <div class="input">
			  <input type="radio" id="tools" name="type" value="Tools">
			  <label for="tools">Tools</label><br>
			  </div>
			  
		  </div>

	  <br>  

		  <p class="filter-name">Price:</p>
		  <input type="range" id="price-range" min="10" max="50" value="30">
		  <div id= "min-max">
		  <div id="min"> £10 </div>
		  <div id="max"> £50 </div>
		  </div>
		  
		  <div class="clear"> </div>
		  
	  <br>
	  
		  <p class="filter-name">Condition:</p>
		  
		  <div class="filter">
		  
			  <div class="input">
			  <input type="radio" id="new" name="condition" value="New">
			  <label for="new">New</label><br>
			  </div>
			  
			  <div class="input">
			  <input type="radio" id="used" name="condition" value="Used">
			  <label for="used">Used</label><br> 
			  </div>
			  
			  <div class="input">
			  <input type="radio" id="good" name="condition" value="Good">
			  <label for="good">Good</label><br>
			  </div>
			  
			  <div class="input">
			  <input type="radio" id="acceptable" name="condition" value="Acceptable">
			  <label for="acceptable">Acceptable</label><br><br>
			  </div>
		  
		  </div>
		  
		  <br>
		  
		  <p class="filter-name">Rating:</p>
		  
			  <i class="fa-solid fa-star unchecked"></i>
			  <i class="fa-solid fa-star unchecked"></i>
			  <i class="fa-solid fa-star unchecked"></i>
			  <i class="fa-solid fa-star unchecked"></i>
			  <i class="fa-solid fa-star unchecked"></i>
		  
		  <br>
		  
		  <input type="number" name="stars" id="stars" value=0 >
		  
		  
		  <div id="apply-filters">
			<input type="submit" value="Apply">
		  </div>
	  
	  <br>  

		  
	  <br>
	  
	</form>
  
  
</div>


<div id="products">

	<ul class="items">
	
		<?php echo $output?>
		
		
		
	</ul>
</div>
</main>
		

</body>

</html>
