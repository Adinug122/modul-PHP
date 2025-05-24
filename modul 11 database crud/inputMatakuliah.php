<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mata Kuliah</title>
    <style>
             body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            padding-top: 30px;
            color: #333;
        }

        .container {
            width: 400px;
            margin: 30px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        form fieldset {
            border: none;
        }

        form legend {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 15px;
            color: #2c3e50;
        }

        form p {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #2e86de;
            color: white;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #1b4f72;
        }
    </style>
</head>
<body>
    <h1>Input Data mata kuliah</h1>
    <div class="container">
        <form id="form_dosen" action="proses_inputmatakuliah.php" method="post">
            <fieldset>
                <legend>Input Data Mata Kuliah</legend>
                <p>
                    <label for="kodeMK">Kode MK</label>
                    <input type="text" name="kodeMK" id="kodeMK">
                </p>
                <p>
                    <label for="namaMK">Nama MK </label>
                    <input type="text" name="namaMK" id="namaMK" >
                </p>
                <p>
                    <label for="SKS">SKS </label>
                    <input type="text" name="SKS" id="SKS" >
                </p>
                <p>
                    <label for="JAM">JAM </label>
                    <input type="text" name="JAM" id="JAM" >
                </p>
            </fieldset>
            <p>
                <input type="submit" name="input" value="simpan">
            </p>
        </form>
    </div>
</body>
</html>