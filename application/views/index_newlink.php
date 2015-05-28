<html> 
<head>
	<title>nothing to see here</title>
    <link rel='stylesheet' type='text/css' href='/assets/normalize.css'>
    <link rel='stylesheet' type='text/css' href='/assets/skeleton.css'>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script type="text/javascript">
    </script>
    <style type="text/css">
        input{
            margin:0 auto;
            padding: 0;
        }
        .center{
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>
<body class='container'>
    <div class="row">
        <div class="one column"></div>
        <div class="ten column">
            <form action="addnewsite" method='post'>
                <label>Add New Site:</label>
                <input type='text' name='newlink'>
                <label>Drill this site?</label>
                <input type='checkbox' name='drill'>
                <label>How deep to drill?</label>
                <input type="number" name='level' min='1' max='5'>
            </form>
        </div>
    </div>
</body>
</html>