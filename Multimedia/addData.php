<?php
   include("../config/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
    <link rel="stylesheet" href="../css/adddata.css">
    <link rel="stylesheet" href="../css/main.css">
    <style>

        
    </style>
</head>
<body>
<?php include("../header/header.php");?>
    
    <div class="container">
        
        <div class="sub-container">
            
        <div class="sub-container-1" >
            <h1>Add New Data</h1>
            <form action="actionItem.php" method="POST">
                    <div class="left" style="margin-left:30px;">
                        <label for="aName">Artical Name</label>
                        <input type="text" name="aname" placeholder="Article Name" value="" /> 
                        
                        <label for="price">Price(Per Unit)</label>
                        <input type="number" name="price" placeholder="Price(Per Unit)" value="" />

                        <label for="folio">Folio Number</label> 
                        <input type="text" name="folio" placeholder="Folio Number" value="" />

                        <label for="sName">Supplier Name</label> 
                        <input type="text" name="sName" placeholder="Supplier Name" value="" /> 

                        <label for="srn">SRN Number</label> 
                        <input type="number" name="srn" placeholder="SRN Number" value="" />

                        <label for="location">Location:</label>
                        <input type="text" name="location" placeholder="Location" value="" />
                    </div>
    
                    <div class="right" style="margin-left:30px;">
                        <label for="date">Date</label> 
                        <input type="date" name="date" placeholder="Date" value="" />  
                        
                        <label for="quantity">Quantity</label> 
                        <input type="number" name="quantity" placeholder="Quantity" value="" />

                        <label for="description">Description</label>
                        <textarea name="description" cols="20" rows="10"></textarea>

                        <label for="s_tp">Supplier T.P.</label>
                        <input type="number" name="s_tp" placeholder="Supplier T.P" value="" />

                        <label for="type">Type Of One Unit</label>  
    
                        <select name="type" style="margin:20px ; padding: 10px; font-size:15px;" onchange="updateTableHeader()">
                            <option value="">Please Select....</option>   
                            <option value="desktop">Desktop</option>   
                            <option value="laptop">Laptop</option>
                            <option value="electronic">Electronic</option>
                        </select>
                        <button class="button-1" type="button"  onclick="addtable()" onclick="addtype()">Add Serial Number</button>

                        <div>
                            <table id="dataTable"  hidden="hidden">
                                <thead id="tableHeader">
                                    <tr>
                                        <th></th>
                                    </tr>
                                </thead>
            
                                <tbody id="tableBody">
                                </tbody>
                            </table>
                        </div>
                        
                        <input class="button" type="submit" name="padd" value="Add" />
                        
                    </div>
                
                
                
                <!-- <div id="input-container">
                <div id="input-row">
                        <input type="text" class="type" id="type" name="type[]" value=""/>
                        <button class="removeButton" onclick="remove(this)">Remove</button>
                </div>
                </div>
                
                <div class="endbutton">
                    <button type="button" id="addTypeButton" onclick="addtype()">Add New Type</button>
                    <button type="button" onclick="addtable()" style="background-color:#55C2C3; color: #303655;">Add Serial Number</button>
                </div> -->
    
                
    
                <script>
                    function updateTableHeader(){
                        var selectedType = document.querySelector('select[name="type"]').value;
                        var tableHeader = document.getElementById("tableHeader");
    
                        tableHeader.innerHTML = "";
                        var rowNumberHeader = document.createElement("th");
                        rowNumberHeader.innerHTML = "No";
                        tableHeader.appendChild(rowNumberHeader);
    
                        // Add type-specific headers
                        if (selectedType === "desktop") {
                            for (var i = 0; i < 4; i++) {
                                var th = document.createElement("th");
                                if(i==0){
                                    th.innerHTML = "CPU";
                                }else if(i==1){
                                    th.innerHTML = "Monitor";
                                }else if(i==2){
                                    th.innerHTML = "Keyboard";
                                }else if(i==3){
                                    th.innerHTML = "Mouse";
                                }
                                tableHeader.appendChild(th);
                            }
                        } else if (selectedType === "laptop") {
                            for (var i = 0; i < 2; i++) {
                                var th = document.createElement("th");
                                if(i==0){
                                    th.innerHTML = "Model_number";
                                }else if(i==1){
                                    th.innerHTML = "Serial_number";
                                }tableHeader.appendChild(th);
                            }
                        } else if (selectedType === "electronic") {
                            var th = document.createElement("th");
                            th.innerHTML = "Serial_number";
                            tableHeader.appendChild(th);
                        }
    
                        
                    }
                        
                    function addtable(){
    
                        let element = document.getElementById("dataTable");
                        element.removeAttribute("hidden");
    
                        var selectedType = document.querySelector('select[name="type"]').value;
                        var quantity =parseInt(document.querySelector('input[name="quantity"]').value);
    
                        var tableHeader = document.getElementById("dataTable").getElementsByTagName('thead')[0].insertRow();
                        var rowNumberHeader = document.createElement("th");
    
                        var tableBody = document.getElementById("tableBody");
                        for (var i = 1; i <= quantity; i++) {
                            var newRow = tableBody.insertRow();
                            
                            var cell = newRow.insertCell();
                            cell.textContent = i;
                            
                            if(selectedType == "desktop"){
                                for (var j = 0; j < 4; j++) {
                                    var cell = newRow.insertCell();
                                    var input = document.createElement("input");
                                    input.type = "text";
                                    if(j==0){
                                        input.name= "CPU" + i;
                                    }else if(j==1){
                                        input.name = "Monitor" + i;
                                    }else if(j==2){
                                        input.name = "Keyboard" + i;
                                    }else if(j==3){
                                        input.name = "Mouse" + i;
                                    }
                                    
                                    cell.appendChild(input);
                                }
                            }
                            else if(selectedType == "laptop"){
                                for (var j = 0; j < 2; j++) {
                                    var cell = newRow.insertCell();
                                    var input = document.createElement("input");
                                    input.type = "text";
                                    if(j==0){
                                        input.name= "mNumber" + i;
                                    }else if(j==1){
                                        input.name = "sNumber" + i;
                                    }
                                    
                                    cell.appendChild(input);
                                }
                            }
                            else if(selectedType == "electronic"){
                                    var cell = newRow.insertCell();
                                    var input = document.createElement("input");
                                    input.type = "text";
                                    input.name = "sNumber" + i;                            
                                    cell.appendChild(input);
                                }
                            }
                        
                        var inputContainer = document.getElementById("input-container");
                        inputContainer.innerHTML = '';
    
                        var typeInputContainer = document.getElementById("input-row");
                        typeInputContainer.style.visibility = "hidden";
    
                        var addTypeButton = document.getElementById("addTypeButton");
                        addTypeButton.style.display = "none";
    
                        addTypeButton.removeAttribute("disabled");
                    }
    
                    function addtype(){
    
    
                        var inputContainer = document.getElementById("input-container");
    
                        var inputRow = document.createElement('div');
                        inputRow.className = 'input-row';
    
                        var newInput = document.createElement('input');
                        newInput.type = 'text';
                        newInput.name = 'type[]';
    
                        var removeButton = document.createElement('button');
                        removeButton.className='removeButton';
                        removeButton.textContent = ("Remove");
                        removeButton.onclick = function(){
                            remove(inputRow);
                        };
    
                        inputRow.appendChild(newInput);
                        inputRow.appendChild(removeButton);
    
                        inputContainer.appendChild(inputRow);
                    }
    
                    function remove(inputRow){
                        var inputContainer = document.getElementById('input-container');
    
                        inputContainer.removeChild(inputRow);
                    }
                </script>
    
                
                
                
            </form>
        </div>
        </div>
    </div>
</body>
</html>