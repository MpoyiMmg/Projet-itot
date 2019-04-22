<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

    <body>
        <div>
            <div>
                <h3>rendez vous</h3>
            </div>         
            <table>
            <thead>
                <tr>
                <th>idRdv</th>
                <th>idClient</th>
                <th>idEntreprise</th>
                <th>motif</th>
                <th>date</th>
                <th>heure</th>
                <th>duree</th>
                <th>etat</th>
                <th>commentaire</th>
                <th>choix1</th>  
                <th>choix2</th>    
                </tr>
            </thead>
            <tbody>
            <?php 
                if($fetch_data->num_rows() > 0){
                    foreach($fetch_data->result() as $row)
                    {    
            ?>
                <tr>
                    <td><?php echo $row->idRdv; ?></td>
                    <td><?php echo $row->idClient; ?></td>
                    <td><?php echo $row->idEntreprise; ?></td>
                    <td><?php echo $row->motif; ?></td>
                    <td><?php echo $row->date; ?></td>
                    <td><?php echo $row->heure; ?></td>
                    <td><?php echo $row->duree; ?></td>
                    <td><?php echo $row->etat; ?></td>
                    <td><?php echo $row->commentaire; ?></td>
                    <td><a href="<?php echo base_url(); ?>entreprise/EntrepriseController/accepter_refuser_rdv?id=<?php echo $row->idRdv; ?>&state=1">Accepter</a></td>
                    <td><a href="<?php echo base_url(); ?>entreprise/EntrepriseController/accepter_refuser_rdv?id=<?php echo $row->idRdv; ?>&state=0">Refuser</a></td>
                </tr>
            <?php 
                    }
                }
                else
                {
            ?>
                <tr>
                    <td>No data found</td>
                </tr>
                <?php 
                }
                ?>
            </tbody>
            </table>
            
           

        </div>
        <div>
        <form action="entreprise/EntrepriseController/update_data/" method="post">
           
           <?php 
                if(isset($rdv_data)){
                    foreach($fetch_data->result() as $row){
      
            ?>
                       
                       <label>motif</label>
                       <input type="text" name="motif" value="<?= $row->motif?>"/><br>
                       <label>date</label>
                       <input type="date" name="date" value="<?= $row->date?>"/><br>
                       <label>heure</label>
                       <input type="datetime" name="heure" value="<?= $row->heure?>"/><br>
                       <label>duree</label>
                       <input type="text" name="duree" value="<?= $row->duree?>"/><br>
                       <label>etat</label>
                       <input type="text" name="etat" value="<?= $row->etat?>"/><br>
                       <label>commentaire</label>
                       <input type="text" name="commentaire" value="<?= $row->commentaire?>"/><br>
                       <input type="hidden" name="hidden_id" value="<?= $row->idRdv?>"/><br>
                       <input type="submit" name="update" value="Update">
                       <?php
                   }
               }
               ?>
       </form>
        </div>
    </body>
</html>