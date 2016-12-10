<?php if($records):?>
 
	<?php foreach($records as $key => $value):?>

		<label class="checkbx-inner <?php echo (in_array($value->id, $userSplznsMain)) ? 'active' : '';?>">
			<input type="checkbox" <?php echo (in_array($value->id, $userSplznsMain)) ? 'checked' : '';?> value="<?php echo $value->id?>" name="dept[]" class="checkbx-department"/>
			<?php echo $value->{title_.$lan};?>
		</label>

	<?php endforeach;?>

<?php endif;?> 