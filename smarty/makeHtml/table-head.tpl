{if (!(empty($conf))) AND (!(empty($pattern))) AND (!(empty($row))) }
        <tr>
            {foreach $pattern as $col => $val}
                {if (array_key_exists($col,$row))}
                    <th class="{$val.class}" title="{$val.label}">
                        {$val.label}
                        {if $val.search}
                            <input id="search-{$col}" class="{$val.search}" type="text" name="search-{$col}" data-search="{$col}" {if $val.placeholder}placeholder="{$val.placeholder}{/if}"/>
                        {/if}
                    </th>
                    {/if}
            {/foreach}
            {if $conf.edit}
                <th class="mini">
                    Editer
                </th>
            {/if}
            {if $conf.delete}
                <th class="mini">
                    Supprimer
                </th>
            {/if}
        </tr>
{/if}