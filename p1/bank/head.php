<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de la Fortuna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: left;
        }
        
        nav {
            background-color: #444;
            padding: 10px;
            text-align: center;
        }
        
        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }
        
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        
        th {
            background-color: #f2f2f2;
        }

        form {
            width: 60%;
            margin: 30px auto;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
        }

        .form-field {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .guardar {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .addButton {
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .addButton:hover {
            background-color: #555;
        }

        .deleteButton {
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #ff0000;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .deleteButton:hover {
            background-color: #ff6666;
        }

        .search-button {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            display: block;
        }

        .search-button:hover {
            background-color: #555;
        }

        .results {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            padding: 20px;
        }

        .fcc-btn {
            background-color: #e0e0e0;
            color: #000000;
            padding: 2px 7px;
            text-decoration: none;
            cursor: pointer;
            border: 1px solid #777777;            
        }

        .form-search {
            width: 300px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        .search-field {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .ficha {
            width: 80%;
            margin: 30px auto;
            padding: 10px 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
        }
    </style>
</head>