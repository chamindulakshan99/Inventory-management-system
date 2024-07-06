<?php
    include("../config/connection.php");
    session_start();

    if(!isset($_SESSION['uname'])){
        header("location: login.php");
        exit();
    }

    $queryinvoice = "SELECT * FROM invoice";
    $result = mysqli_query($con,$queryinvoice);

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query1 = "SELECT * FROM o_invoice WHERE invoice_id = $id";
        $result1 = mysqli_query($con, $query1);
        $row1 = mysqli_fetch_assoc($result1);

        $query2 = "SELECT * FROM o_items WHERE invoice_id = $id";
        $result2 = mysqli_query($con, $query2);
        $row2 = mysqli_fetch_assoc($result2);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/adddata.css">
<style>


form{
    margin:auto;
    width:800px;
}
h2{
    margin:10px;
    text-align:center;
}
        
        
    </style>
</head>
<body>
<?php include("../header/header.php");?>
    <h2><?php if(isset($_GET['id'])){echo "Update Office Invoice";}else{echo "Add Office Invoice";}?></h2>

    <form action="actionItem.php" method="POST">

        <input type="hidden" name="id" value="<?php if(isset($_GET['id'])){echo $row1['invoice_id'];}?> " /> <br>

        <label for="aName">Article Name</label> <br>
        <input type="text" name="aname" value="<?php if(isset($_GET['id'])){echo $row1['name'];}?>" required/> <br>

        <label for="date">Date</label> <br>
        <input type="date" name="date" value="<?php if(isset($_GET['id'])){echo $row1['date'];}?>" required/><br>

        <label for="price">Price(Per Unit)</label> <br>
        <input type="number" name="price" value="<?php if(isset($_GET['id'])){echo $row1['price'];}?>"required /><br>

        <label for="quantity">Quantity</label> <br>
        <input type="number" name="quantity" value="<?php if(isset($_GET['id'])){echo $row1['quantity'];}?>" required/><br>

        <label for="folio">Folio Number</label> <br>
        <input type="text" name="folio" value="<?php if(isset($_GET['id'])){echo $row1['folio_number'];}?>" required/><br>

        <label for="description">Description</label>
        <textarea name="description" cols="20" rows="10"><?php if(isset($_GET['id'])){echo $row1['description'];}?></textarea> <br><br><br>

        <label for="sName">Supplier Name</label> <br>
        <input type="text" name="sName" value="<?php if(isset($_GET['id'])){echo $row1['supplier_name'];}?>"required /> <br>

        <label for="s_tp">Supplier T.P.</label> <br>
        <input type="number" name="s_tp" value="<?php if(isset($_GET['id'])){echo $row1['supplier_tt'];}?>" /> <br>

        <label for="srn">SRN Number</label> <br>
        <input type="number" name="srn" value="<?php if(isset($_GET['id'])){echo $row1['srn'];}?>" /> <br>

        <label for="location">Location:</label>
        <input type="text" name="location" value="<?php if(isset($_GET['id'])){echo $row1['location'];}?>" required/>
        <br><br>

        <select name="type" style="margin:20px ; padding: 10px; font-size:15px;" onchange="updateTableHeader()" hidden='hidden'>
            <option value="electronic">electronic</option>   
        </select>
        <button type="button"  onclick="addtable()" onclick="addtype()" style="background-color:#55C2C3; color: #303655; margin: 10px;" <?php if(isset($_GET['id'])) {?> disabled="disabled" <?php } ?>>Add Serial Number</button>

        <div>
            <table id="dataTable"  hidden="hidden">
                <thead id="tableHeader">
                    <tr>
                        <th>No</th>
                        <th>Serial_number</th>
                    </tr>
                </thead>

                <tbody id="tableBody">
                </tbody>
            </table>
        </div>


        <script>
            // function updateTableHeader1(){
            //     var selectedType = document.querySelector('select[name="type"]').value;
            //     var tableHeader = document.getElementById("tableHeader");

            //     tableHeader.innerHTML = "";
            //     var rowNumberHeader = document.createElement("th");
            //     rowNumberHeader.innerHTML = "No";
            //     tableHeader.appendChild(rowNumberHeader);

            //     // Add type-specific headers
            //     if (selectedType === "desktop") {
            //         for (var i = 0; i < 4; i++) {
            //             var th = document.createElement("th");
            //             if(i==0){
            //                 th.innerHTML = "CPU";
            //             }else if(i==1){
            //                 th.innerHTML = "Monitor";
            //             }else if(i==2){
            //                 th.innerHTML = "Keyboard";
            //             }else if(i==3){
            //                 th.innerHTML = "Mouse";
            //             }
            //             tableHeader.appendChild(th);
            //         }
            //     } else if (selectedType === "laptop") {
            //         for (var i = 0; i < 2; i++) {
            //             var th = document.createElement("th");
            //             if(i==0){
            //                 th.innerHTML = "Model_number";
            //             }else if(i==1){
            //                 th.innerHTML = "Serial_number";
            //             }tableHeader.appendChild(th);
            //         }
            //     } else if (selectedType === "electronic") {
            //         var th = document.createElement("th");
            //         th.innerHTML = "Serial_number";
            //         tableHeader.appendChild(th);
            //     }

                
            // }
                
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
                    
                    if(selectedType == "electronic"){
                            var cell = newRow.insertCell();
                            var input = document.createElement("input");
                            input.type = "text";
                            input.name = "Serial_number" + i;                            
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

        <input class="button" type="submit" name="<?php if(isset($_GET['id'])){echo "update";}else{echo "padd";}?>" value="<?php if(isset($_GET['id'])){echo "Update";}else{echo "Add";}?>" style="width: 75%;"/> <br>
    </form>
</body>
</html>