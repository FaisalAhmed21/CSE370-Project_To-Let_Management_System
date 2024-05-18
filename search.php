<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start(); 


$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "db"; 

$mysqli = new mysqli($servername, $username, $password, $database);


if (!$mysqli) {
  
    echo "Error connecting to the database. Please try again later.";
    exit;
}


$emailQuery = "SELECT email FROM userinfo ORDER BY id DESC LIMIT 1";


$result = $mysqli->query($emailQuery);

if ($result) {
    $row = $result->fetch_assoc();
    $latestEmail = $row['email'];

    $userDataQuery = "SELECT * FROM user WHERE email = '$latestEmail'";

    $userDataResult = $mysqli->query($userDataQuery);

    if ($userDataResult && $userDataResult->num_rows > 0) {
        $user = $userDataResult->fetch_assoc();


        $name = $user['name'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        .highlight {
            background-color: green;
        }
        .property-container {
            margin-top: 30px;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
        .property-container h2 {
            border-bottom: 2px solid white;
            padding-bottom: 5px;
        }
        .property-details {
            display: flex;
            flex-wrap: wrap;
            margin-top: 10px;
        }
        .property-details p {
            width: calc(50% - 10px);
            margin: 5px;
        }
        .property-images img {
            width: calc(50% - 10px);
            margin: 5px;
            border-radius: 5px;
        }
        .search-form {
            text-align: center;
            margin-bottom: 20px;
            position: relative;
        }
        .search-form button {
            margin: 10px;
            padding: 10px 20px;
        }
        .price-options, .size-options, .flat-type-options {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 5px;
            background-color: black;
        }
        .price-options input, .size-options input {
            margin: 5px;
            padding: 5px;
        }
        .search-history {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background-color: #fff;
            border: 1px solid #ccc;
            border-color: black
            border-top: none;
            max-height: 200px;
            overflow-y: auto;
            display: none;
            color: black;
        }
        .search-history-item {
            padding: 5px 10px;
            cursor: pointer;
            border: 1px solid #ccc;
            border-color: black
        }
        .home-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: Black;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body style="background-image: url('background.jpg'); background-color: gray ; background-size: cover; color: white; font-family: Arial, sans-serif;">
    <div style="max-width: 800px; margin: 20px auto; padding: 20px;">
    <button class="home-button" onclick="window.location.href='loginhome.html'">Home</button>
        <!-- Search Bar -->
        <div class="search-form">
            <input type="text" name="query" id="query" placeholder="Search by location..." style="padding: 10px;">
            <div class="search-history"></div>
            <button id="priceBtn">Price(BDT)</button>
            <div id="priceOptions" class="price-options" style="display: none;">
                <input type="number" id="minPrice" placeholder="Min" min="0">
                <input type="number" id="maxPrice" placeholder="Max">
                <button onclick="searchByPrice()">Find</button>
            </div>
            <button id="sizeBtn">Size(Sqft.)</button>
            <div id="sizeOptions" class="size-options" style="display: none;">
                <input type="number" id="minSize" placeholder="Min" min="0">
                <input type="number" id="maxSize" placeholder="Max">
                <button onclick="searchBySize()">Find</button>
            </div>
            <button id="flatTypeBtn" onclick="toggleFlatTypeOptions()">Flat Type</button>
            <!-- Flat Type Options -->
            <div id="flatTypeOptions" class="flat-type-options" background-color="lime" style="display: none;">
                <button onclick="searchFlatType('family')">Family</button>
                <button onclick="searchFlatType('sublet')">Sublet</button>
                <button onclick="searchFlatType('bachelor')">Bachelor</button>
            </div>
        </div>

        <?php
       
        $conn = new mysqli("localhost", "root", "", "db");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

      
        if(isset($_GET['query'])) {
            $search_query = $_GET['query'];
            $sql = "SELECT * FROM addproperty WHERE flat_location LIKE '%$search_query%' AND name != '$name' AND status = 'approved' AND available_status = 'available'";
        
            if(isset($_GET['min_price']) && isset($_GET['max_price'])) {
                $min_price = $_GET['min_price'];
                $max_price = $_GET['max_price'];
                if($min_price !== '' && $max_price !== '') {
                    $sql .= " AND rent BETWEEN $min_price AND $max_price";
                } else {
                    // If either minimum or maximum price is empty, no content found
                    echo "<p>No content found.</p>";
                    exit; // Exit the script to prevent further execution
                }
            }
        
            if(isset($_GET['min_size']) && isset($_GET['max_size'])) {
                $min_size = $_GET['min_size'];
                $max_size = $_GET['max_size'];
                if($min_size !== '' && $max_size !== '') {
                    $sql .= " AND flat_size BETWEEN $min_size AND $max_size";
                } else {
                    // If either minimum or maximum size is empty, no content found
                    echo "<p>No content found.</p>";
                    exit; // Exit the script to prevent further execution
                }
            }
        
            if(isset($_GET['flat_type'])) {
                $flat_type = $_GET['flat_type'];
                $sql .= " AND flat_type = '$flat_type'";
            }
        
            $result = $conn->query($sql);
        
            if ($result !== false && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                 
                    echo "<div style='margin-top: 30px; background-color: rgba(0, 0, 0, 0.6); padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);'>";
                    echo "<h2 style='border-bottom: 2px solid white; padding-bottom: 5px;'>Property Details</h2>";
                    echo "<p><strong>Flat ID:</strong> " . $row['Flatid'] . "</p>"; 
                    echo "<p><strong>Flat Type:</strong> " . $row['flat_type'] . "</p>"; 
                    echo "<p><strong>Location:</strong> " . $row['flat_location'] . "</p>";
                    echo "<p><strong>Size:</strong> " . $row['flat_size'] . " sq ft</p>";

                
                    echo "<button onclick=\"showMoreInfo(this)\">Show More Information</button>";
                    echo "<div class='moreInfo' style='display: none;'>";
                    echo "<p><strong>Bedrooms:</strong> " . $row['bedrooms'] . "</p>";
                    echo "<p><strong>Washrooms:</strong> " . $row['washrooms'] . "</p>";
                    echo "<p><strong>Balcony:</strong> " . $row['balcony'] . "</p>";
                    echo "<p><strong>Kitchen:</strong> " . $row['kitchen'] . "</p>";
                    echo "<p><strong>Living Room:</strong> " . $row['living_room'] . "</p>";
                    echo "<p><strong>Dining Room:</strong> " . $row['dinning_room'] . "</p>";
                    echo "<p><strong>Rent:</strong> " . $row['rent'] . " Taka</p>";
                    echo "</div>"; 

                
                    echo "<a href='view_review_rating.php?Flatid=" . $row['Flatid'] . "'><button>View Review and Ratings</button></a>";
                    echo "<a href='add_review_rating.php?Flatid=" . $row['Flatid'] . "'><button>Add Review and Rating</button></a>";

                    echo "<a href='booking.php'><button>Booking</button></a>";
                    echo "<a href='reservation.php'><button>Reservation</button></a>";

                    
                    $photos = explode(",", $row['photos']);
                    echo "<div style='margin-top: 20px; display: flex; flex-wrap: wrap;'>";
    
                    
                    for ($i = 0; $i < min(count($photos), 2); $i++) {
                        echo "<img src='$photos[$i]' alt='Property Image' style='width: calc(50% - 10px); margin: 5px; border-radius: 5px;'>";
                    }
    
                    echo "</div>"; 
    
                    
                    if (count($photos) > 2) {
                        echo "<button onclick=\"showMoreImages(this)\">Show More Images</button>";
                        echo "<div class='moreImages' style='display: none;'>";
    
                       
                        for ($i = 2; $i < count($photos); $i++) {
                            echo "<img src='$photos[$i]' alt='Property Image' style='width: calc(50% - 10px); margin: 5px; border-radius: 5px;'>";
                        }
    
                        echo "</div>"; 
                    }
    
                    echo "</div>"; 
                }
            } else {
                echo "<p>No properties found.</p>";
            }
        }
            $conn->close();
            ?>



        <script>
            var queryInput = document.getElementById('query');
            var searchHistory = document.querySelector('.search-history');
            
            // Function to save search history
            function saveSearchHistory(query) {
                var history = JSON.parse(localStorage.getItem('searchHistory')) || [];
                var lowerCaseQuery = query.toLowerCase(); // Convert query to lowercase
                var index = history.findIndex(function(item) {
                   
                    return item.toLowerCase() === lowerCaseQuery;
                });
                if (index !== -1) {
                    
                    history.splice(index, 1);
                }
                history.unshift(query);
                
                history = history.slice(0, 4);
                localStorage.setItem('searchHistory', JSON.stringify(history));
            }
            
           
            function loadSearchHistory() {
                var history = JSON.parse(localStorage.getItem('searchHistory')) || [];
                if (history.length > 0) {
                    searchHistory.innerHTML = '';
                    history.forEach(function(query) {
                        var historyItem = document.createElement('div');
                        historyItem.textContent = query;
                        historyItem.classList.add('search-history-item');
                        historyItem.addEventListener('click', function() {
                           
                            queryInput.value = query;
                            
                            search();
                        });
                        searchHistory.appendChild(historyItem);
                    });
                    searchHistory.style.display = 'block';
                } else {
                    searchHistory.style.display = 'none';
                }
            }
            
            
            function search() {
                var query = queryInput.value.trim();
                if (query !== '') {
                    
                    saveSearchHistory(query);
                    
                    window.location.href = 'search.php?query=' + query;
                }
            }
            
            
            queryInput.addEventListener('focus', loadSearchHistory);
            
            
            queryInput.addEventListener('blur', function() {
                setTimeout(function() {
                    searchHistory.style.display = 'none';
                }, 200);
            });

        
            queryInput.addEventListener("keydown", function(event) {
                if (event.key === "Enter") {
                    event.preventDefault();
                    search();
                }
            });

            var priceOptions = document.getElementById('priceOptions');
            var sizeOptions = document.getElementById('sizeOptions');
            var flatTypeOptions = document.getElementById('flatTypeOptions');
            var priceBtn = document.getElementById('priceBtn');
            var sizeBtn = document.getElementById('sizeBtn');

            priceBtn.addEventListener('click', function() {
                if (priceOptions.style.display === 'none') {
                    priceOptions.style.display = 'flex';
                    sizeOptions.style.display = 'none';
                    flatTypeOptions.style.display = 'none';
                } else {
                    priceOptions.style.display = 'none';
                }
            });

            sizeBtn.addEventListener('click', function() {
                if (sizeOptions.style.display === 'none') {
                    sizeOptions.style.display = 'flex';
                    priceOptions.style.display = 'none';
                    flatTypeOptions.style.display = 'none';
                } else {
                    sizeOptions.style.display = 'none';
                }
            });

            function searchByPrice() {
                var minPrice = document.getElementById('minPrice').value;
                var maxPrice = document.getElementById('maxPrice').value;
                var query = document.getElementById('query').value;
                window.location.href = 'search.php?query=' + query + '&min_price=' + minPrice + '&max_price=' + maxPrice;
            }
            
            function searchBySize() {
                var minSize = document.getElementById('minSize').value;
                var maxSize = document.getElementById('maxSize').value;
                var query = document.getElementById('query').value;
                
                window.location.href = 'search.php?query=' + query + '&min_size=' + minSize + '&max_size=' + maxSize;
            }
            
            function toggleFlatTypeOptions() {
                if (flatTypeOptions.style.display === 'none') {
                    flatTypeOptions.style.display = 'flex';
                    priceOptions.style.display = 'none';
                    sizeOptions.style.display = 'none';
                } else {
                    flatTypeOptions.style.display = 'none';
                }
            }

            function searchFlatType(flatType) {
                var query = document.getElementById('query').value;
                
                window.location.href = 'search.php?query=' + query + '&flat_type=' + flatType;
            }
            
            function showMoreInfo(button) {
                var moreInfoDiv = button.nextElementSibling;
                if (moreInfoDiv.style.display === 'none') {
                    moreInfoDiv.style.display = 'block';
                    button.textContent = 'Hide Information';
                } else {
                    moreInfoDiv.style.display = 'none';
                    button.textContent = 'Show More Information';
                }
            }
            function showMoreImages(button) {
                var moreImagesDiv = button.nextElementSibling;
                if (moreImagesDiv.style.display === 'none') {
                    moreImagesDiv.style.display = 'block';
                    button.textContent = 'Hide Images';
                } else {
                    moreImagesDiv.style.display = 'none';
                    button.textContent = 'Show More Images';
                }
            }
        </script>
    </div>
</body>
</html>