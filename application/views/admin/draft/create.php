<div class="row">
	<div class="columns">
		<h5>Create Draft Order</h5>
	</div>
</div>

<div class="row">
	<div class="columns">
		<?php if ($draft_exists > 0): ?>
		<div class="text-center"><strong>Warning: This will wipe out existing <?=$year?> draft data!!</strong></div>
		<?php endif; ?>
			<table>
			<?php for ($i=1; $i <= count($teams); $i++): ?>
			<tr>
				<td class="text-right">Pick <?=$i?></td>
				<td>
				<select id="pick_<?=$i?>"class="choose-team">
					<option value="0"></option>
					<?php foreach ($teams as $t): ?>
					<option value="<?=$t->team_id?>"><?=$t->team_name?></option>
					<?php endforeach; ?>
				</select>
				</td>
			</tr>
			<?php endfor; ?>
			<tr>
				<td class="text-right"># of Rounds</td>
				<td>
					<select id="rounds">
						<?php for ($i=1; $i<=40; $i++): ?>
						<option value="<?=$i?>"><?=$i?></option>
						<?php endfor; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td></td><td>
			    <label>
			      <input id="reverse" type="checkbox"> Reverse every other round
			    </label>
				<?php if($traded_picks): ?>
				<label>
				  <input id="trades" type="checkbox" checked> Apply traded draft picks
				</label>
				<?php endif;?>
				</td>
			</tr>
		  	<tr>
			  	<td></td><td>
				<button id="reset-button" class="button small">Reset</button>
				<button id="create-button" class="button small">Create</button>
				</td>
			</tr>
			</table>

	</div>
</div>

<script>
$(document).ready(function(){

	$(".choose-team").on("change",function(){
		//$(".choose-team option[value='"+$(this).val()+"']").not($(this).find("option")).remove();

	});
	$("#reset-button").on("click",function(){
		location.reload();
	});

	$("#create-button").on("click",function(){
		url = "<?=site_url('admin/draft/do_create')?>";
		order = getorderarray();
		rounds = $("#rounds").val();
		trades = $("#trades").prop("checked");
		$.post(url,{'order[]' : order, 'rounds' : rounds, 'reverse' : $("#reverse").prop("checked"), 'trades':trades}, function(data){
			window.location.replace("<?=site_url('admin/draft')?>");
		});
	});

	function getorderarray()
	{
		var order = [];
		$(".choose-team").each(function(){
			//order[$(this).attr('id').replace("pick_","")] = $(this).val();
			order.push($(this).val());
		});

		return order;

	}

});
</script>
