<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     <link rel="stylesheet" href="<?= base_url('assets/materialize/css/materialize.min.css');?>"> 
    <script src="<?= base_url('assets/materialize/js/materialize.min.js');?>"></script> 
    <script src="<?= base_url('assets/js/jquery.min.js');?>"></script>
</head>
<body>
    <!-- <div class="input-field col s12">
        <select>
            <option value="" disabled selected>Choose your option</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
        </select>
        <label>Materialize Select</label>
    </div> -->

    <select>
        <option value="">1</option>
        <option value="">2</option>
    </select>


    <script>
        // document.addEventListener('DOMContentLoaded', function(){
        //     var elms = document.querySelectorAll('select');
        //     var instances = M.FormSelect.init(elms, options);
        // });

        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
</body>
</html>