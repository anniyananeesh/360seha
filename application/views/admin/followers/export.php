<table border='1'>
  <tr>
     <td>Email</td>  
  </tr>
  <?php if($records):?>
    <?php foreach($records as $eml):?>
    <tr>
       <td><?php echo $eml->follower_email;?></td> 
    </tr>
    <?php endforeach;?>
  <?php endif;?>
</table>