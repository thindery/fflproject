<div class="row">
    <div class="columns callout">
        <table>
            <thead>
                <th>Position</th>
                <th>NFL Pos.</th>
            </thead>
            <tbody>
                <?php foreach($league_pos as $l): ?>
                    <tr>
                        <td><?=$l->text_id?></td>
                        <td>
                            <?php foreach(explode(',',$l->nfl_position_id_list) as $nflid): ?>
                                <?=$pos_lookup[$nflid]?>
                            <?php endforeach;?>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
