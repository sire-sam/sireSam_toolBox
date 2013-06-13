{if isset($pagesIteration)}
    {for $i=1; $i <= $pagesIteration; $i++}
        {$active    =   null}
        {if $smarty.get.page    ==   $i} {$active    =   ' class="active"'}{/if}
        <li{$active}>
            <a href="{$pagesUrl}&amp;page={$i}" >
                {$i}
            </a>
        </li>
    {/for}
{/if}