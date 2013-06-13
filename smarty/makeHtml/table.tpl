{if (!(empty($conf))) OR (!(empty($pattern))) }
    {* Call this file inside <table> tag *}
    <thead>
        {include file='makeHtml/table-head.tpl' row=$data[0] pattern=$pattern conf=$conf}
    </thead>
    <tbody>
        {include file='makeHtml/table-body.tpl' data=$data pattern=$pattern conf=$conf}
    </tbody>
    {/if}
