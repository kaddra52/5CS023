<?php
session_start();
	if (empty($_SESSION['user_id']) || $_SESSION['user_id'] == '')
	{
	    header("Location: ../index.php?validation=3");
	    die();
	} 
include('../db_con.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <title>Record Listing</title>
         <link href="https://fonts.gstatic.com" rel="preconnect">
		  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
		
		  <!-- Vendor CSS Files -->
		  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
		  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
		  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
		  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
		  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
		  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
		  <!-- Template Main CSS File -->
		  <link href="../assets/css/style.css" rel="stylesheet">  
        
        <!-- DataTable Styles -->
        <link rel="stylesheet" href="../dist/css/style.css">
        <link rel="stylesheet" href="../dist/css/editing.css">
        <!-- Demo Styles -->
        <link rel="stylesheet" href="../demo.css">
    </head>
    <body style="margin:60px;">    	  
        <br>         
        <br>
        <div align="center">
        	<h3 style="color: #012970;">Retrieve, Update, Delete Operations</h3>
        </div>
        <p>'Double-click' Or 'Right-click' on cell for operation</p>
        <p>'Enter' for Save Or 'Escape' for Cancel</p>
        <br>         
        <br>
        <?php
        $sql = "SELECT * FROM tb_users";		        
		$result = $conn->query($sql);			            
        ?>
        <table id="demo-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>User Type</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) 
                {                   					
                    while ($row = $result->fetch_assoc()) 
                    {
                        $user_id = $row["user_id"];					
                        $username = $row["username"];					
                        $password = $row["password"];
                        $name = $row["name"];					 
                        $user_type = $row["user_type"];					 
                        $phone = $row["phone"];	
                ?>
                        <tr id="<?=$user_id?>">
                            <td><?=$name?></td>
                            <td><?=$username?></td>
                            <td><?=$password?></td>
                            <td><?=$user_type?></td>
                            <td><?=$phone?></td>
                        </tr>
                <?php                       				 
                    }	 
                }
                ?>                
            </tbody>
        </table>
        <br/><br/><br/>
		<div align="center">
			<a href="../crud.php">Back to Create</a>
		</div>
			
        <script type="module">
            import {
                DataTable,
                makeEditable
            } from "../dist/module.js"
            let editor = false
            let inline = true
            let table = false

            const resetTable = function() {
                if (editor) {
                    editor.destroy()
                }
                if (table) {
                    table.destroy()
                }
                window.table = table = new DataTable("#demo-table", {
                    columns: [
                        {
                            select: 3,
                            type: "date",
                            format: "YYYY/DD/MM"
                        }
                    ]
                })
                editor = makeEditable(table, {
                    contextMenu: true,
                    hiddenColumns: true,
                    excludeColumns: [], // make the "Ext." column non-editable
                    inline,
                    menuItems: [
                        {
                            text: "<span class='mdi mdi-lead-pencil'></span> Edit Cell",
                            action: (editor, _event) => {                                                                  
                                const td = editor.event.target.closest("td")
                                return editor.editCell(td)
                            }
                        }, {
                            separator: true
                        }, {
                            text: "<span class='mdi mdi-delete'></span> Remove",
                            action: (editor, _event) => {
                                if (confirm("Are you sure?")) {
                                    const tr = editor.event.target.closest("tr")
                                    var record_id = editor.event.target.closest("tr").id;                                                                        
                                    editor.removeRow(tr, record_id)
                                }
                            }
                        }
                    ]
                })
            }
            resetTable()
        </script>
    </body>
</html>
