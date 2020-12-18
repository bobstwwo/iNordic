          <thead> 
            <tr>
              <th>#id</th>
              <th>title</th>
              <th>description</th>
            </tr>
          </thead>
          <tbody>
            <?php   
                     
                require_once($_SERVER['DOCUMENT_ROOT'].'/iNordic/ClassWork/eshop/system/classes/autoload.php');
      
                //получили все записи из БД с помощью методы 
                $results = Section::getAllLines(); 

            ?>
            <?php while ($line = mysqli_fetch_assoc($results)) { ?>
                <tr>
                    <td>
                        <?= $line['id']?>
                    </td>
                    <td>
                        <?= $line['title']?>
                    </td>
                    <td>
                        <?= $line['description']?>
                        <a href="http://localhost/eshop/system/controllers/delete.php?class_name=Section&id=<?=$line['id']?>">x</a>
                    </td>
                </tr>
            <?php } ?>    
            
          </tbody>