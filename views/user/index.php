<table class='listing'>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Naissance</th>
      <th>Courriel</th>
      <th>Editer</th>
      <th>Effacer</th>
    </tr>
  <thead>
  <tbody>
  <?php foreach($data as $row) { ?>
    <tr>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo date_format(date_create($row['birthday']),"Y/m/d") ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><a href="?module=user&action=view&id=<?php echo $row['userId']; ?>">Editer</a></td>
      <td><form action="?module=user&action=delete" method="post"><input type="hidden" name="userId" value="<?php echo $row['userId'] ?>"><input type="submit" Value="Effacer"></form></td>
    </tr>
  <?php } ?>
  <tbody>
</table>