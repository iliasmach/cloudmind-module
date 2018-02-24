<tr class="heading">
	<td colspan="2"><b>Контакты</b></td>
</tr>

<tr>
	<td valign="top" width="50%"><label>Телефон</label></td>
	<td valign="top" width="50%" nowrap="">
		<input type="text" name="site_phone" value="<?=COption::GetOptionString("cloudmind.main", 'site_phone');?>" />
	</td>
</tr>

<tr>
	<td valign="top" width="50%"><label>Адрес</label></td>
	<td valign="top" width="50%" nowrap="">
		<input type="text" name="site_address" value="<?=COption::GetOptionString("cloudmind.main", 'site_address');?>"/>
	</td>
</tr>

<tr>
	<td valign="top" width="50%"><label>Email</label></td>
	<td valign="top" width="50%" nowrap="">
		<input type="text" name="site_email" value="<?=COption::GetOptionString("cloudmind.main", 'site_email');?>"/>
	</td>
</tr>

<tr class="heading">
	<td colspan="2"><b>Анатлитика</b></td>
</tr>

<tr>
	<td valign="top" width="50%"><label></label></td>
	<td valign="top" width="50%" nowrap="">
		<label>
			<input type="checkbox" name="metrika_show" value="<?=COption::GetOptionString("cloudmind.main", 'metrika_show');?>"/>
			
			Включить Яндекс.Метрику
		</label>
	</td>
</tr>

<tr>
	<td valign="top" width="50%"><label>ID Яндекс.Метрики</label></td>
	<td valign="top" width="50%" nowrap="">
		<input type="text" name="metrika_id" value="<?=COption::GetOptionString("cloudmind.main", 'metrika_id');?>"/>
	</td>
</tr>

<tr>
	<td valign="top" width="50%"><label></label></td>
	<td valign="top" width="50%" nowrap="">
		<label>
			<input type="checkbox" name="metrika_show" value="<?=COption::GetOptionString("cloudmind.main", 'metrika_show');?>"/>
			
			Включить Google Analytics
		</label>
	</td>
</tr>

<tr>
	<td valign="top" width="50%"><label>ID Google Analytics</label></td>
	<td valign="top" width="50%" nowrap="">
		<input type="text" name="metrika_id" value="<?=COption::GetOptionString("cloudmind.main", 'metrika_id');?>"/>
	</td>
</tr>

