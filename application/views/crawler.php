<html> 
<head>
    <title>nothing to see here</title>
    <link rel='stylesheet' type='text/css' href='/assets/normalize.css'>
    <link rel='stylesheet' type='text/css' href='/assets/skeleton.css'>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script type="text/javascript">
        $.get('/Crawler/partial_link', function(res) {
            $('#partial_link').html(res);
        });

        $(document).on('change', '.checkbox', function(){
            $(this).parents('form').trigger('submit');
        });

        $(document).on('change', '#pagelist', function(){
            var user_data = <?php $this->session->set_userdata('site_id',$this->input->post('pagelist')) ?>
            $.post('/Crawler/partial_link', $(this).serialize(),function(res) {
                    $('#partial_link').html(res);
            });      
            return false;
        });
        $(document).on('submit', 'form', function(){
            var href = $(this).attr('action'); 
            if(href == '/update_crawler') {
                $.post( href, $(this).serialize(), function(res) {
                    $('#partial_link').html(res);
                });      
                return false;
            } 
            else 
            {
                $(this).attr('action').trigger('submit'); 
                return false;
            }
        });
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

        .add-link{
            border: 1px solid black;
            border-radius: 5px;
            margin-top: 50px;
            margin-bottom: 20px;
            padding: 20px;
            width: 30%;
        }
        a { text-decoration: none;}
    </style>
</head>
<body class='container'>
    <div class="row">
        <div class="twelve columns">
            <div class='add-link'>            
                <!-- this is to add a new site -->
                <form action="/addnewsite" method='post'>
                    <label>Add New Site:</label>
                    <input type='text' name='newlink'>
                    <label>Site Owner:</label>
                    <input type='text' name='site_owner'>
                    <label>How deep to drill?</label>
                    <input type="number" name='level' min='1' max='5'><br><br>
                    <input type='submit' class='button' value='Add New Link'>
                </form>
            </div>
            <!-- <br> -->
            <form action="/gapangin" method='post'>
                <label>Main Site:</label>
                <select name="pagelist" id='pagelist'>
                    <?php 
                        if(isset($results)) {
                            foreach ( $results as $pagelist)
                            {
                                echo "<option value='".$pagelist['site_id']."' ";
                                if ($default_ID == $pagelist['site_id']) {echo 'selected';}
                                echo ">".$pagelist['site_address'];
                            }
                        } 
                    ?>
                </select>
                <input type='submit' class='go' value='GO!'>
                <button><a href='/workspace'>Template</a></button>
            </form>
            <hr>
            <div class="SiteLinks">
                <table class='u-full-width'>
                    <thead>
                        <tr>
                            <th>Links</th>
                            <th class='center'>Scrape</th>
                        </tr>
                    </thead>
                    <tbody id='partial_link'>
                    </tbody>
                </table>
            </div>
            </form>
        </div>
    </div>
</body>
</html>