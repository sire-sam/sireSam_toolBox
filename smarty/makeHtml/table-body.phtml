{if (!(empty($conf))) AND (!(empty($pattern))) AND (!(empty($data))) }
    {foreach $data as $row}
        {if is_array($row)}
        <tr class="item" data-id="{$row.id}" data-order="{$row.order}">
            {foreach $pattern as $col => $v}
                {if array_key_exists($col,$row) }
                <td class="value">
                    {if $v.display == 'check'}
                        {if $row[$col] != ''}{$check = 'check'}{else}{$check = 'check-empty'}{/if}
                         <span class="icon icon-{$check}">&nbsp;</span>
                    {elseif $col == parent}
                        {if $row[$col]}
                        <span data-highlight="{$row[$col]}">
                            {$row[$col]}
                        </span>
                        {/if}

                    {else}
                        {$row[$col]}
                    {/if}
                </td>
                {/if}
            {/foreach}
            {if $conf.edit}
                <td class="value">
                {if $conf.edit === 'span'}
                    <span class="icon-pencil" data-edit="{$row[$conf.primaryKey]}" title="Editer">&nbsp;</span>
                {else}
                    <a href="{$conf.script}&amp;action=edit&id={$row[$conf.primaryKey]}" title="Editer">
                        <span class="icon-pencil">&nbsp;</span>
                    </a>
                {/if}
                </td>
            {/if}
            {if $conf.delete}
                <td class="value">
                    {if $conf.delete ===  'span'}
                        <span class="icon-trash" data-delete="{$row[$conf.primaryKey]}" title="Supprimer"></span>
                    {else}
                        <a href="{$conf.script}&amp;action=edit&id={$row[$conf.primaryKey]}" title="Supprimer">
                            <span class="icon-trash">&nbsp;</span>
                        </a>

                    {/if}
                </td>
            {/if}
        </tr>
        {/if}
    {/foreach}
{/if}